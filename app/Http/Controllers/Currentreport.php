<?php

namespace App\Http\Controllers;
use App\Models\Record;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;

class Currentreport extends Controller
{
    public function export()
{
    $records = Record::with('product')->get(); // or filter by some logic

$view = View::make('exports.shop-products', [
    'products' => $records  // ✅ match variable name in Blade
])->render();

    return response()->streamDownload(function () use ($view) {
        echo $view;
        }, 'currentreport.' . date('Y-m-d') . '.xls', [
        'Content-Type' => 'application/vnd.ms-excel',
    ]);
}

}
