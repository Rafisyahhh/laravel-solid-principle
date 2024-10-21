<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\AddressInterface;
use App\Contracts\Interfaces\FamilyInterface;
use App\Models\Family;
use App\Http\Requests\StoreFamilyRequest;
use App\Http\Requests\UpdateFamilyRequest;

class FamilyController extends Controller
{
    private FamilyInterface $family;
    private AddressInterface $address;

    public function __construct(FamilyInterface $family, AddressInterface $address)
    {
        $this->family = $family;
        $this->address = $address;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $family = $this->family->get();
        $address = $this->address->get();

        return view('family', compact('family', 'address'));
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
    public function store(StoreFamilyRequest $request)
    {
        $data = $request->validated();

        $this->family->store($request->validated());

        return to_route('family.index')->with('success', trans('alert.add_success'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Family $family)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Family $family)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFamilyRequest $request, Family $family)
    {
        $this->family->update($family->id, $request->validated());

        return to_route('family.index')->with('success', trans('alert.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Family $family)
    {
        try{
            $this->family->delete($family->id);
            return redirect()->back()->with('success', trans('alert.delete_success'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', trans('alert.delete_failed'));
        }
    }
}
