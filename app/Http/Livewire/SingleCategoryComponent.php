<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class SingleCategoryComponent extends Component
{
    public $pageSize;
    public $sorting;
    use WithPagination;
    public $category;
    public function mount(Category $category)
    {
        $this->category = $category;
        $this->pageSize = 12;
        $this->sorting = 'default';
    }
    public function render()
    {
        if ($this->sorting == 'date')
        {
            $products = Product::query()->where('category_id',$this->category->id)->orderBy('created_at','DESC')->paginate($this->pageSize);
        }
        elseif ($this->sorting == 'price')
        {
            $products = Product::query()->where('category_id',$this->category->id)->orderBy('regular_price','ASC')->paginate($this->pageSize);
        }
        elseif ($this->sorting == 'price-desc')
        {
            $products = Product::query()->where('category_id',$this->category->id)->orderBy('regular_price','DESC')->paginate($this->pageSize);
        }
        else{
            $products = Product::query()->where('category_id',$this->category->id)->paginate($this->pageSize);
        }
        $category = $this->category;
        return view('livewire.single-category-component',compact(['products','category']))->layout('layouts.base');
    }
}
