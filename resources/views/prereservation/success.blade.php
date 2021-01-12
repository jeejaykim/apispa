@extends('layouts.master')

@section('content')

    @if(Auth::guest())

       
    
    <div class=" col-xs-12 col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-2" style="padding-top:25vh;">
        <div class="hb-sectionhead mb-50">
            <div class="hb-sectiontitle">
                <h2><span style="font-size:2em;">Thank you for Reserving.</span><br>
                        A call will be sent to the number you have provided to verify your reservation.
                </h2>
                <a href="/" class="btn btn-dark mt-5 image-colored-right">Go Home</a>

            </div>

        </div>
    </div>


    @else
    <div class=" col-xs-12 col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-2"style="padding-top:25vh;">
            <div class="hb-sectionhead mb-50">
                <div class="hb-sectiontitle">
                    <h2><span style="font-size:2em;">Successfully Reserved.</span><br>
                            Please call the provided contact number.
                    </h2>
                    
                    <a href="/" class="btn btn-dark mt-5 image-colored-right">Go Home</a>
                    <a href="/reservation" class="btn btn-dark mt-5 image-colored-right">Go Reservations</a>
    
                </div>
    
            </div>
        </div>
        
    
    @endif

@endsection