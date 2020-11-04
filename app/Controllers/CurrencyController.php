<?php

namespace App\Controllers;

use App\Models\Currency;
use App\Repositories\BankDataRepository;
use App\Repositories\CurrencyRepository;
use App\Services\CurrencyService;

class CurrencyController
{

    public function index()
    {
        $currencies = (new CurrencyRepository())->getAllCurrencies();
        return require_once __DIR__ . '/../Views/CurrencyView.php';
    }

    public function update()
    {
        $currencyService = new CurrencyService();
        $currencyRepo = new CurrencyRepository();
        $array = (new BankDataRepository())->getDataFromBank();

        foreach ($array as $currency) {

            $checking = query()
                ->select('*')
                ->from('currency_exchange_rates')
                ->where('currency_name = :currency_name')
                ->setParameter('currency_name', $currency[0])
                ->execute()
                ->fetchAssociative();

            if (!empty($checking)) {
                $currencyRepo->update($currency[0], $currency[1]);
            } else {
                $currencyRepo->import($currencyService->store());
            }
        }
        header('location: /');
    }

}