<?php

namespace App\Livewire\Houseware;

use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\View;

class Stockmanagement extends Component
{
    public function deleteproduct($id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->delete();
        }

        session()->flash('error','Product Deleted Successfully');
    }

    public function export()
    {
        $products = Product::with(['brand', 'category'])->get();

        $view = View::make('exports.houseware-products', [
            'products' => $products
        ])->render();

        return response()->streamDownload(function () use ($view) {
            echo $view;
        }, 'houseware_products.xls', [ // use .xls instead of .xlsx for raw HTML tables
            'Content-Type' => 'application/vnd.ms-excel',
        ]);
    }

    public function render()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $products = Product::with(['brand', 'category'])->get();

        return view('livewire.houseware.stockmanagement', compact('products', 'brands', 'categories'));
    }
}
