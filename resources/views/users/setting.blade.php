@extends('dashboard.layouts.main')

@section('content')

<div class="content">
    <div class="container-fluid">
        @include('stuffs.alerts')
        <div class="row  pl-5 pr-5">
            <div class="col-md-4 ">
                <div class="card card-profile">
                    <div class="card-avatar">
                        <a href="">
                            <img src="{{ asset($user->getProfilePic()) }}" style="border-radius:50%;background-size:cover;" />
                        </a>
                    </div>
                    <div class="card-body">
                        <h6 class="card-category text-gray">{{$user->role}}</h6>
                        <h4 class="card-title">{{$user->name}}</h4>
                        <p class="card-description">
                        </p>
                        <form method="POST" action="{{ route('user.profile', ['user' => $user->id]) }}" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="avatar" class="form-control pull-left" style="float:left;width:75%;">
                            @method('PUT')
                            <input type="submit" value="Submit" class="btn btn-primary" style='float:right;'>
                        </form>
                        
                    </div>
                    
                </div>
                
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-header-tabs card-header-primary">
                        <div class="nav-tabs-navigation">
                            <div class="nav-tabs-wrapper">
                                <ul class="nav nav-tabs" data-tabs="tabs">
                                    <li class="nav-item">
                                        <a class="nav-link " href="{{ route('user.edit',['user'=>$user->id])}}" >
                                            <i class="material-icons">account_circle</i> Profile
                                            <div class="ripple-container"></div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" href="{{ route('user.setting',['user'=>$user->id])}}" >
                                            <i class="material-icons">settings</i>Change Password
                                            <div class="ripple-container"></div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        {!! Form::open([ 'action' => ['UserController@update_password', $user->id], 'method' => 'POST']  ) !!}
                        <div class="form-group">
                                {{Form::label('old_password','Current Password')}}
                                {{Form::password('old_password',['class'=>'form-control'])}}
                            </div>
                        <div class="form-group">
                            {{Form::label('password','New Password')}}
                            {{Form::password('password',['class'=>'form-control'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('password_confirmation','Confirm Password')}}
                            {{Form::password('password_confirmation',['class'=>'form-control'])}}
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