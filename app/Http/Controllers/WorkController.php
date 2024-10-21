<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\WorkInterface;
// use App\Services\AddressService;
use App\Models\Work;
use App\Http\Requests\StoreWorkRequest;
use App\Http\Requests\UpdateWorkRequest;

class WorkController extends Controller
{
    private WorkInterface $work;

    public function __construct(WorkInterface $work)
    {
        $this->work = $work;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $work=$this->work->get();
        return view('work',compact('work'));
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
    public function store(StoreWorkRequest $request)
    {
        $data = $request->validated();

        $this->work->store($request->validated());

        return to_route('work.index')->with('success', trans('alert.add_success'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Work $work)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Work $work)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWorkRequest $request, Work $work)
    {
        $this->work->update($work->id, $request->validated());

        return to_route('work.index')->with('success', trans('alert.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Work $work)
    {
        try{
            $this->work->delete($work->id);
            return redirect()->back()->with('success', trans('alert.delete_success'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', trans('alert.delete_constrained'));
        }
    }
}
