<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Phone;

class Store extends Component
{
    /**
     * All the phones in the database
     *
     * @var Phones
     */   
    public  $phones;

    /**
     * Renders the admin view
     *
     * @return View
     */
    public function render()
    {
        $this->phones = Phone::all();
        return view('livewire.store');
    }

    /**
     * Redirects user to selectd phone page
     *
     * @return Redirector 
     */
    public function viewPhone($phone_id)
    {
        return redirect()->to('store/phones/'.strval($phone_id));
    }
}
