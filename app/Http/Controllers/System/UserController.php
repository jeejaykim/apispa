<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Reservation;
use App\Attendance;
use App\Expenses;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $staffs = User::where('role', 'staff')->get();
        return view('users.index',compact('staffs'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'name'=>'required', 'string', 'max:255',
            'username'=>'required', 'string', 'max:16','unique:users',
            'contact_number'=> 'required', 'string', 'max:16',
            'email'=>'required', 'string', 'email', 'max:255', 'unique:user',
            'password'=>'required', 'string', 'min:6', 'confirmed',
            'confirm_password'=>'required',
            'role'=>'required',
        ]);
        $user = User::create($data);
        return redirect()->route('user.index')->with('success','New User Added');
    }

    public function show(User $user)
    {
        return view('users.update',compact('user'));
    }
    public function setting(User $user)
    {
        return view('users.setting',compact('user'));
    }

    public function edit(User $user)
    {
        $reservations = empty(Auth::user()) ?  Reservation::where('id', Auth::user()->id)->get() : Reservation::where('id', $user->id)->get();
        return view( 'users.edit', compact('reservations','user') );
    }

    public function update(Request $request, User $user)
    {
        $data = $this->validate($request,[
            'name'=>'required', 'string', 'max:255',
            'username'=>'required', 'string', 'max:16','unique:users',
            'contact_number'=> 'required', 'string', 'max:16',
            'email'=>'required', 'string', 'email', 'max:255', 'unique:user',
        ]);
        $user->update($data);
        return back()->with('success','Successfully Update Profile');
    }
    public function update_password(Request $request, User $user){
        $this->validate($request,[
            'old_password' => ['required', 'string'],
            'password' => ['required', 'string', 'min:6', 'confirmed']
        ]);
        if (Hash::check($request->old_password, $user->password)) {
            return back()->with('error','Invalid Current Password');
        }

        $user->password = Hash::make($request->password);
        $user->save();
        return back()->with('success','Successfully Update Password');
    }

    public function activate(User $user){
        $user->status = 1;
        $user->save();
        $this->createAttendance($user);
        return redirect()->route('user.index')->with('success','User Activated');
    }

    public function deactivate(User $user){
        $user->status = 0;
        $user->save();
        $this->createAttendance($user);
        return redirect()->route('user.index')->with('error','User Deactivated');
    }

    public function destroy(User $user){
        $user->delete();
        return redirect()->route('user.index')->with('error','User Removed');
    }

    public function profile(User $user)
    {
        return view('users.profile', compact('user'));
    }

    public function avatar(Request $request, User $user)
    {
        $this->validate($request, [ 'avatar'=> 'image|required' ]);
        if($request->hasFile('avatar')){
            $fileNameWithExt = $request->file('avatar')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('avatar')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension; 
            $path = $request->file('avatar')->storeAs('public/avatars',$fileNameToStore);
        }
        $user->avatar = $fileNameToStore;
        $user->save();
        return back()->with('success','Successfully Updated Profile');
    }
    public function createAttendance(User $user){
        $attendance = Attendance::where('user_id',$user->id)->where('date',now()->format('Y-m-d'))->first();
        $attendance = $attendance ? $attendance : new Attendance();
        $attendance->user_id = $user->id;
        $attendance->date = now();
        $attendance->status = $user->status;
        $attendance->id ? $attendance->update() : $attendance->save();
    }
    public function add_expense(Request $request, $id)
    {
        $this->validate($request,[
            'expenses'=>'required',
            'amount'=>'required'
            
        ]);
        
        $expenses = new Expenses;
        $expenses->expenses = $request->input('expenses');
        $expenses->amount = $request->input('amount');
        $expenses->user_id = $id;
        $expenses->save();

        return back()->with('success','Successfully Saved Expenses');
    }
    public function expense($id){
        $staff = User::find($id);
        return view('expense.add',compact('staff'));
    }
}
