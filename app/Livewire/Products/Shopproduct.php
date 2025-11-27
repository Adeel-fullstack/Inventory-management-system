<?php

namespace App\Livewire\Products;

use Livewire\Component;
use App\Models\Shopproduct as ShopproductModel;
use App\Models\Product;
use App\Models\Record;
use Livewire\WithFileUploads;

class Shopproduct extends Component
{
    use WithFileUploads;

    public $product_id;
    public $quantity;
    public $totalproducts;

    public function Add()
    {
        $this->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        // ✅ Get the original product from warehouse
        $warehouseProduct = Product::find($this->product_id);

        // ✅ Check stock
        if ($this->quantity > $warehouseProduct->quantity) {
            $this->addError('quantity', 'Not enough stock in warehouse.');
            return;
        }

        // ✅ Subtract warehouse stock
        $warehouseProduct->quantity -= $this->quantity;
        $warehouseProduct->save();

        // ✅ Save thumbnail if uploaded
        


        // ✅ Add product to shop
        $product = new ShopproductModel();
        $product->product_id = $this->product_id;
        $product->quantity = $this->quantity;
        $product->save();

        Record::create([
        'product_id' => $this->product_id,
        'warehouse_stock' => $warehouseProduct->quantity,
        'shop_stock' => $this->quantity,
        'transfer_quantity' => 0, // If this is the first transfer
    ]);

        session()->flash('success', 'Product added Successfully');

        $this->reset(['product_id',  'quantity']);
    }

    public function render()
    {
        $products = Product::all();

        return view('livewire.products.shopproduct', compact('products'));
    }
}
