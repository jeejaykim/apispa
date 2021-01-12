@extends('dashboard.layouts.main')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="col-lg-12 col-md-12">
                @include('stuffs.alerts')
            <div class="card">
                <div class="card-header card-header-primary">
                <h4 class="card-title">Add New Staff</h4>
                <p class="card-category"></p>
                </div>
            <div class="card-body">

                {!! Form::open(['action' => ['CategoryController@store', 'method' => 'POST']]) !!}
                    <div class="form-group">
                        {{Form::label('name','Name')}}
                        {{Form::text('name','',['class'=>'form-control','value'=> old('name')])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('description','Description')}}
                        {{Form::text('description','',['class'=>'form-control','value'=> old('description')])}}
                    </div>
                    
                    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
                {!! Form::close() !!}


            </div>
        </div>
    </div>
</div>
</div>
@endsection