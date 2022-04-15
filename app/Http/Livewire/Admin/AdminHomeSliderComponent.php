<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use Livewire\Component;

class AdminHomeSliderComponent extends Component
{
    public function delete(HomeSlider $slider)
    {
        dd($slider->title);
    }
    public function render()
    {
        $homeSlides = HomeSlider::query()->latest()->get();
        return view('livewire.admin.admin-home-slider-component',compact('homeSlides'))->layout('layouts.base');
    }
}
