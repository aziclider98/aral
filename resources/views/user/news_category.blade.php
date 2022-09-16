@extends('layouts.userLayout')
@section('title') News @endsection

@section('content')
    <div class="container mb-5">
        <div class="row mt-3">
            <div class="col-md-6">
                <h2>{{$category_one->name}}</h2>
            </div>
            @include('user.inc.lang_nav')
        </div>
        @include('user.inc.categories_nav')
    </div>
    <div class="container">
            <div class="row">
            @foreach ($posts as $post)
                <div class="col-md-6 mt-3">
                    <div class="card">
                        <div class="card-header">
                            <div>
                                <p>{{$post->created_at}} {{$post->category->name}}</p>
                            </div>
                        </div>
                        <div class="card-body">
                            <a href="{{ route('indexshow', ['locale' =>app()->getLocale() , 'id' => $post->id]) }}" class="text-decoration-none text-black">
                                <h4>{{$post->title}}</h4>
                                <img src="{{ asset('storage/images/'.$post->image) }}" alt="{{$post->image}} " width="100%" height="400px">
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

