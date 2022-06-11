@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="d-flex justify-content-start m-1">
                        @foreach ($posts as $post)
                            <div class="card p-3" style="width: 18rem;">
                                <a href="{{ route('posts.show', $post->id) }}">
                                <img class="card-img-top" src="https://www.bastiaanmulder.nl/wp-content/uploads/2013/11/dummy-image-square.jpg" alt="Card image cap"></a>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $post->title }}</h5>
                                    {{-- <h6 class="card-subtitle mb-2 text-muted">{{ $post->category->name }}</h6> --}}
                                    <p class="card-text">{{ $post->description }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            {{-- <div class="col-4">
                <div class="card mb-4 ">
                    <div class="card-header">Categories</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <ul class="list-unstyled mb-0">
                                    @foreach ($categories as $category)
                                        <li><a href="{{ route('home')}}?category_id={{ $category->id }}">{{ $category->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
@endsection
