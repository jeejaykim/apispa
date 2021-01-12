@extends('dashboard.layouts.main')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="col-lg-12 col-md-12">
            @include('stuffs.alerts')
            <div class="card">
                <div class="card-header card-header-primary">
                <h4 class="card-title">Add Expenses for {{$staff->name}}</h4>
                    <p class="card-category"></p>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('expense.create', ['id' => $staff->id]) }}">
                        @csrf
                        <div class="form-group pb-5">
                            <label for="expenses">Expenses</label>
                            <input type="text" class="form-control"name="expenses" id="expenses">
                        </div>
                        <div class="form-group">
                            <label for="amount">Amount</label>
                            <input type="text" class="form-control"name="amount" id="amount">
                        </div>
                        @method('PUT')
                        <button type="submit" class="btn btn-primary pull-right">Submit</button>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection