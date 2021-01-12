<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expenses;
use App\User;


class ExpenseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $expenses = Expenses::orderBy('created_at','desc')->get();
        return view('expense.index', compact('expenses'));
    }
    public function create(Request $request, User $user)
    {
        $this->validate($request,[
            'expenses'=>'required',
            'amount'=>'required'
        ]);
        
        $expenses = new Expenses;
        $expenses->expenses = $request->input('expenses');
        $expenses->amount = $request->input('amount');
        $expenses->user_id = $id;
        $expenses->date = now();
        $expenses->save();

        return back()->with('success','Successfully Saved Expenses');
    }
    public function edit(Expenses $expense){
        $staffs = User::where('role','staff')->get();
        return view('expense.edit', compact('expense','staffs'));
    }
    public function store(Request $request){
        $data = $this->validate($request,[
            'expenses'=>'required',
            'amount'=>'required',
            'date' => 'required',
        ]);
        // $expense = Expenses::create($data);
        $expenses = new Expenses;
        $expenses->expenses = $request->input('expenses');
        $expenses->amount = $request->input('amount');
        $expenses->user_id = $request->input('name');
        $expenses->date = $request->input('date');
        $expenses->save();
        return back()->with('success','Successfully Added a new Expense');

    }
    public function update(Request $request, Expenses $expense){
        $data = $this->validate($request,[
            'expenses'=>'required',
            'amount'=>'required',
            'date' => 'required',
        ]);
        $expense->update($data);
        return back()->with('success','Successfully Updated Expense');

    }
    public function destroy(Expenses $expense){
        $expense->delete();
        return back()->with('error','Successfully Deleted');
    }
    public function add(){
        dd("wtf");
        $staffs = User::where('role','staff')->get();
        return view('expense.add', compact('expense','staffs'));
    }
    public function show(Expenses $expense){
        $staffs = User::where('role','staff')->get();
        return view('expense.add', compact('expense','staffs'));
    }
}
