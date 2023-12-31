@extends('layouts.app')

@section('content')
    <div class="container">
        <a class="btn btn-primary" href="{{ route('post.create') }}">Create New Post</a>

        <div class="table-responsive my-3">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Content</th>
                        <th scope="col">Date</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($posts as $post)
                        <tr>
                            <td scope="row">{{ $post->id }}</td>
                            <td>{{ Str::limit($post->title, 15, '...') }}</td>
                            <td>{{ Str::limit($post->content, 15, '...') }}</td>
                            <td>{{ $post->created_at }}</td>
                            <td>
                                <a class="btn btn-sm btn-primary" href="{{ route('post.update', $post->id) }}">Edit</a>
                                <form action="{{ route('post.delete', $post->id) }}" method="POST" style="display: inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>



    </div>
@endsection
