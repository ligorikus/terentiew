<?php

namespace App\Exports\Sheets;

use App\Model\User;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class UserSheet implements FromQuery, WithTitle, WithHeadings
{
    public function headings(): array
    {
        return [
            '#',
            'Пользователь',
            'Email',
            'Создан',
            'Обновлен',
        ];
    }

    public function query()
    {
        return User::query()
            ->select([
                'id', 'name', 'email', 'created_at', 'updated_at'
            ]);
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return 'Пользователи';
    }
}
