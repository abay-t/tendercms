<?php

namespace App\Http\Controllers;

use App\Predmet;
use Illuminate\Http\Request;
use Auth;

class PredmetController extends Controller
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
        $name = 'predmet';
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
        $predmet = Predmet::create([
            'name' => $request['name']
        ]);
        return redirect('admin/predmets')->with('message', 'Предмет добавлен');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Predmet  $predmet
     * @return \Illuminate\Http\Response
     */
    public function show(Predmet $predmet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Predmet  $predmet
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $predmet = Predmet::find($id);
        $name = 'predmet';
        if(Auth::user()->type == 'admin')
            return view('editportal', ['portal' => $predmet, 'name' => $name]);
        else
            abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Predmet  $predmet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $predmet = Predmet::find($id);
        $predmet->name = $request->name;
        $predmet->save();
        return redirect('admin/predmets')->with('message', 'Предмет обновлен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Predmet  $predmet
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $predmet = Predmet::find($id);    
        $predmet->delete();
        return redirect()->back()->with('message', 'Предмет удален');
    }
}
