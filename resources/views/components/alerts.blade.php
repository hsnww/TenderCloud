@if (session('success'))
    <div class="alert alert-success fade show" role="alert">
        {{ session('success') }}
    </div>
@endif
@if (session('status'))
    <div class="alert alert-success fade show" role="alert">
        {{ session('status') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger fade show" role="alert">
        {{ session('error') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger fade show" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
