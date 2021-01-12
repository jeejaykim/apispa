@extends('dashboard.layouts.main')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="col-lg-12 col-md-12">
            @include('stuffs.alerts')
            <div class="card">
                <div class="card-header card-header-primary d-flex justify-content-between align-items-center">
                    <h4 class="card-title">
                        @if($data == 'today')
                        Revenue Today
                        @else
                        {{ucwords($data)}} Revenue  of {{Carbon::parse("2019-".$month."-01")->format('F')}}
                        @endif
                    </h4>
                    <p class="card-category"></p>
                    <div class="d-flex justify-content-end">
                        <div class="dropdown">
                            <button class="btn btn-white dropdown-toggle" type="button" data-toggle="dropdown">{{Carbon::parse("2019-".$month."-01")->format('F')}}</button>
                            <ul class="dropdown-menu">
                                @for($i=1;$i<=12;$i++)
                                <li><a href="{{ route('record.revenue',['data' => $data, 'month' =>$i])}}">{{Carbon::parse("2019-".$i."-01")->format('F')}}</a></li>
                                @endfor
                            </ul>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-white dropdown-toggle" type="button" data-toggle="dropdown">{{$data}}</button>
                            <ul class="dropdown-menu">
                                @if($month == now()->format('m'))
                                <li><a href="{{ route('record.revenue',['data' => 'today', 'month' => $month])}}">Revenue Today</a></li>
                                @endif
                                <li><a href="{{ route('record.revenue',['data' => 'total', 'month' => $month])}}">Total Revenue</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <tbody>
                            <thead>
                            </thead>
                            <tr>
                                <td><h5># of Reservations</h5></td>
                                <td><h5>{{$reservations->count()}}</h5></td>
                            </tr>
                            <tr>
                                <td><h5>Revenue</h5></td>
                                <td><h5>{{App\Reservation::getData('revenue', $data, $month)}}</h5></td>
                            </tr>
                            <tr>
                                <td><h5>Expenses</h5></td>
                                <td><h5>{{App\Reservation::getData('expenses', $data, $month)}}</h5></td>
                            </tr>
                            <tr>
                                <td><h5>Income</h5></td>
                                <td><h5>{{App\Reservation::getData('income', $data, $month)}}</h5></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="container">
                        <canvas id="monthlySalesChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="container">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <td><h5><strong>Min: </strong></h5></td>
                                    <td><h5>{{App\Reservation::getData('income', $data, $month)}}</h5></td>
                                    <td></td>
                                    <td><h5><strong>Max: </strong></h5></td>
                                    <td><h5>{{App\Reservation::getData('income', $data, $month)}}</h5></td>
                                </tr>
                                <tr>
                                    <td><h5><strong>Min: </strong></h5></td>
                                    <td><h5>{{App\Reservation::getData('income', $data, $month)}}</h5></td>
                                    <td></td>
                                    <td><h5><strong>Max: </strong></h5></td>
                                    <td><h5>{{App\Reservation::getData('income', $data, $month)}}</h5></td>
                                </tr>
                                <tr>
                                    <td><h5><strong>Min: </strong></h5></td>
                                    <td><h5>{{App\Reservation::getData('income', $data, $month)}}</h5></td>
                                    <td></td>
                                    <td><h5><strong>Max: </strong></h5></td>
                                    <td><h5>{{App\Reservation::getData('income', $data, $month)}}</h5></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
    @endsection
    