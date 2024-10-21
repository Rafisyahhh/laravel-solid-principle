<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\AddressInterface;
use App\Contracts\Interfaces\EducationInterface;
use App\Contracts\Interfaces\WorkInterface;
use App\Contracts\Interfaces\ResidentInterface;
use App\Contracts\Interfaces\StatusInterface;
use App\Services\ResidentService;
use App\Models\Resident;
use App\Http\Requests\StoreResidentRequest;
use App\Http\Requests\UpdateResidentRequest;

class ResidentController extends Controller
{
    private ResidentInterface $resident;
    private AddressInterface $address;
    private EducationInterface $education;
    private WorkInterface $work;
    private StatusInterface $status;
    private ResidentService $service;

    public function __construct(ResidentInterface $resident, AddressInterface $address, EducationInterface $education, WorkInterface $work, StatusInterface $status, ResidentService $service)
    {
        $this->resident = $resident;
        $this->address = $address;
        $this->education = $education;
        $this->work = $work;
        $this->status = $status;
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $resident = $this->resident->get();
        $address = $this->address->get();
        $education = $this->education->get();
        $work = $this->work->get();
        $status = $this->status->get();

        return view('resident', compact('resident', 'address', 'education', 'work', 'status'));
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
    public function store(StoreResidentRequest $request)
    {
        $store = $this->service->store($request);

        $this->resident->store($store);

        return to_route('resident.index')->with('success', trans('alert.add_success'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Resident $resident)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Resident $resident)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateResidentRequest $request, Resident $resident)
    {
        $store = $this->service->update($request, $resident);

        $this->resident->update($resident->id, $store);

        return to_route('resident.index')->with('success', trans('alert.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Resident $resident)
    {
        try{
            $this->resident->delete($resident->id);
            $this->service->remove($resident->foto);
            return redirect()->back()->with('success',trans('alert.delete_success'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',trans('alert.delete_failed'));
        }
    }
}
