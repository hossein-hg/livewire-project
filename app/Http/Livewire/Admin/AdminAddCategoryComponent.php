<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\Component;

class AdminAddCategoryComponent extends Component
{
    public $name;
    public $slug;

    public function updated($field)
    {
        $this->validateOnly($field);
    }

    public function rules()
    {
        return [
            'name'=>'required|max:100',
            'slug'=>'required|max:100',
        ];
    }
    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }
    public function addCategory()
    {
        $this->validate();
        $category = new Category();
        $category->name = $this->name;
        $category->slug = $this->slug;
        $category->save();
        $this->dispatchBrowserEvent('sweetalert',['type'=>'success','message'=>'the category has been added successfully']);
    }
    public function render()
    {
        return view('livewire.admin.admin-add-category-component')->layout('layouts.base');
    }
}
