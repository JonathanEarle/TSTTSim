<?php

namespace App\Http\Livewire;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use App\Models\Phone;

class Admin extends Component
{
    use AuthorizesRequests;
    
    public $phone_id, $brand, $model, $imageSrc, $specs, $prepaidcost, $postpaidcost;
    public $phones;

    /**
     * Controls opening and closing of form to add a new phone
     *
     * @var boolean
     */
    public $isOpen=false;

    /**
     * Renders the admin view
     *
     * @return View
     */
    public function render()
    {
        $this->phones = Phone::all();
        return view('livewire.admin');
    }

    /**
     * Resets the phone form fields and opens the form view
     *
     */
    public function create()
    {
        $this->resetFields();
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
     * Resets the phone form fields
     *
     */
    private function resetFields(){
        $this->brand='';
        $this->model='';
        $this->imageSrc='';
        $this->specs='';
        $this->prepaidcost='';
        $this->postpaidcost='';
    }

    /**
     * Stores the newly added phone or updates an existing one in the database, resests the fields
     * and closes the form
     *
     */
    public function store()
    {
        $this->authorize('create');
        
        $this->validate([
            'brand'=>'required',
            'model'=>'required',
            'imageSrc'=>'required',
            'specs'=>'required|json',
            'prepaidcost'=>'required|numeric',
            'postpaidcost'=>'required|numeric',
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

        $this->closeForm();
        $this->resetFields();
    }

    /**
     * Sets the field values to the ones of th phone to be edited
     *
     * @param int $phone_id Id of the phone being edited
     */
    public function edit($phone_id)
    {
        $this->authorize('update');

        $phone = Phone::findOrFail($phone_id);
        $this->phone_id = $phone_id;
        $this->brand=$phone->brand;
        $this->model=$phone->model;
        $this->imageSrc=$phone->imageSrc;
        $this->specs=$phone->specs;
        $this->prepaidcost=$phone->prepaidcost;
        $this->postpaidcost=$phone->postpaidcost;
    
        $this->openForm();
    }

    /**
     * Deletes the selected phone
     *
     * @param int $phone_id Id of the phone being edited
     */
    public function delete($phone_id)
    {
        $this->authorize('delete');
        Phone::find($phone_id)->delete();
        session()->flash('message', 'Phone Removed');
    }
}
