@extends('dashboard.layouts.main')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="col-lg-12 col-md-12">
                @include('stuffs.alerts')
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Update Service</h4>
                    <p class="card-category"></p>
                </div>
                <div class="card-body">
                    {!! Form::open(['action' => ['ServiceController@update', $service->id], 'method' => 'POST']) !!}
                    <div class="form-group">
                        {{Form::label('name','Name')}}
                        {{Form::text('name',$service->name,['class'=>'form-control', 'value'=> old('name')])}}
                    </div>

                    <div class="form-group">
                    {{Form::label('category','Category')}}      
                        <select class="form-control custom-select {{ $errors->has('category') ? 'custom-alert' : ''}}"  name="category" id="category" value="{{ old('category') }}">
                            <option value="{{$service->category->id}}" selected hidden>{{$service->category->name}}</option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">
                                {{$category->name}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    


                    <div class="form-group">
                        {{Form::label('price','Price')}}
                        {{Form::text('price',$service->price,['class'=>'form-control ','value'=> old('price')])}}
                    </div>

                    {{Form::hidden('_method','PUT')}}
                    {{Form::submit('Submit',['class'=>'btn btn-primary pull-right'])}}
                    {!! Form::close() !!}
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection