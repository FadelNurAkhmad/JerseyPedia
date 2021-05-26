<?php

namespace App\Http\Livewire;

use App\Pesanan;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class History extends Component
{
    public $pesanans;

    public function render()
    {
        if(Auth::user())
        {
            // tidak boleh = 0 karena kalau 0 berarti masih di keranjang
            $this->pesanans = Pesanan::where('user_id', Auth::user()->id)->where('status', '!=', 0)->get();
        }
        
        return view('livewire.history');
    }
}