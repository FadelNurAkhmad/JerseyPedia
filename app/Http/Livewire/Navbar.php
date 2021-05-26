<?php

namespace App\Http\Livewire;

use App\Pesanan;
use App\PesananDetail;
use App\Liga;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Navbar extends Component
{
    public $jumlah=0;

    protected $listeners = [
        'masukKeranjang' => 'updateKeranjang'
    ];

    public function updateKeranjang(){
        if(Auth::user()){
            // apabila status 0 maka tidak dikeluarkan notifnya
            $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
            if($pesanan)
            {
                $this->jumlah = PesananDetail::where('pesanan_id', $pesanan->id)->count();
            }else{
                $this->jumlah = 0;
            }
        }    
    }

    public function mount()
    {
        if(Auth::user()){
            // apabila status 0 maka tidak dikeluarkan notifnya
            $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
            if($pesanan)
            {
                $this->jumlah = PesananDetail::where('pesanan_id', $pesanan->id)->count();
            }else{
                $this->jumlah = 0;
            }
        }       
    }

    public function render()
    {
        return view('livewire.navbar', [
            'ligas' => Liga::all(),
            'jumlah_pesanan' =>$this->jumlah,
        ]);
    }
}
