<?php

namespace App\Http\Controllers;

use App\Models\Practice;
use Illuminate\Http\Request;

class PracticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Practice::all();
        return view('practice.index', compact('data'));
        // return view('practice.index', with('value', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('practice.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Practice::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        // $data = new Practice();
        // $data->name = $request->name;
        // $data->save();

        return redirect()->route('practice.index')->with('msg', 'Date inserted successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Practice  $practice
     * @return \Illuminate\Http\Response
     */
    public function show(Practice $practice)
    {
        return view('practice.show', compact('practice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Practice  $practice
     * @return \Illuminate\Http\Response
     */
    public function edit(Practice $practice)
    {
        return view('practice.edit', compact('practice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Practice  $practice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Practice $practice)
    {
        $practice->name = $request->name;
        $practice->description = $request->description;
        $practice->price = $request->price;
        $practice->save();

        return redirect()->route('practice.index')->with('msg', 'Data update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Practice  $practice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Practice $practice)
    {
        // if ($practice) {
        //     $practice->delete();
        // }

        // dd($practice);

        $practice->delete();

        return redirect()->back()->with('msg', 'Data Delete Successfully');
    }
}
