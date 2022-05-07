<?php

namespace App\Http\Controllers;

use App\Exports\ExportErp;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function exportUsers(Request $request){
        return Excel::download(new ExportErp(), 'cafeerp.xlsx');
    }
}
