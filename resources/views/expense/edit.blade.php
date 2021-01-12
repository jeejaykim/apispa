@extends('dashboard.layouts.main')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="col-lg-12 col-md-12">
            @include('stuffs.alerts')
            <div class="card">
                <div class="card-header card-header-primary d-flex justify-content-between">
                <h4 class="card-title">Update Expense of {{$expense->user->name}} from {{Carbon::parse($expense->date)->toFormattedDateString()}}</h4>
                    <p class="card-category"></p>
                </div>
                <div class="card-body">
                    <form action="{{ route('expense.update', ['expense' => $expense->id]) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                                <label>Name</label>
                                <select class="form-control custom-select {{ $errors->has('therapist_id') ? 'custom-alert' : ''}}" name="therapist_id" id="therapist" >
                                    <option value="{{$expense->therapist_id}}"selected hidden>{{$expense->user->name}}</option>
                                    @foreach($staffs as $staff)
                                    <option value={{$staff->id}}>{{$staff->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        <div class="form-group">
                            <label for="expenses">Expense</label>
                            <input type="text" class="form-control"  name="expenses" value={{$expense->expenses}}>
                        </div>
                        <div class="form-group">
                            <label for="expenses">Amount</label>
                            <input type="text" class="form-control"  name="amount" value={{$expense->amount}}>
                        </div>
                        <div class="form-group">
                            <label for="expenses">Date</label>
                            <input type="date" class="form-control"  name="date" value={{$expense->created_at}}>
                        </div>
                        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
                    </form>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
