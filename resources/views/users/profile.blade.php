@extends('dashboard.layouts.main')

@section('content')

<div class="content">
    <div class="container-fluid">
        @include('stuffs.alerts')
        <div class="row  pl-5 pr-5 d-flex justify-content-center">
            <div class="col-md-4 ">
                <div class="card card-profile ">
                    <div class="card-avatar "><img src="{{ asset($user->getProfilePic()) }}" style="border-radius:50%;background-size:cover;"  alt="{{$user->avatar}}"/></div>
                    <div class="card-body">
                        <h6 class="card-category text-gray">{{$user->role}}</h6>
                        <h4 class="card-title">{{$user->name}}</h4>
                        <p class="card-description">
                        </p>
                        <table class="table table-sm table-hover table-borderless text-center">
                            <tbody>
                                <tr>
                                    <td><label for="username" class="pull-left">Username</label></td>
                                    <td><p id="username" class="pull-right">{{$user->username}}</p></td>
                                </tr>
                                <tr>
                                    <td><label for="name" class="pull-left">Name</label></td>
                                    <td><p id="name" class="pull-right">{{$user->name}}</p></td>
                                </tr>
                                <tr>
                                    <td><label for="role" class="pull-left">Role</label></td>
                                    <td><p class="pull-right">{{$user->role}}</p></td>
                                </tr>
                                <tr>
                                    <td><label for="number" class="pull-left">Contact Number</label></td>
                                    <td><p id="number" class="pull-right">{{$user->contact_number}}</p></td>
                                </tr>
                                <tr>
                                    <td><label for="email" class="pull-left">Email</label></td>
                                    <td><p id="email" class="pull-right">{{$user->email}}</p></td>
                                </tr>
                            </tbody>
                        </table>
                        <a href="{{route('user.edit',['id' => $user->id])}}" class="btn btn-primary pull-right">EDIT</a>
                    </div>
                </div>
                <div class="card card-profile ">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Sales Profile</h4>
                    </div>
                    <div class="card-body">
                        <h6 class="card-category text-gray">Customers Served</h6>
                        <h4 class="card-title">{{$user->countData(now(), 'served')}}</h4>
                        <p class="card-description">
                        </p>
                        <table class="table table-sm table-hover table-borderless text-center" style="td{padding: 5px 0px;}">
                            <tbody>
                                <tr>
                                    <td><label for="total_reservation" class="pull-left">Total Reservation Value</label></td>
                                    <td><p id="total_reservation" class="pull-right">{{$user->countData(now(), 'total_reservation')}}</p></td>
                                </tr>
                                <tr>
                                    <td><label for="total_expenses" class="pull-left">Total Expenses</label></td>
                                    <td><p id="total_expenses" class="pull-right">{{$user->countData(now(), 'total_expenses')}}</p></td>
                                </tr>
                                <tr>
                                    <td><label for="total_income" class="pull-left">Total Income</label></td>
                                    <td><p class="pull-right">{{$user->countData(now(), 'total_income')}}</p></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-header-primary">
                    <h4 class="card-title">Month of {{now()->format('F Y')}}</h4>
                    </div>
                    
                    <div class="card-body">
                        <table class="table table-sm table-hover table-borderless text-center custom-table" id="served">
                            <thead>
                                <th>Day</th>
                                <th>Customers</th>
                                <th>Sales</th>
                                <th>Expenses</th>
                                <th>Total</th>
                            </thead>
                            <tbody>
                                @for($i = now()->startOfMonth(); $i<=now()->endOfMonth(); $i->addDay())
                                <tr>
                                    <td>{{$i->format('d')}}</td>
                                    <td>{{$user->countData($i, 'customers')}}</td>
                                    <td>{{$user->countData($i, 'sales')}}</td>
                                    <td>{{$user->countData($i, 'expenses')}}</td>
                                    <td>{{$user->countData($i, 'total')}}</td>
                                </tr>
                                @endfor
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection