<?php

namespace App\Http\Controllers;

use App\Tip;
use Illuminate\Http\Request;
use Auth;

class TipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $name = 'tip';
        return view('addportal', ['name' => $name]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tip = Tip::create([
            'name' => $request['name']
        ]);
        return redirect('admin/tips')->with('message', 'Тип добавлен');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tip  $tip
     * @return \Illuminate\Http\Response
     */
    public function show(Tip $tip)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tip  $tip
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tip = Tip::find($id);
        $name = 'tip';
        if(Auth::user()->type == 'admin')
            return view('editportal', ['portal' => $tip, 'name' => $name]);
        else
            abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tip  $tip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tip = Tip::find($id);
        $tip->name = $request->name;
        $tip->save();
        return redirect('admin/tips')->with('message', 'Тип обновлен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tip  $tip
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tip = Tip::find($id);    
        $tip->delete();
        return redirect()->back()->with('message', 'Тип удален');
    }
}
