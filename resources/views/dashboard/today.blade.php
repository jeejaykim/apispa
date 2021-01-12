@extends('dashboard.layouts.main')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header card-header-primary d-flex justify-content-between">
                    <h4 class="card-title">Schedule for {{Carbon::now()->toFormattedDateString()}}</h4>
                    <p class="card-category"></p>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-sm table-hover table-borderless text-center">
                        <thead class="thead">
                            <tr>
                                <th>Time</th>
                                @foreach($users as $user)
                                <th class="image_container">
                                    <img src="{{ asset($user->getProfilePic()) }}" alt="" class="table-avatar" style="height:auto;width:15vh;">
                                </th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @include('reservations.list')
                            <tr>
                                <td>TOTAL</td>
                                @foreach($users as $user)
                                <td>
                                </td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <div class="card">
                <div class="card-header card-header-primary d-flex justify-content-between">
                    <h4 class="card-title">Expenses for {{Carbon::now()->toFormattedDateString()}}</h4>
                    <p class="card-category"></p>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-sm table-hover table-borderless text-center">
                        <thead class="thead">
                            <tr>
                                <th>Name of Person</th>
                                <th>Expenses</th>
                                <th>Total</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(Auth::user()->role == "admin")
                            @foreach($users as $staff)
                            <tr>
                                <td><h5>{{$staff->name}}</h5></td>
                                <td>
                                    
                                    <table class="table table-sm table-hover table-borderless text-center">
                                        
                                        <tbody >
                                            @foreach($staff->getExpenses() as $expense)
                                            <tr>
                                                <td style="text-align: right;">
                                                    {{ $expense->expenses}}
                                                </td>
                                                <td style="text-align: right;">
                                                    {{ $expense->amount}}
                                                </td>
                                                <td>
                                                    <a href="{{ route('expense.edit', ['expense' => $expense->id]) }}" class="btn btn-primary" ><i class="material-icons">edit</i></a>
                                                    
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </td>
                                <td>
                                    <h5>{{$staff->getExpense()}}</h5>
                                </td>
                                <td>
                                    <a href="{{route('expense.add' , ['id' => $staff->id])}}" class="btn btn-primary text-uppercase pull-right" ><i class="material-icons">add</i></a>
                                </td>
                            </td>
                        </tr> 
                        @endforeach
                        @else
                        <tr>
                            <td>{{Auth::user()->name}}</td>
                            <td>{{Auth::user()->getExpense()}}</td> 
                            <td><a href="{{route('expense.add' , ['id' => Auth::user()->id])}}" class="btn btn-primary text-uppercase pull-right" >Add Expenses</a></td>
                        </tr>
                        @endif
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
@endsection