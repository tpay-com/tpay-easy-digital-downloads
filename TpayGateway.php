<?php

/*

  Plugin Name: tpay Gateway Easy Digital Download
  Plugin URL: http://tpay.com
  Description: tpay gateway for Easy Digital Download
  Version: 2.0
  Author: tpay
  Author URI: http://tpay.com

 */

use tpayLibs\EDD\BasicPaymentForm;
use tpayLibs\EDD\TpayAdminSettings;
use tpayLibs\EDD\TransactionNotification;
use tpayLibs\src\_class_tpay\Utilities\Lang;

function transferuj_register_gateway($gateways)
{
    global $edd_options;
    $gateways['transferuj'] = array(
        'admin_label'    => __('Tpay', 'easy-digital-downloads'),
        'checkout_label' => __('Tpay', 'easy-digital-downloads'),
    );
    return $gateways;
}

add_filter('edd_payment_gateways', 'transferuj_register_gateway');

function load_libs()
{
    require_once 'includes/tpayLibs/EDD/loader.php';
}

// widoki dla platnosci
function edd_transferuj_show_cc_form()
{
    global $edd_options;
    load_libs();
    Lang::setLang('pl');
    $data['merchant_id'] = $edd_options['transferuj_merchantid'];
    $data['show_regulations_checkbox'] = true;
    $data['regulation_url'] = 'https://secure.tpay.com/regulamin.pdf';
    $data['form'] = '';
    $view = $edd_options['transferuj_view'];
    echo '<input type="hidden" name="regulamin" id="tpay-regulations-input" value="0">';
    echo '<input type="hidden" name="kanal" id="tpay-channel-input" value=" ">';
    if ($view == 0) {
        include_once 'includes/tpayLibs/src/common/_tpl/bankSelection.phtml';
    }

    if ($view == 1) {
        include_once 'includes/tpayLibs/src/common/_tpl/bankSelectionList.phtml';
    }
    if ($view == 2) {
        echo '<a href="https://tpay.com/jak-to-dziala" target="_blank">
<img src="https://tpay.com/img/logo/tpaycom.png" height="145" width="250"/></a>';
    }
    $str = <<<MY_MARKER
            <fieldset><div style="text-align: justify">
           <b>UWAGA</b></br>
                 Po opłaceniu zamówienia w systemie tpay.com nastąpi powrót na stronę sklepu. 
                 Po odebraniu emaila z potwierdzeniem opłacenia transakcji w systemie tpay.com prosimy odświeżyć stronę sklepu, a zakupione pordukty 
                 staną się dostępne do pobrania.
            </div></fieldset>
            
MY_MARKER;
    echo $str;
}

add_action('edd_transferuj_cc_form', 'edd_transferuj_show_cc_form');

// proces platnosci
function transferuj_process_payment($purchase_data)
{
    load_libs();
    global $edd_options;

// check there is a gateway name
    if (!isset($purchase_data['post_data']['edd-gateway'])) {
        return;
    }

    // collect payment data
    $payment_data = array(
        'price'        => $purchase_data['price'],
        'date'         => $purchase_data['date'],
        'user_email'   => $purchase_data['user_email'],
        'purchase_key' => $purchase_data['purchase_key'],
        'currency'     => $edd_options['currency'],
        'downloads'    => $purchase_data['downloads'],
        'user_info'    => $purchase_data['user_info'],
        'cart_details' => $purchase_data['cart_details'],
        'status'       => 'pending'
    );
    $errors = edd_get_errors();

    if ($errors) {
        // return the errors if any
        edd_send_back_to_checkout('?payment-mode=' . $purchase_data['post_data']['edd-gateway']);
    } else {

        $payment = edd_insert_payment($payment_data);

        // check the payment
        if (!$payment) {

            edd_send_back_to_checkout('?payment-mode=' . $purchase_data['post_data']['edd-gateway']);
        } else {
            $id = (int)$edd_options['transferuj_merchantid'];
            $code = $edd_options['transferuj_secretpass'];
            $terms = (isset($_POST['regulamin']) && $_POST['regulamin'] == 1) ? true : false;
            $ordernumber = str_pad($payment, 4, 0, STR_PAD_LEFT);
            $returnUrl = add_query_arg('payment-confirmation', 'transferuj',
                get_permalink($edd_options['success_page']));
            $returnUrlError = add_query_arg('payment-confirmation', 'transferuj',
                get_permalink($edd_options['failure_page']));
            $params = array(
                'kwota'        => $purchase_data['price'],
                'nazwisko'     => $purchase_data['user_info']['first_name'] . ' ' . $purchase_data['user_info']['last_name'],
                'email'        => $purchase_data['user_info']['email'],
                'crc'          => base64_encode($ordernumber),
                'opis'         => 'Zamówienie nr: ' . $ordernumber,
                'wyn_url'      => $returnUrl,
                'pow_url'      => $returnUrl,
                'pow_url_blad' => $returnUrlError,
            );
            if ($terms) {
                $params['akceptuje_regulamin'] = 1;
            }
            if (isset($_POST['kanal']) && (int)$_POST['kanal'] > 0) {
                $params['kanal'] = (int)$_POST['kanal'];
            }

            (new BasicPaymentForm($id, $code))->getDataForTpay($params);

            edd_empty_cart();

        }
    }
}

add_action('edd_gateway_transferuj', 'transferuj_process_payment');

function transferuj_ipn()
{
    if (isset($_POST['tr_crc'])) {
        global $edd_options;
        load_libs();
        $id = (int)$edd_options['transferuj_merchantid'];
        $code = $edd_options['transferuj_secretpass'];
        $handler = (new TransactionNotification($id, $code));
        $res = $handler->checkPayment();
        $order = base64_decode($res['tr_crc']);
        $orderAmount = edd_get_payment_amount($order);

        if ($res['tr_status'] === 'TRUE' && $res['tr_error'] === 'none' && $orderAmount === (float)$res['tr_paid']) {
            edd_insert_payment_note($order, 'Zapłacono przez tpay.com: ' . $res['tr_id']);
            edd_update_payment_status($order, 'publish');
        } else {
            edd_insert_payment_note($order, 'Błąd transakcji: ' . $res['tr_id'] . 'Typ błędu: ' . $res['tr_error']);
            edd_update_payment_status($order, 'failed');
        }
    }
}

add_action('init', 'transferuj_ipn');

function transferuj_add_settings($settings)
{

    require_once 'includes/tpayLibs/EDD/AdminSettings.php';
    $transferuj_settings = (new TpayAdminSettings())->getSettingsForm();

    return array_merge($settings, $transferuj_settings);
}

add_filter('edd_settings_gateways', 'transferuj_add_settings');
