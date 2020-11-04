<?php

namespace App\Models;

class Currency
{
    private string $name;
    private float $rate;
    private ?int $id;

    public function __construct(string $name, float $rate)
    {
        $this->name = $name;
        $this->rate = $rate;
        $this->id = null;
    }

    public static function create(array $data): Currency
    {
        return new self(
            $data['name'],
            $data['rate'],
        );
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'rate' => $this->rate,
        ];
    }
}