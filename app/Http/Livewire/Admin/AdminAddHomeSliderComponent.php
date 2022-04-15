<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminAddHomeSliderComponent extends Component
{
    use WithFileUploads;
    public $title;
    public $subtitle;
    public $link;
    public $image;
    public $price;
    public $status;

    public function mount()
    {
        $this->status = 0;
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
            'image'=>'required',
            'link'=>'required',
            'price'=>'required',
        ];
    }
    public function addSlide()
    {
        $this->validate();
        $slide = new HomeSlider();
        $slide->title = $this->title;
        $slide->subtitle = $this->subtitle;
        $slide->link = $this->link;
        $slide->price = $this->price;
        $slide->status = $this->status;
        $imageName = time()."-".$this->image->getClientOriginalname();
        $this->image->storeAs('',$imageName);
        $slide->image = $imageName;
        $slide->save();
        $this->dispatchBrowserEvent('sweetalert',['type'=>'success','message'=>'the Slide has been added successfully']);
    }
    public function render()
    {
        return view('livewire.admin.admin-add-home-slider-component')->layout('layouts.base');
    }
}
