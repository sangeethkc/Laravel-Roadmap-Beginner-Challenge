@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Create new Post</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.posts.store') }}" enctype="multipart/form-data">
                            @csrf
                            Title:  <br>
                            <input type="text" class="form-control" name="title" value=""/>
                            <br>
                            Description:  <br>
                            <input type="textarea" class="form-control" name="description" value=""/>
                            <br>
                            Image:  <br>
                            <input type="image" class="form-control" name="title" value=""/>
                            <br>
                            name: <br>
                            <input type="text" class="form-control" name="title" value=""/>
                            <br>
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
