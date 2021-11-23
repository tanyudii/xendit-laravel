<?php

namespace Tanyudii\XenditLaravel\Services;

use Xendit\Cards;
use Xendit\EWallets;
use Xendit\Exceptions\ApiException;
use Xendit\Invoice;
use Xendit\Xendit;

class XenditService
{
    public function __construct()
    {
        Xendit::setApiKey(config('xendit-laravel.key'));
    }

    /**
     * @param array $params
     * @return array
     */
    public function createInvoice(array $params)
    {
        return Invoice::create($params);
    }

    /**
     * @param string $id
     * @return array
     */
    public function getInvoice(string $id)
    {
        return Invoice::retrieve($id);
    }

    /**
     * @param array $params
     * @return array
     * @throws ApiException
     */
    public function createEWalletCharge(array $params)
    {
        return EWallets::createEWalletCharge($params);
    }

    /**
     * @param array $params
     * @return array
     * @throws ApiException
     */
    public function createCreditDebitCardCharge(array $params)
    {
        return Cards::create($params);
    }
}
