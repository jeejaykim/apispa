@extends('dashboard.layouts.main')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            @include('dashboard.top_cards')
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-12">
                @include('dashboard.chart')
            </div>
                @include('dashboard.stats')
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-12">
                @include('dashboard.user_stats')
            </div>
            <div class="col-lg-6 col-md-12">
                @include('dashboard.latest')
            </div>
        </div>
    </div>
</div>
</div>

@endsection
