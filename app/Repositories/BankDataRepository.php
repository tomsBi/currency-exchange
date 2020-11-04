<?php

namespace App\Repositories;

use Sabre\Xml\Service;

class BankDataRepository
{
    public function getDataFromBank(): array
    {
        $xml = file_get_contents('https://www.bank.lv/vk/ecb.xml');
        $service = new Service();
        $service->elementMap = [
            'Currency' => 'Sabre\Xml\Deserializer\keyValue',
        ];
        $result = $service->parse($xml);

        $data = [];

        foreach ($result[1]['value'] as $row) {
            $data[] = [
                $row['value'][0]['value'],
                $row['value'][1]['value']
            ];
        }
        return $data;
    }
}