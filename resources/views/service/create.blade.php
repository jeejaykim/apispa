@extends('dashboard.layouts.main')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="col-lg-12 col-md-12">
                @include('stuffs.alerts')
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Add New Service</h4>
                    <p class="card-category"></p>
                </div>
                <div class="card-body">
                    {!! Form::open(['action' => ['ServiceController@store', 'method' => 'POST']]) !!}
                    <div class="form-group">
                        {{Form::label('name','Name')}}
                        {{Form::text('name','',['class'=>'form-control', 'value'=> old('name')])}}
                    </div>

                    <div class="form-group">
                    {{Form::label('category','Category')}}      
                        <select class="form-control custom-select {{ $errors->has('category_id') ? 'custom-alert' : ''}}" name="category_id" id="category_id" value="{{ old('category_id') }}">
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group">
                        {{Form::label('minutes','Minutes')}}
                        {{Form::text('minutes','',['class'=>'form-control ','value'=> old('minutes')])}}
                    </div>

                    <div class="form-group">
                        {{Form::label('price','Price')}}
                        {{Form::text('price','',['class'=>'form-control ', 'value'=> old('price')])}}
                    </div>

                    
                    {{Form::submit('Submit',['class'=>'btn btn-primary pull-right'])}}
                    {!! Form::close() !!}
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection