<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\AddressInterface;
use App\Services\AddressService;
use App\Models\Address;
use App\Http\Requests\StoreAddressRequest;
use App\Http\Requests\UpdateAddressRequest;

class AddressController extends Controller
{
    private AddressInterface $address;

    public function __construct(AddressInterface $address)
    {
        $this->address = $address;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $address=$this->address->get();
        return view('address',compact('address'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAddressRequest $request)
    {
        $data = $request->validated();

        $this->address->store($request->validated());

        return to_route('address.index')->with('success', trans('alert.add_success'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Address $address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Address $address)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAddressRequest $request, Address $address)
    {
        $this->address->update($address->id, $request->validated());

        return to_route('address.index')->with('success', trans('alert.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Address $address)
    {
        try{
            $this->address->delete($address->id);
            return redirect()->back()->with('success', trans('alert.delete_success'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', trans('alert.delete_constrained'));
        }
    }
}
