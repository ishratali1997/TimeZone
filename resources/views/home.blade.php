@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    @foreach ($posts as $post)
                    <p><strong>{{$post->dat->format('g:i a')}}</strong></p>
                    @endforeach
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form action="/save-post" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="Title">Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Enter Title" id="Title">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" placeholder="Enter Description" id="description"
                                name="description">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection