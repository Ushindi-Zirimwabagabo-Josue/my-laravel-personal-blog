@extends('layouts.app')

@section('content')
<div class="">
    <div class="">
        <div class="">
            <div class="">
                <h1>Our Links!</h1>
                <p>Enjoy exploring our links. Click on a link to see details!</p>
            </div>
            <div class="">
                <a href="{{ url('submit') }}" class="btn btn-primary btn-md">Add Link</a>
            </div>
        </div>
        <br>
        <div class="container">
            @forelse ($links as $link)
            <div class="card">
                <a href="links/{{$link->id}}">
                    <img src="/images/links/{{$link->image}}" class="card-img-top" alt="blog post image"
                        style="width: 100%; height: 300px; object-fit: cover; border-radius: 12px">
                    <div class="card-body">
                        <h2>{{$link->title}}</h2>
                        <p class="card-text">{{$link->description}}</p>
                    </div>
                </a>
            </div>
            @empty
            <p class="text-warning">No Links Available</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
