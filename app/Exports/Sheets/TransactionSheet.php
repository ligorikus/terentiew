<?php

namespace App\Exports\Sheets;

use App\Model\Transaction;
use App\Model\User;
use App\Model\Wallet;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;

class TransactionSheet implements FromQuery, WithTitle, WithHeadings, WithMapping
{
    public function headings(): array
    {
        return [
            '#',
            'Кошелек',
            'Значение',
            'Тип операции',
            'Создал',
            'Создан',
            'Обновлен'
        ];
    }

    public function query()
    {
        return Transaction::query();
    }

    /**
     * @param Transaction $transaction
     * @return array[]
     */
    public function map($transaction): array
    {
        $transactionData = new Collection();
        $transactionData->push([
            $transaction->id,
            $transaction->wallet->type,
            $transaction->value,
            $transaction->type === 'income' ? 'Приход' : 'Расход',
            $transaction->creator ? $transaction->creator->name : '',
            $transaction->created_at,
            $transaction->updated_at,
        ]);

        $transaction->products->sortBy('id')->each(function ($product) use ($transactionData) {
            $transactionData->push([
                '',
                $product->name,
                $product->pivot->value,
                $product->pivot->type === 'income'  ? 'Приход' : 'Расход'
            ]);
        });
        return $transactionData->toArray();
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return 'Транзакции';
    }
}
