<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminEditHomeSliderComponent extends Component
{
    use WithFileUploads;
    public $homeSlider;
    public $title;
    public $subtitle;
    public $link;
    public $image;
    public $new_image;
    public $price;
    public $status;

    public function mount(HomeSlider $homeSlider)
    {
        $this->homeSlider = $homeSlider;
        $this->status = $homeSlider->status;
        $this->title = $homeSlider->title;
        $this->subtitle = $homeSlider->subtitle;
        $this->link = $homeSlider->link;
        $this->image = $homeSlider->image;
        $this->price = $homeSlider->price;
    }

    public function updated($field)
    {
        $this->validateOnly($field);

    }

    public function rules()
    {
        return [
            'title'=>'required',
            'subtitle'=>'required',

            'link'=>'required',
            'price'=>'required',
        ];
    }
    public function updateSlide()
    {
        $this->validate();
        $slide = $this->homeSlider;
        $slide->title = $this->title;
        $slide->subtitle = $this->subtitle;
        $slide->link = $this->link;
        $slide->price = $this->price;
        $slide->status = $this->status;
        if ($this->new_image)
        {
            $imageName = time()."-".$this->new_image->getClientOriginalname();
            $this->new_image->storeAs('',$imageName);
            $slide->image = $imageName;
        }

        $slide->save();
        $this->dispatchBrowserEvent('sweetalert',['type'=>'success','message'=>'the Slide has been edited successfully']);
    }
    public function render()
    {
        return view('livewire.admin.admin-edit-home-slider-component')->layout('layouts.base');
    }
}
