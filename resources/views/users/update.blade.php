@extends('dashboard.layouts.main')

@section('content')

<div class="content">
        <div class="container-fluid">
            @include('stuffs.alerts')
          <div class="row pt-5">
            {{-- <div class="col-md-4 pt-5">
                <div class="card card-profile">
                    <div class="card-avatar">
                    <a href="">
                        <img class="img" src="../storage/avatars/{{$user->avatar}}" />
                    </a>
                    </div>
                    <div class="card-body">
                    <h6 class="card-category text-gray">{{$user->role}}</h6>
                    <h4 class="card-title">{{$user->name}}</h4>
                    <p class="card-description">

                    {!! Form::open(['action' =>['AdminPostController@update_avatar', $user->id ], 'method' => 'POST' ,'files'=>true]) !!}
                        {{Form::file('avatar')}}
                    {{Form::submit('Submit',['class'=>'btn btn-primary', 'style' => 'float:right;'])}}
                    {!!Form::close()!!}

                    </p>

                    </div>
                    
                </div>
            </div> --}}
            <div class="col-md-12">
            {{-- <div class="col-md-8"> --}}
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit Profile</h4>
                  <p class="card-category">Complete your profile</p>
                </div>
                <div class="card-body">
                        {!! Form::open([ 'action' => ['UserController@update', $user->id], 'method' => 'POST']  ) !!}
                        <div class="form-group" >
                            {{Form::file('avatar')}}
                        </div>
                        <div class="form-group">
                            {{Form::label('username','Username')}}
                            {{Form::text('username',$user->username,['class'=>'form-control'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('name','Name')}}
                            {{Form::text('name',$user->name,['class'=>'form-control'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('number','Contact Number')}}
                            {{Form::text('number',$user->contact_number,['class'=>'form-control','maxlength' => '11'])}}
                        </div>

                        <div class="form-group">
                            {{Form::label('email','Email')}}
                            {{Form::text('email',$user->email,['class'=>'form-control'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('password','Password')}}
                            {{Form::password('password',['class'=>'form-control'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('confirm_password','Confirm Password')}}
                            {{Form::password('confirm_password',['class'=>'form-control',])}}
                        </div>
                        {{Form::hidden('_method','PUT')}}
                        {{Form::submit('Submit',['class'=>'btn btn-primary pull-right'])}}
                    {!! Form::close() !!}
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>


@endsection