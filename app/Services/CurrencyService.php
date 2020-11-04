<?php

namespace App\Services;

use App\Models\Currency;
use App\Repositories\BankDataRepository;

class CurrencyService
{
    public function store(): array
    {
        $currencies = [];
        $data = (new BankDataRepository())->getDataFromBank();
        foreach ($data as $currency) {
            $currencies[] = new Currency(
                $currency[0],
                $currency[1]
            );
        }
        return $currencies;
    }


}