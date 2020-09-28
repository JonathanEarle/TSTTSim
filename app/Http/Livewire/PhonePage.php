<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Livewire\Component;
use App\Models\Order;
use App\Models\User;
use App\Models\Phone;

class PhonePage extends Component
{
    use AuthorizesRequests;

    public $user_id, $phone_id, $plan, $cost;
    public $email,$address,$phone_no,$brand,$model;
    
    /**
     * The currently authenticated user
     *
     * @var User
     */
    public $user;
    
    /**
     * Phone selected for purcahsing
     *
     * @var Phone
     */
    public $phone;
        
    /**
     * Controls opening and closing of form to add a new phone
     *
     * @var boolean
     */
    public $isOpen=0;

    /**
     * Renders the phone view
     *
     * @return View
     */
    public function render()
    {
        return view('livewire.phone');
    }

    /**
     * Sets the order information and opens the form view
     *
     * @param Phone $phone The phone selected by the user for purchasing
     */
    public function order(Phone $phone)
    {
        $this->setOrderInfo($phone);
        $this->openForm();
    }

    /**
     * Opens the form view using a blade if directive in  store blade file
     *
     */
    public function openForm()
    {
        $this->isOpen = true;
    }
  
    /**
     * Close the form view using a blade if directive in  store blade file
     *
     */
    public function closeForm()
    {
        $this->isOpen = false;
    }

    /**
     * Retrieves the authenticated user and sets theirs and the phone's information needed for the order
     *
     * @param Phone $phone The phone selected by the user for purchasing
     */
    private function setOrderInfo(Phone $phone)
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

    /**
     * Determines if the plan for the new phone is prepaid or postpaid
     * 
     * The determination is based on whether the cost set is the prepaid cost
     * if not then it must be the postpaid cost, the value selection is ridgid.
     *
     * @param Phone $phone The phone selected by the user for purchasing
     * @param float $cost Cost of the plan selected by the user
     * 
     * @return boolean The plan choosen by the customer (Fasle-prepaid, True-postpaid)
     */
    private function getPlan(Phone $phone, $cost)
    {
        return $phone->prepaidcost==$cost;
    }

    /**
     * Stores the phone order in the database and closes the form
     *
     */
    public function store()
    {
        $this->authorize('create',Order::class);
        
        $this->plan=$this->getPlan($this->phone,$this->cost);

        $this->validate([
            'user_id'=>'required',
            'phone_id'=>'required',
            'plan'=>'required|boolean',
            'cost'=>'required|numeric'
        ]);

        $newOrder = Order::create([
            'user_id'=>$this->user_id,
            'phone_id'=>$this->phone_id,
            'plan'=>$this->plan,
            'cost'=>$this->cost
        ]);
        $newOrder->save();

        session()->flash('message','Order Made');
        
        $this->closeForm();
    }

    /**
     * Recieves the phone id passed through the URI
     *
     * @param int $phone_id The id of the phone selected by the user
     * 
     */
    public function mount($phone_id)
    {
        $this->phone=Phone::find($phone_id);
    }
}
