<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\ResidentInterface;
use App\Contracts\Interfaces\AddressInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private ResidentInterface $resident;
    private AddressInterface $address;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ResidentInterface $resident,AddressInterface $address)
    {
        $this->middleware('auth');
        $this->resident = $resident;
        $this->address = $address;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $resident = $this->resident->count();
        $address = $this->address->count();
        return view('home',compact('resident','address'));
    }
}
