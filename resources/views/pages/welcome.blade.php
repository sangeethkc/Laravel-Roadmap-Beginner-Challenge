@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="d-flex justify-content-start m-1">
                        @foreach ($posts as $post)
                            <div class="card p-1" style="width: 18rem;">
                                <img class="card-img-top" src="https://www.bastiaanmulder.nl/wp-content/uploads/2013/11/dummy-image-square.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $post->title }}</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">{{ $post->category->name }}</h6>
                                    <p class="card-text">{{ $post->description }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
