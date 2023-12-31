<form method="GET" action="{{ route('search') }}">
    <div class="d-flex justify-content-end align-items-center">
        <div class="form-group">
            <input type="text" name="search" class="form-control" placeholder="Search by title">
        </div>
        <button type="submit" class="btn btn-primary">Search</button>
    </div>
</form>
