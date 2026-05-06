<?php

namespace App\Livewire\Houseware;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;

class EditProduct extends Component
{


     use WithFileUploads;

                 public $category_id;
                 public $brand_id;
                 public $title;
                 public $description;
                 public $quantity;
                 public $price;
                 public $thumbnail;
                 public $productId;
                 public $logopath;


    public function mount($id)
    {
        $this->productId = $id;
        $product = Product::findOrFail($this->productId);
        $this->brand_id = $product->brand_id;
        $this->category_id = $product->category_id;
        $this->title = $product->title;
        $this->description = $product->description;
        $this->price = $product->price;
        $this->quantity = $product->quantity;
        // $this->thumbnail = $product->thumbnail;
        
    }


 protected $rules = [
        'brand_id' => 'required|numeric|exists:brands,id',
        'category_id' => 'required|numeric|exists:categories,id',
        'title' => 'required|string',
        'description' => 'nullable|string',
        'price' => 'nullable|numeric',
        'quantity' => 'required|numeric|min:0',
        'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ];


     public function updateProduct()
    {
        $this->validate();

       

        $product = product::findOrFail($this->productId);
        $product->brand_id = $this->brand_id;
        $product->category_id = $this->category_id;
        $product->title = $this->title;
        $product->description = $this->description;
        $product->price = $this->price;
        $product->quantity = $this->quantity;
        
         if ($this->thumbnail instanceof \Livewire\TemporaryUploadedFile) {
    $filename = 'product_' . time() . '.jpg';
    $path = $this->thumbnail->storeAs('thumbnail', $filename, 'public');
    $product->thumbnail = $path;
}

        $product->save();
        
        session()->flash('success','Record Updated Successfully');
        return redirect()->route('warehouse.stock-management');
        
    }

    public function render()
    {
        $brands=Brand::all();
        $categories=Category::all();
        return view('livewire.houseware.edit-product',compact('brands','categories'));
    }

   
}
