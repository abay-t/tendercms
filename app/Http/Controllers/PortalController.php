<?php

namespace App\Http\Controllers;

use App\Portal;
use Illuminate\Http\Request;
use Auth;

class PortalController extends Controller
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
        $name = 'portal';
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
        $portal = Portal::create([
            'name' => $request['name']
        ]);
        return redirect('admin/portals')->with('message', 'Портал добавлен');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Portal  $portal
     * @return \Illuminate\Http\Response
     */
    public function show(Portal $portal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Portal  $portal
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $portal = Portal::find($id);
        $name = 'portal';
        if(Auth::user()->type == 'admin')
            return view('editportal', ['portal' => $portal, 'name' => $name]);
        else
            abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Portal  $portal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $portal = Portal::find($id);
        $portal->name = $request->name;
        $portal->save();
        return redirect('admin/portals')->with('message', 'Портал обновлен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Portal  $portal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $portal = Portal::find($id);    
        $portal->delete();
        return redirect()->back()->with('message', 'Портал удален');
    }
}
