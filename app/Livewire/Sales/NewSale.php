<?php

namespace App\Livewire\Sales;

use App\Models\ShopProduct;
use App\Models\Customer;
use App\Models\Sale;
use App\Models\SalesProduct;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class NewSale extends Component
{
    public $products, $customers;
    public $product_id, $customer_id, $quantity;
    public $cart = [];
    public $price;
    public $amount;

    public function mount()
    {
        $this->products = ShopProduct::all();
        $this->customers = Customer::all();
    }

    public function updatedProductId($value)
    {
        $product = ShopProduct::with('product')->find($value);

        if ($product) {
            $this->price = $product->price;
            // If quantity is already set, update amount immediately
            if ($this->quantity) {
                $this->amount = $product->product->price * $this->quantity;
            }
        } else {
            $this->price = 0;
            $this->amount = 0;
        }
    }

    public function updatedQuantity($value)
    {
        if ($this->product_id && $value) {
            $product = ShopProduct::with(['product'])->find($this->product_id);
            
            if ($product) {
                // Live stock check
                if ($product->quantity < $value) {
                    $this->addError('quantity', 'Not enough stock available');
                    return;
                }
                
                $this->amount = $product->product->price * $value;
            }
        } else {
            $this->amount = 0;
        }
    }

    public function addSale()
    {
        $this->validate([
            'product_id' => 'required',
            'customer_id' => 'nullable|string',
            'quantity' => 'required|integer|min:1',
            'amount' => 'numeric',            
        ]);

        $product = ShopProduct::with(['product'])->find($this->product_id);

        // Final stock check
        if ($product->quantity < $this->quantity) {
            $this->addError('quantity', 'Not enough stock available');
            return;
        }

        $this->cart[] = [
            'product_id' => $product->id,
            'product_name' => $product->product->title,
            'price' => $product->product->price,
            'quantity' => $this->quantity,
            'subtotal' => $product->product->price * $this->quantity,
        ];

        // Reset fields
        $this->reset(['product_id', 'quantity', 'amount']);
    }

    public function removeItem($index)
    {
        unset($this->cart[$index]);
        $this->cart = array_values($this->cart);
    }

    public function getTotal()
    {
        return collect($this->cart)->sum('subtotal');
    }

    public function saveSale()
    {
        if (count($this->cart) == 0) {
            session()->flash('error', 'No products added');
            return;
        }

        DB::beginTransaction();

        try { 
            $sale = Sale::create([
                'customer_id' => $this->customer_id,
                'total' => $this->getTotal(),
                'discount' => 0,
                'final' => $this->getTotal(),
                'status' => 1,
            ]);

            foreach ($this->cart as $item) {
                SalesProduct::create([
                    'sale_id' => $sale->id,
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'total' => $item['subtotal'],
                    'amount' => $item['subtotal'], // Using subtotal as amount
                ]);

                // Deduct stock
                $product = ShopProduct::find($item['product_id']);
                $product->quantity -= $item['quantity'];
                $product->save();
            }

            DB::commit();

            $this->reset(['cart', 'customer_id', 'amount']);
            session()->flash('success', 'Sale Completed Successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

    public function render()
    {
        
        return view('livewire.sales.new-sale');
    }
}