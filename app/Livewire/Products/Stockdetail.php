<?php

namespace App\Livewire\Products;
use App\Models\Shopproduct;
use Livewire\Component;

class Stockdetail extends Component
{
   
 public $product;

    public function mount($id)
    {
        $this->product=Shopproduct::with(['product'])->findOrFail($id);
    }


    public function render()
    {
        return view('livewire.products.stockdetail');
    }
}
