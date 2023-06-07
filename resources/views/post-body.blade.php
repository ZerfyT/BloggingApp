@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>{{ $post->title }}</h1>
                <p class="text-muted">{{ $post->created_at->format('M d, Y') }}</p>
                <hr>
                <div class="post-content">
                    <img src="{{ $post->image }}" class="img-fluid" alt="Image Description">
                    {{-- <img src="{{ asset('path/to/your/image.jpg') }}" alt="Image Description"> --}}
                    {{ $post->content }}
                </div>
            </div>
            @php
                $comments = $post->comments();
            @endphp
            <div class="col-md-4">
                @foreach ($comments as $comment)
                    <x-comment :content="$comment->content" :date="$comment->created_at->diffForHumans()" :userName="$comment->user->name" />
                @endforeach
                {{-- <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Recent Posts</h5>
                        <ul class="list-group">
                            {{-- @foreach ($recentPosts as $recentPost)
                                <li class="list-group-item">
                                    <a href="{{ route('posts.show', $recentPost->id) }}">
                                        {{ $recentPost->title }}
                                    </a>
                                </li>
                            @endforeach --}}
                </ul>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
