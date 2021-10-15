<?php

namespace App\Http\Controllers\Todo;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use Illuminate\Http\Request;
use Session;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $todos = Todo::where('status', 0)->orderBy('created_at', 'DESC')->get();
        // $complete = Todo::where('status', 1)->orderBy('updated_at', 'DESC')->get();

        $todos = Todo::get();

        dd($todos);




        dd($todos);


        $today = date('d-m-Y');
        echo $today;


        // return view('todo.index', compact(['todos', 'complete']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);

        Todo::create([
            'title' => $request->title,
            'description' => $request->description
        ]);

        Session::flash('success', 'Todo create successfully');
        return redirect()->route('todo.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo = Todo::findOrFail($id);

        return view('todo.edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);

        $todo = Todo::findOrFail($id);
        $todo->title=$request->title;
        $todo->description=$request->description;
        $todo->save();

        return redirect()->route('todo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo = Todo::findOrFail($id);

        if ($todo) {
            $todo->delete();
        }

        return redirect()->back();
    }


    public function todoDone(Request $request, $id)
    {

        $todo = Todo::findOrFail($id);
        $todo->status = 1;
        $todo->save();
        return redirect()->route('todo.index');

        // $todo = Todo::findOrFail('id');
        // dd($id);

        // $todo->status = 1;
        // $todo->save();
        // return redirect()->route('todo.index');
    }
}
