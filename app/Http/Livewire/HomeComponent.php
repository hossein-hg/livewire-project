<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\HomeCategory;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Support\Collection;
use Livewire\Component;

class HomeComponent extends Component
{
    public function mount()
    {




    }
    public function render()
    {
        $sale_products = Product::query()->where('sale_price','>',0)->limit(8)->get();
        $latest_products = Product::query()->orderBy('created_at','DESC')->limit(8)->get();
        $sale = Sale::query()->find(1);
        $categories = HomeCategory::query()->find(1);
        $categories_ideas = explode(',',$categories->cate_ideas);
        $no_of_products = $categories->no_of_products;
        $categories = Category::query()->whereIn('id',$categories_ideas)->get();

        return view('livewire.home-component',compact(['latest_products','sale_products','sale','categories','no_of_products']))->layout('layouts.base');
    }
}
