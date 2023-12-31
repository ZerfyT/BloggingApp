<div class="my-4">
    <a href="{{ url('/?post='.$id) }}" class="card-link text-decoration-none">
        <div class="card shadow-sm">
            <img class="card-img-top img-fluid" src="{{ $imageUrl }}" alt="Post Image">
            <div class="card-body">
                <h3 class="card-title">{{ $title }}</h3>
                <p class="card-text">{{ $content }}</p>
            </div>
            <div class="card-footer">
                <div class="text-muted text-end w-100">
                    <strong></strong> {{ $author }} <span class="fw-bold" style="font-size: 1.1rem">|</span> <strong></strong>
                    {{ $dateCreate }}
                </div>
            </div>
        </div>
    </a>
</div>
