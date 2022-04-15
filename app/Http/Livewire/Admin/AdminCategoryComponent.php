<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;

class AdminCategoryComponent extends Component
{
    public function delete(Category $category)
    {
        $category->delete();
        $this->dispatchBrowserEvent('sweetalert',['type'=>'success','message'=>'the category has been deleted successfully']);
    }
    public function render()
    {
        $categories = Category::query()->latest()->get();
        return view('livewire.admin.admin-category-component',compact('categories'))->layout('layouts.base');
    }
}
