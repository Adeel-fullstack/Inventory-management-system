<?php

namespace App\Livewire\Products;

use App\Models\Record;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Response;

class ViewProducts extends Component
{
    public $records;
    public $productId; // ✅ Add this line


    public function mount($id)
    {
        $this->productId=$id;
        $this->records = Product::find($id)->records;
    }

    public function render()
    {
        return view('livewire.products.view-products');
    }

    public function export()
{
    // We already have the product ID stored!
    $records = Product::findOrFail($this->productId)->records()->with('product')->get();
    
    // Prepare Excel view
    $view = View::make('exports.shop-products', [
        'products' => $records
    ])->render();

    return response()->streamDownload(function () use ($view) {
        echo $view;
    }, 'product_' . $this->productId . '_records.xls', [
        'Content-Type' => 'application/vnd.ms-excel',
    ]);
}


}
