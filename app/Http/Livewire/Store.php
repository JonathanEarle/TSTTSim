<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;

use Livewire\Component;
use App\Models\Phone;
use App\Models\Order;
use App\Models\User;

class Store extends Component
{
    public $user_id, $phone_id, $plan, $cost, $phones;
    public $email,$address,$phone_no,$brand,$model;
    public $user, $phone;
    public $isOpen=0;

    public function render()
    {
        $this->phones = Phone::all();
        return view('livewire.store');
    }

    public function order(Phone $phone)
    {
        $this->getOrderData($phone);
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

    private function getOrderData(Phone $phone)
    {
        if (!Auth::check())
            return session()->flash('message','Must be logged in to purchase.'); 
        
        $this->user=Auth::user();

        $this->user_id=$this->user->id;
        $this->email=$this->user->email;
        $this->address=$this->user->address;
        $this->phone_no=$this->user->phone_no;

        $this->phone=$phone;        
        $this->phone_id=$this->phone->id;
        $this->brand=$this->phone->brand;
        $this->model=$this->phone->model;

        $this->cost=$this->phone->prepaidcost; //Default plan is prepaid
    }

    private function getPlan(Phone $phone,$cost)
    {
        return $phone->prepaidcost==$cost ? 0 : 1; //0-prepaid, 1-postpaid
    }

    public function purchase()
    {
        $this->plan=$this->getPlan($this->phone,$this->cost);

        $this->validate([
            'user_id'=>'required',
            'phone_id'=>'required',
            'plan'=>'required',
            'cost'=>'required'
        ]);

        $newOrder = Order::create([
            'user_id'=>$this->user_id,
            'phone_id'=>$this->phone_id,
            'plan'=>$this->plan,
            'cost'=>$this->cost
        ]);
        $newOrder->save();

        session()->flash('message','Order Made');
        
        $this->closeModal();
    }
}
