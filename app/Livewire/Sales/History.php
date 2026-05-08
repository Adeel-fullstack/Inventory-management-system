<?php

namespace App\Livewire\Sales;

use Livewire\Component;
use App\Models\Sale;
use App\Models\SalesProduct;
use App\Models\ShopProduct;

class History extends Component
{
    public $sales;
    public $sale;

    public function mount()
    {
        $this->sales = Sale::with('customer', 'salesproducts.shopproduct.product')->latest()->get();
    }

    public function deleteSale($id)
    {
        Sale::find($id)?->delete();
        $this->sales = Sale::with('customer', 'salesproducts.shopproduct.product')->latest()->get();
    }

    public function returnSale($saleId)
    {
        $sale = Sale::find($saleId);

        if (!$sale || $sale->status == 2) {
            session()->flash('error', ' Already returned.');
            return;
        }

        // Restore product quantities
        $saleProducts = SalesProduct::where('sale_id', $sale->id)->get();

        foreach ($saleProducts as $saleProduct) {
            $product = ShopProduct::find($saleProduct->product_id);
            if ($product) {
                $product->quantity += $saleProduct->quantity;
                $product->save();
            }
        }

        // Update sale status
        $sale->status = 2; // 2 = Returned
        $sale->save();

        $this->sales = Sale::with('customer', 'salesproducts.shopproduct.product')->latest()->get();

        session()->flash('success', 'Sale returned Successfully.');
    }

    public function render()
    {
        return view('livewire.sales.history');
    }
}
