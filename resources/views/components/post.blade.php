<div class="my-4">
    <a href="{{ route('post.show', $id) }}" class="card-link">
        <div class="card">
            <img class="card-img-top" src="{{ $imageUrl }}" alt="Post Image">
            <div class="card-body">
                <h5 class="card-title">{{ $title }}</h5>
                <p class="card-text">{{ $content }}</p>
            </div>
            <div class="card-footer">
                <small class="text-muted">
                    <strong>Author:</strong> {{ $author }} | <strong>Date:</strong>
                    {{ $dateCreate }}
                </small>
            </div>
        </div>
    </a>
</div>
