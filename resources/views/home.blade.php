@extends('layouts.admin')

@section('content')

<h1 class="text-center p-4">InstaPosts</h1>
<div class="container">
    @if($images->count() > 0)
        <div class="row">
        @foreach($images as $img)
        <div class="col mt-5">
            <div class="card shadow-lg" style="width: 300px; height:350px">
                <img class="card-img-top" src="{{asset('storage')}}/{{$img->image}}" alt="" style="width: 300px; height:200px">
            <div class="card-body d-flex">
            <h4 class="card-title mt-1">{{$img->users->name}} </h3>
                <span style="font-style:italic; font-size:15px"> &nbsp; is feeling {{$img->status}} <span>
                    <p class="" style="font-size: 15px; text-align: justify;">{{$img->description}}</p>
            </div>
        </div>
        </div>
        @endforeach
    @endif
</div>
@endsection
