<?php

namespace App\Exports\Sheets;

use App\Model\User;
use App\Model\Wallet;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class WalletSheet implements FromQuery, WithTitle, WithHeadings
{
    public function headings(): array
    {
        return [
            '#',
            'Тип',
            'Баланс',
            'Создан',
            'Обновлен',
        ];
    }

    public function query()
    {
        return Wallet::query()
            ->select([
                'id', 'type', 'value', 'created_at', 'updated_at'
            ]);
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return 'Кошельки';
    }
}
