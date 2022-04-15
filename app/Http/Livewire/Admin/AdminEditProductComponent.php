<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminEditProductComponent extends Component
{
    public $product;
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
    public $new_image;

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->name = $product->name;
        $this->slug = $product->slug;
        $this->short_description = $product->short_description;
        $this->description = $product->description;
        $this->image = $product->image;
        $this->stock_status = $product->stock_status;
        $this->featured = $product->featured;
        $this->category_id = $product->category_id;
        $this->sale_price = $product->sale_price;
        $this->regular_price = $product->regular_price;
        $this->quantity = $product->quantity;

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

            'stock_status'=>'required',
            'featured'=>'required',
            'category_id'=>'required',
            'sale_price'=>'required',
            'regular_price'=>'required',
            'quantity'=>'required',
        ];
    }

    public function editProduct()
    {
        $this->validate();
        $product = $this->product;
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->short_description = $this->short_description;
        $product->description = $this->description;
        if ($this->new_image)
        {
            $imageName = time()."-".$this->new_image->getClientOriginalName();
            $this->new_image->storeAs('products',$imageName);
            $product->image = $imageName;
        }

        $product->stock_status = $this->stock_status;
        $product->featured = $this->featured;
        $product->category_id = $this->category_id;
        $product->sale_price = $this->sale_price;
        $product->regular_price = $this->regular_price;
        $product->quantity = $this->quantity;
        $product->save();
        $this->dispatchBrowserEvent('sweetalert',['type'=>'success','message'=>'the product has been edited successfully']);
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }
    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.admin-edit-product-component',compact('categories'))->layout('layouts.base');
    }
}
