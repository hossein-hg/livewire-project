<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminAddProductComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $image;
    public $stock_status;
    public $featured;
    public $category_id;
    public $sale_price;
    public $regular_price;
    public $quantity;

    public function mount()
    {
        $this->featured = 0;
        $this->stock_status = 'inStock';
    }
    public function updated($field)
    {
        $this->validateOnly($field);
    }

    public function rules()
    {
        return [
             'name'=>'required',
             'slug'=>'required',
             'short_description'=>'required',
             'description'=>'required',
             'image'=>'required',
             'stock_status'=>'required',
             'featured'=>'required',
             'category_id'=>'required',
             'sale_price'=>'required',
             'regular_price'=>'required',
             'quantity'=>'required',
        ];
    }

    public function addProduct()
    {
        $this->validate();
        $product = new Product();
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->short_description = $this->short_description;
        $product->description = $this->description;
        $imageName = time()."-".$this->image->getClientOriginalName();
        $this->image->storeAs('products',$imageName);
        $product->image = $imageName;
        $product->stock_status = $this->stock_status;
        $product->featured = $this->featured;
        $product->category_id = $this->category_id;
        $product->sale_price = $this->sale_price;
        $product->regular_price = $this->regular_price;
        $product->quantity = $this->quantity;
        $product->save();
        $this->dispatchBrowserEvent('sweetalert',['type'=>'success','message'=>'the product has been added successfully']);
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }
    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.admin-add-product-component',compact('categories'))->layout('layouts.base');
    }
}
