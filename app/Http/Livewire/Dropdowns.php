<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Provinsi;
use App\Models\Kota;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
class Dropdowns extends Component
{
    public $provinsis;
    public $kotas;
    public $kecamatans;
    public $kelurahans;

    public $selectedProvinsi = null;
    public $selectedKota = null;
    public $selectedKecamatan = null;
    public $selectedKelurahan = null;

    public function mount()
    {
        $this->provinsis = Provinsi::all();
        $this->kotas = collect();
        $this->kecamatans = collect();
        $this->kelurahans = collect();
    }
    public function render()
    {
        return view('livewire.dropdowns');
    }
    public function updatedSelectedProvinsi($provinsi)
    {
        $this->kotas = Kota::where('id_provinsi','$provinsi');
    }
    public function updatedSelectedKota($kota)
    {
        $this->kecamatans = Kecamatan::where('kode_kota','$kota');
    }
    public function updatedSelectedKecamatan($kecamatan)
    {
        $this->kecamatans = Kelurahan::where('kode_kecamatan','$kecamatan');
    }
    public function updatedSelectedKelurahan($kelurahan)
    {
        $this->kecamatans = Rw::where('kode_kelurahan','$kelurahan');
    }
    
    
    
}
