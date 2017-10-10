<?php
/**
 * Created by tpay.com.
 * Date: 14.09.2017
 * Time: 13:10
 */
namespace tpayLibs\EDD;

class TpayAdminSettings
{
    public function getSettingsForm()
    {
        return array(
            array(
                'id' => 'transferuj_settings',
                'name' => '<strong>Ustawienia dla tpay.com</strong>',
                'desc' => 'Skonfiguruj',
                'type' => 'header'
            ),
            array(
                'id' => 'transferuj_display_name',
                'name' => 'Wyświetlana nazwa',
                'desc' => 'Nazwa wyświetlana podczas wyboru metody płatności',
                'type' => 'text',
                'size' => 'regular',
                'default' => 'Quickpay',
            ),
            array(
                'id' => 'transferuj_merchantid',
                'name' => 'ID Sprzedawcy',
                'desc' => 'ID Sprzedawcy nadane podczas tejestraci w tpay.com',
                'type' => 'text',
                'size' => 'regular'
            ),
            array(
                'id' => 'transferuj_secretpass',
                'name' => 'Kod bezpieczeństwa',
                'desc' => 'Kod znajduje się w Panelu Odbiorcy Płatności w zakładce Ustawienia->Powiadomienia',
                'type' => 'text',
                'size' => 'regular'
            ),
            array(
                'id' => 'transferuj_view',
                'name' => 'Widok dla kanałów płatności', 'transferuj_view',
                'desc' => 'Wybierz sposób i miejsce wyświetlania kanałów płatości',
                'type' => 'select',
                'options' => array( '0' => 'Ikony banków na stronie sklepu',
                                    '1'=>'Lista banków na stronie sklepu',
                                    '2'=>'Przekierowanie na stronę tpay.com'
                ),
                'size' => 'regular'
            )
        );
    }
}
