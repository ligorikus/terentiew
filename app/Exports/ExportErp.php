<?php

namespace App\Exports;

use App\Exports\Sheets\TransactionSheet;
use App\Exports\Sheets\UserSheet;
use App\Exports\Sheets\WalletSheet;
use App\Model\User;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class ExportErp implements WithMultipleSheets
{
    use Exportable;

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::all();
    }

    public function sheets(): array
    {
        $sheets[] = new UserSheet();
        $sheets[] = new WalletSheet();
        $sheets[] = new TransactionSheet();
        return $sheets;
    }
}
