@extends('frontend.master')
@section('content')
<div class="section animated-row">
    <div class="container">
        <div class="row flex p-3" style="background:#00000073;">
            <div class="col-md-5 pt-3">
                <img src="{{ asset('image/portfolios').'/'.$portfolio->created_at->format('Y/m/').$portfolio->id.'/'.$portfolio->thumbnail }}" alt="">
            </div>
            <div class="col-md-7 pt-3">
                <h1>{{ $portfolio->title }}</h1>
                <p style="font-size: 21px;text-align: left;margin:0 0 10px 0;">Type: <span class="p-1" style="font-size:16px !important; background:#ffffff59;">{{ $portfolio->type }}</span></p>
                <p style="font-size: 21px;text-align: left;margin:0;">Description</p>
                <hr class="bg-white" style="margin-top:2px">
                <p class="lead" style="text-align: left;font-size:16px;">{{ $portfolio->description }}</p>
            </div>
            <div class="col-md-8 pt-3">
                <p style="font-size: 16px;text-align: left;margin:0;"> Using Technology: <span>{{ $portfolio->using_technology }}</span></p>
            </div>
            <div class="col-md-4 pt-3 justify-content-left;">
                <p style="font-size: 16px;text-align: left;margin:0;"> Created At: <span>{{ $portfolio->created_at->format('d/M/Y h:i A') }}</span></p>
            </div>
        </div>
    </div>
</div>
@endsection
