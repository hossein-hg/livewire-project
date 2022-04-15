<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\HomeCategory;
use Livewire\Component;

class AdminHomeCategoryComponent extends Component
{
    public $no_of_products;
    public $cate_ideas;

    public function mount()
    {
        $homeCategory = HomeCategory::query()->find(1);
        $this->cate_ideas = explode(',',$homeCategory->cate_ideas);
        $this->no_of_products = $homeCategory->no_of_products;
    }
    public function update()
    {
        $homeCategory = HomeCategory::query()->find(1);
        $homeCategory->cate_ideas = implode(',',$this->cate_ideas);
        $homeCategory->no_of_products = $this->no_of_products;
        $homeCategory->save();
        $this->dispatchBrowserEvent('sweetalert',['type'=>'success','message'=>'home category has been updated successfully']);

    }
    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.admin-home-category-component',compact('categories'))->layout('layouts.base');
    }
}
