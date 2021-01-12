@extends('dashboard.layouts.main')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="col-lg-12 col-md-12">
                @include('stuffs.alerts')
            <div class="card">
                <div class="card-header card-header-primary">
                <h4 class="card-title">Add New Category</h4>
                <p class="card-category"></p>
                </div>
            <div class="card-body">

                {!! Form::open(['action' => ['CategoryController@update', $category->id], 'method' => 'POST']) !!}
                    <div class="form-group">
                        {{Form::label('name','Name')}}
                        {{Form::text('name',$category->name,['class'=>'form-control','value'=> old('name')])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('description','Description')}}
                        {{Form::text('description',$category->description,['class'=>'form-control','value'=> old('description')])}}
                    </div>
                    {{Form::hidden('_method','PUT')}}
                    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
                {!! Form::close() !!}


            </div>
        </div>
    </div>
</div>
</div>
@endsection