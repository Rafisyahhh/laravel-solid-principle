<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\StatusInterface;
// use App\Services\AddressService;
use App\Models\Status;
use App\Http\Requests\StoreStatusRequest;
use App\Http\Requests\UpdateStatusRequest;

class StatusController extends Controller
{
    private StatusInterface $status;

    public function __construct(StatusInterface $status)
    {
        $this->status = $status;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $status=$this->status->get();
        return view('status',compact('status'));
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
    public function store(StoreStatusRequest $request)
    {
        $data = $request->validated();

        $this->status->store($request->validated());

        return to_route('status.index')->with('success', trans('alert.add_success'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Status $status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Status $status)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStatusRequest $request, Status $status)
    {
        $this->status->update($status->id, $request->validated());

        return to_route('status.index')->with('success', trans('alert.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Status $status)
    {
        try{
            $this->status->delete($status->id);
            return redirect()->back()->with('success', trans('alert.delete_success'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', trans('alert.delete_constrained'));
        }
    }
}
