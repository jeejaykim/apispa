<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Addon;
use App\Reservation;

class AddOnController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $addons = Addon::get();
        return view('addon.index', compact('addons'));
    } 
    public function create()
    {
        return view('addon.create');
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'option'=>'required',
            'price'=>'required'
        ]);
        $addon = Addon::create($data);
        return redirect()->route('addon.index')->with('success','New Addon Added');
    }

    public function show(Addon $addon)
    {
        return view('addon.update',compact('addon'));
    }

    public function update(Request $request, Addon $addon)
    {
        $data = $this->validate($request, [
            'option'=>'required',
            'price'=>'required'
        ]);

        $addon->update($data);
        return back()->with('success','Addon Updated');
    }

    public function destroy(Addon $addon)
    {
        $addon->delete();
        return redirect()->route('addon.index')->with('error','Add-on Deleted');
    }
}
