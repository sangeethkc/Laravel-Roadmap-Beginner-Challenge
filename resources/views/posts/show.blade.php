@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ $post->title }}</div>
                    <div class="card-body">
                        <a class="btn btn-primary" href="{{ route('posts.index') }}">Back</a>
                        <div class="d-flex justify-content-start m-1">
                            <div class="card p-1" style="width: 25rem;">
                                <div>
                                    <img class="card-img-top"
                                        @if (!$post->image) 
                                            src="{{ asset('image/noimage.jpg') }}"
                                        @else
                                            src="storage/images/{{ $post->image }}" 
                                        @endif
                                        alt="Card image cap">
                                    {{-- </a> --}}
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $post->title }}</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">{{ $post->category->name }}</h6>
                                    <p class="card-text">{{ $post->description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
