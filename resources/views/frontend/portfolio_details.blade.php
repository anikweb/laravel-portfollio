@extends('frontend.master')
@section('content')
<div class="section animated-row" data-section="portfolios">
    <div class="container">
        <div class="row portfolio-margin-top-md p-3" style="background:#00000073;">
            <div class="col-md-5 pt-3">
                <img src="{{ asset('image/portfolios').'/'.$portfolio->created_at->format('Y/m/').$portfolio->id.'/'.$portfolio->thumbnail }}" alt="">
            </div>
            <div class="col-md-7 pt-3">
                <h1 class="title-md" >{{ $portfolio->title }}</h1>
                <p style="font-size: 21px;text-align: left;margin:0 0 10px 0;">Type: <span class="p-1" style="font-size:16px !important; background:#ffffff59;">{{ $portfolio->type }}</span></p>
                <p style="font-size: 21px;text-align: left;margin:0;">Description</p>
                <hr class="bg-white" style="margin-top:2px">
                <p class="lead" style="text-align: left;font-size:16px;">{{ $portfolio->description }}</p>
                <a href="#" class="btn btn-success" style="width: 149px;height: 52px;font-size: 16px;padding: 0;">Live Preview</a>
            </div>
            <div class="col-md-6 pt-3">
                @php
                    $technologies = Illuminate\Support\Str::of($portfolio->using_technology)->explode(',');
                @endphp
                <p style="font-size: 16px;text-align: left;margin:0;"> Using Technology:
                @foreach($technologies as $technology)
                    <span class="bg-info p-1 mr-1">{{ $technology }}</span>
                @endforeach
                </p>
            </div>
            <div class="col-md-6 pt-3">
                <p style="font-size: 16px;margin:0; text-align:right">Created At: <span>{{ $portfolio->created_at->format('d/M/Y h:i A') }}</span></p>
            </div>
        </div>
    </div>
</div>
@endsection
