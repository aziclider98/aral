@extends('layouts.userLayout')
@section('title') News @endsection

@section('content')
    <div class="container mb-5">
        <div class="row mt-3">
            <div class="col-md-6">
                <h2>{{$category_one->name}}</h2>
            </div>
            <div class="col-md-3">
                <a href="{{ route('posts.create') }}" class="btn btn-success">Add Post</a>
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
                            @switch($lang)
                                @case('En')
                                    <a href="{{ route('indexshowenpost', $post->id) }}" class="text-decoration-none text-black">
                                        <h4>{{$post->title}}</h4>
                                        <img src="{{ asset('storage/images/'.$post->image) }}" alt="{{$post->image}} " width="100%" height="400px">
                                    </a>
                                    @break
                                @case('Ru')
                                    <a href="{{ route('indexshowrupost', $post->id) }}">
                                        <h4>{{$post->title}}</h4>
                                        <img src="{{ asset('storage/images/'.$post->image) }}" alt="{{$post->image}} " width="100%" height="400px">
                                    </a>
                                    @break
                                @case('Uz')
                                    <a href="{{ route('indexshowuzpost', $post->id) }}">
                                        <h4>{{$post->title}}</h4>
                                        <img src="{{ asset('storage/images/'.$post->image) }}" alt="{{$post->image}} " width="100%" height="400px">
                                    </a>
                                    @break
                                @case('Qqr')
                                    <a href="{{ route('indexshowqqrpost', $post->id) }}">
                                        <h4>{{$post->title}}</h4>
                                        <img src="{{ asset('storage/images/'.$post->image) }}" alt="{{$post->image}} " width="100%" height="400px">
                                    </a>
                                    @break
                            @endswitch

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

