<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\EducationInterface;
use App\Services\EducationService;
use App\Models\Education;
use App\Http\Requests\StoreEducationRequest;
use App\Http\Requests\UpdateEducationRequest;

class EducationController extends Controller
{
    private EducationInterface $education;

    public function __construct(EducationInterface $education)
    {
        $this->education = $education;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $education=$this->education->get();
        return view('education',compact('education'));
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
    public function store(StoreEducationRequest $request)
    {
        $data = $request->validated();

        $this->education->store($request->validated());

        return to_route('education.index')->with('success', trans('alert.add_success'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Education $education)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Education $education)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEducationRequest $request, Education $education)
    {
        $this->education->update($education->id, $request->validated());

        return to_route('education.index')->with('success', trans('alert.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Education $education)
    {
        try{
            $this->education->delete($education->id);
            return redirect()->back()->with('success', trans('alert.delete_success'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', trans('alert.delete_constrained'));
        }
    }
}
