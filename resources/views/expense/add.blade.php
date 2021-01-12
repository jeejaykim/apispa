@extends('dashboard.layouts.main')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="col-lg-12 col-md-12">
            @include('stuffs.alerts')
            <div class="card">
                <div class="card-header card-header-primary d-flex justify-content-between">
                    <h4 class="card-title">Add New Expense</h4>
                    <p class="card-category"></p>
                </div>
                <div class="card-body">
                    <form action="{{ route('expense.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <select class="form-control custom-select {{ $errors->has('name') ? 'custom-alert' : ''}}" name="name" id="name" >
                                @if(Auth::user()->role == 'admin')
                                @foreach($staffs as $staff)
                                <option value={{$staff->id}}>{{$staff->name}}</option>
                                @endforeach
                                @endif
                                <option value={{Auth::user()->id}}>{{Auth::user()->name}}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="expenses">Expense</label>
                            <input type="text" class="form-control"  name="expenses" value={{old('expenses')}}>
                        </div>
                        <div class="form-group">
                            <label for="expenses">Amount</label>
                            <input type="text" class="form-control"  name="amount" value={{old('amount')}}>
                        </div>
                        <div class="form-group">
                            <label for="expenses">Date</label>
                            <input type="date" class="form-control"  name="date" value={{old('date')}}>
                        </div>
                        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
                    </form>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
