@extends('dashboard.layouts.main')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="col-lg-12 col-md-12">
                @include('stuffs.alerts')
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Add New Addons</h4>
                    <p class="card-category"></p>
                </div>
                <div class="card-body">
                    {!! Form::open(['action' => ['AddOnController@store', 'method' => 'POST']]) !!}
                    <div class="form-group">
                        {{Form::label('option','Name')}}
                        {{Form::text('option','',['class'=>'form-control', 'value'=> old('option')])}}
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