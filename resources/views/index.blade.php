@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex">
            @component('components.search')
            @endcomponent
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                @foreach ($posts as $post)
                    @php
                        $user = \App\Models\User::find($post->user_id);
                    @endphp
                    <x-post :id="$post->id" :title="$post->title" :content="$post->content" :imageUrl="$post->image" :author="$user->name"
                        :dateCreate="$post->created_at->format('F d, Y')" />
                @endforeach

            </div>
        </div>
    </div>
    {{ $posts->links() }}
@endsection
