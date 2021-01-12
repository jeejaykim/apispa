@extends('dashboard.layouts.main')

@section('content')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                @include('stuffs.alerts')
                @include('users.nav')
                <div class="card-body table-responsive">
                    <table class="table table-hover">
                        <thead class="text-primary">
                            <tr>
                                <th>#</th>
                                <th>User</th>
                                <th>Expense</th>
                                <th>Cost</th>
                                <th>Date</th>
                                <th><a href="{{route('expense.add')}}" class="btn btn-primary" style="float:right; margin-left:5px;">Create</a></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($expenses as $expense)
                            <tr>
                            <td>{{$expense->id}}</td>
                            <td>{{$expense->user->name}}</td>
                            <td>{{$expense->expenses}}</td>
                            <td>{{$expense->amount}}</td>
                            <td>{{Carbon::parse($expense->date)->toFormattedDateString()}}</td>
                            <td>
                                <form action="{{ route('expense.destroy', ['expense' => $expense->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" style="float:right; margin-left:5px;"><i class="material-icons">delete</i></button>
                                </form>
                                <a href="{{ route('expense.edit', ['expense' => $expense->id]) }}" class="btn btn-primary" style="float:right; margin-left:5px;">
                                    <i class="material-icons">edit</i>
                                </a>
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection