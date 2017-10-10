<?php

/*
 * Created by tpay.com
 */

namespace tpayLibs\EDD;

use tpayLibs\src\_class_tpay\PaymentForms\PaymentBasicForms;

include_once 'config.php';
include_once 'loader.php';

class BasicPaymentForm extends PaymentBasicForms
{

    public function __construct($id, $secret)
    {
        $this->merchantSecret = $secret;
        $this->merchantId = $id;
        parent::__construct();
    }

    public function getDataForTpay($params)
    {
        echo $this->getTransactionForm($params);
    }
}
