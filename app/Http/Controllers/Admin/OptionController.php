<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\OptionsFromRequest;
use App\Http\Requests\Admin\OptionsFromRequests;
use App\Models\Option;


class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.options.index',['options'=> Option::orderBy('created_at', 'desc')->paginate(25)]);
    }

    /**
     * Show the form for creating a new resource.
     */
  public function create()
{
    $option = new Option();

    return view('admin.options.form', [
        'option' => $option
    ]);
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(OptionsFromRequests $request)
    {
       $option = Option::create($request->validated());
       return to_route('admin.option.index')->with('success', 'L\'option a été bien créé');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Option $option)
    {
        return view('admin.options.form', ['option'=>$option]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OptionsFromRequests $request, Option $option)
    {
        $option->update($request->validated());
        return to_route('admin.option.index')->with('success', 'L\'optiona été bien modifier');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Option $option)
    {
        $option->delete();
        return to_route('admin.option.index')->with('success', 'l\'option a ete supprimer');
    }
}
