<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Request;

use Livewire\Component;
use App\Models\Phone;
use App\Models\Order;

class Store extends Component
{
    public $user_id, $phone_id, $plan, $cost, $phones,$orders,$show;

    public function render()
    {
        $this->phones = Phone::all();
        return view('livewire.store');
    }

    private function calculateCost($phone_id,$plan)
    {
        return $plan ? Phone::select('postpaidcost')->where('id', $phone_id)->first()['postpaidcost'] : 
            Phone::select('prepaidcost')->where('id', $phone_id)->first()['prepaidcost'];
    }

    public function order($phone_id,$plan)
    {
        $this->orders = Order::all();
        if (!Auth::check())
            return session()->flash('message','Must be logged in to purchase.'); 
        
        $this->user_id=Auth::id();

        $this->phone_id=$phone_id;
        $this->plan=$plan;
        $this->cost=$this->calculateCost($this->phone_id, $this->plan);

        $this->validate([
            'user_id'=>'required',
            'phone_id'=>'required',
            'plan'=>'required',
            'cost'=>'required'
        ]);

        $this->show=true;
        $newOrder = Order::create([
            'user_id'=>$this->user_id,
            'phone_id'=>$this->phone_id,
            'plan'=>$this->plan,
            'cost'=>$this->cost
        ]);
        $newOrder->save();

        session()->flash('message','Order Made');
    }
}
