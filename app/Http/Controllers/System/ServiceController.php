<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services;
use App\Category;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $services = Services::get();
        return view('service.index', compact('services'));
    }


    public function create()
    {
        $categories = Category::get();
        return view('service.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'name'=>'required',
            'category_id'=>'required',
            'minutes'=>'required',
            'price'=>'required'
        ]);
        $service = Services::create($data);
        return redirect()->route('service.index')->with('success','New Service Added');
    }

    public function show(Services $service)
    {
        $categories = Category::get();
        return view('service.update',compact('service','categories'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, Services $service)
    {
        $data = $this->validate($request,[
            'name'=>'required',
            'price'=>'required',
            'category' => 'required'
        ]);
        $service->update($data);
        return back()->with('success','Service Updated');
    }

    public function destroy(Services $service)
    {
        $service->delete();
        return redirect()->route('service.index')->with('error','Service Removed');
    }
    
}
