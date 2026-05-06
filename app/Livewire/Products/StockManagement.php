<?php

namespace App\Livewire\Products;

use Livewire\Component;
use App\Models\Shopproduct;
use App\Models\Record;

class StockManagement extends Component
{
    public $selectedShopProduct;
    public $warehouseQuantity;
    public $shopQuantity;
    public $additionalQuantity;
    public $showQuantityModal = false;

    public function openQuantityModal($id)
    {

        $this->selectedShopProduct = Shopproduct::with('product')->find($id);

        if ($this->selectedShopProduct) {
            $this->warehouseQuantity = $this->selectedShopProduct->product->quantity;
            $this->shopQuantity = $this->selectedShopProduct->quantity;
            $this->additionalQuantity = null;
            $this->showQuantityModal = true;
        }
    }

    public function updateQuantity()
{
    $this->validate([
        'additionalQuantity' => 'required|integer|min:1'
    ]);

    $product = $this->selectedShopProduct->product;

    if ($product->quantity < $this->additionalQuantity) {
        $this->addError('additionalQuantity', 'Not enough stock in warehouse');
        return;
    }

    // Update warehouse quantity
    $product->quantity -= $this->additionalQuantity;
    $product->save();

    // Update shop quantity
    $this->selectedShopProduct->quantity += $this->additionalQuantity;
    $this->selectedShopProduct->save();

    Record::create([
        'product_id' => $product->id,
        'warehouse_stock' => $this->warehouseQuantity,
        'shop_stock' =>  $this->shopQuantity,
        'transfer_quantity' => $this->additionalQuantity,
    ]);

    // ✅ Refresh product list so table updates
    $this->products = Shopproduct::with('product')->get();

    // Reset modal and values
    $this->reset(['selectedShopProduct', 'warehouseQuantity', 'shopQuantity', 'additionalQuantity', 'showQuantityModal']);

    session()->flash('success', 'Quantity updated successfully');
}



public function getUpdatedShopQuantityProperty()
{
    if (is_numeric($this->additionalQuantity)) {
        return $this->shopQuantity + intval($this->additionalQuantity);
    }
    return $this->shopQuantity;
}



    public function render()
    {
        $products = Shopproduct::with('product')->get();
        return view('livewire.products.stock-management', compact('products'));
    }
}
