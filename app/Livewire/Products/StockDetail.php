<?php

namespace App\Livewire\Products;
use App\Models\ShopProduct;
use Livewire\Component;

class StockDetail extends Component
{
   
 public $product;

    public function mount($id)
    {
        $this->product=ShopProduct::with(['product'])->findOrFail($id);
    }


    public function render()
    {
        return view('livewire.products.stock-detail');
    }
}
