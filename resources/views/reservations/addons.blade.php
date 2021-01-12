@extends('dashboard.layouts.main')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="col-lg-12 col-md-12">
            @include('stuffs.alerts')
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Add New Reservation</h4>
                    <p class="card-category"></p>
                </div>
                <div class="card-body">
                    <div class="row">
                        
                        <div class="col-md-8">
                            {!! Form::open(['action' => 'AdminPostController@add_addons', 'method' => 'POST']) !!}
                            <div class="form-group" id="addons">
                                @foreach($addons as $addon)
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input addons" type="checkbox" value="{{$addon->option}}" name="addon[]"data-option="{{$addon->option}}" data-price="{{$addon->price}}"> {{$addon->option}}
                                        <span class="form-check-sign">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                                @endforeach
                            </div>
                            
                        </div>
                        
                    </div>
                    {{Form::hidden('price','0',['class'=>'form-control ', 'value'=> '0'])}}
                    
                    {{Form::submit('Submit',['class'=>'btn btn-primary float-right mt-2 image-colored-left'])}}
                    
                    {!! Form::close() !!}
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection



