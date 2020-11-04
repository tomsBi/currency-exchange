<?php

namespace App\Repositories;

class CurrencyRepository
{
    public function getAllCurrencies(): array
    {
        $currenciesQuery = query()
            ->select('*')
            ->from('currency_exchange_rates')
            ->execute()
            ->fetchAllAssociative();

        $currencies = [];

        foreach ($currenciesQuery as $currency) {
            $currencies [] = [
                (int)$currency['id'],
                $currency['currency_name'],
                (float)$currency['rate']
            ];
        }
        return $currencies;
    }

    public function update($name, $rate)
    {
        query()
            ->update('currency_exchange_rates')
            ->set('currency_name', ':currency_name')
            ->set('rate', ':rate')
            ->setParameters([
                'currency_name' => $name,
                'rate' => $rate
            ])
            ->where('currency_name = :currency_name')
            ->setParameter('currency_name', $name)
            ->execute();
    }

    public function import(array $data)
    {
        foreach ($data as $currency) {
            $query = query();
            $query->insert('currency_exchange_rates')
                ->values([
                    'currency_name' => ':name',
                    'rate' => ':rate',
                ])
                ->setParameters($currency->toArray())
                ->execute();
        }
    }
}