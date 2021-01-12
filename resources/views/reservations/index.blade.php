@extends('dashboard.layouts.main')



@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                @include('stuffs.alerts')
                @include('reservations.nav')
                    <div class="card-body">
                        <div class="table-responsive">
                            @include('reservations.newreservations')
                        </div> 
                        <div class="d-flex"> 
                            <p class="mr-auto my-auto">
                            </p>
                            {{  $newreservations -> links()  }}
                        </div>
                    </div>
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Activated Reservations</h4>
                        <p class="card-category"></p>
                    </div>
                    <div class="card-body" id="table_data">
                        @if( count($oldreservations) > 0)
                        
                        <div class="table-responsive">
                            @include('reservations.oldreservations')
                        </div>
                        <div class="pull-right primary">
                            {{  $oldreservations -> links()  }}
                        </div>
                        @else
                        <p>No Reservation Found</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection