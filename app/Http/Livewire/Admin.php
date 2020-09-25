<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Phone;

class Admin extends Component
{
    public $phone_id, $brand, $model, $imageSrc, $specs, $prepaidcost, $postpaidcost;
    public $phones;
    public $isOpen = 0;

    public function render()
    {
        $this->phones = Phone::all();
        return view('livewire.admin');
    }

    public function create()
    {
        $this->resetFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }
  
    public function closeModal()
    {
        $this->isOpen = false;
    }

    private function resetFields(){
        $this->brand='';
        $this->model='';
        $this->imageSrc='';
        $this->specs='';
        $this->prepaidcost='';
        $this->postpaidcost='';
    }

    public function store()
    {
        $this->validate([
            'brand'=>'required',
            'model'=>'required',
            'imageSrc'=>'required',
            'specs'=>'required',
        ]);

        Phone::updateOrCreate(['id' => $this->phone_id],[
            'brand'=>$this->brand,
            'model'=>$this->model,
            'imageSrc'=>$this->imageSrc,
            'specs'=>json_encode($this->specs),
            'prepaidcost'=>$this->prepaidcost,
            'postpaidcost'=>$this->postpaidcost
        ]);
        session()->flash('message',
        $this->phone_id ? 'Phone Updated':'Phone Added');

        $this->closeModal();
        $this->resetFields();
    }

    public function edit($id)
    {
        $phone = Phone::findOrFail($id);
        $this->phone_id = $id;
        $this->brand=$phone->brand;
        $this->model=$phone->model;
        $this->imageSrc=$phone->imageSrc;
        $this->specs=$phone->specs;
        $this->prepaidcost=$phone->prepaidcost;
        $this->postpaidcost=$phone->postpaidcost;
    
        $this->openModal();
    }

    public function delete($id)
    {
        Phone::find($id)->delete();
        session()->flash('message', 'Phone Removed');
    }
}
