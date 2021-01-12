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

            {!! Form::open([ 'action' => ['UserController@store', 'method' => 'POST'] ] ) !!}
                <div class="form-group">
                    {{Form::label('username','Username')}}
                    {{Form::text('username','',['class'=>'form-control','value'=> old('username')])}}
                </div>
                <div class="form-group">
                    {{Form::label('name','Name')}}
                    {{Form::text('name','',['class'=>'form-control','value'=> old('name')])}}
                </div>
                <div class="form-group">
                    {{Form::label('contact_number','Contact Number')}}
                    {{Form::text('contact_number','',['class'=>'form-control','maxlength' => '11', 'value'=> old('contact_number')])}}
                </div>

                <div class="form-group">
                    {{Form::label('email','Email')}}
                    {{Form::text('email','',['class'=>'form-control', 'value'=> old('email')])}}
                </div>
                <div class="form-group">
                    {{Form::label('password','Password')}}
                    {{Form::password('password',['class'=>'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('confirm_password','Confirm Password')}}
                    {{Form::password('confirm_password',['class'=>'form-control',])}}
                </div>
                <div class="form-group">
                    {{Form::label('role','Role')}}      
                    <select class="form-control custom-select {{ $errors->has('role') ? 'custom-alert' : ''}}" placeholder="Select role" name="role" id="role" value="{{ old('role') }}">
                        <option value="user">User</option>
                        <option value="staff">Staff</option>
                    </select>
                </div>
                {{Form::submit('Submit',['class'=>'btn btn-primary pull-right'])}}
            {!! Form::close() !!}

            </div>
            </div>
        </div>
    </div>
</div>

@endsection