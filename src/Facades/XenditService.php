<?php

namespace Tanyudii\XenditLaravel\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static mixed createInvoice(array $params)
 * @method static mixed getInvoice(string $id)
 * @method static mixed createVirtualAccount(array $params)
 * @method static mixed createEWalletCharge(array $params)
 * @method static mixed createCreditDebitCardCharge(array $params)
 *
 * @see \Tanyudii\XenditLaravel\Services\XenditService
 */
class XenditService extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'xendit-service';
    }
}
