@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h1>Create New Post</h1>
                <hr>
                <form method="POST" action="{{ route('store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea name="content" id="content" rows="5" class="form-control" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" id="image" class="form-control-file" required>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Create Form</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
