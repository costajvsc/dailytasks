{{-- Error message --}}
@if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <span class="d-block">{{ $error }}</span>
        @endforeach
    </div>
@endif

{{-- Success message --}}
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

{{-- Warning message --}}
@if (session('warning'))
    <div class="alert alert-warning">
        {{ session('warning') }}
    </div>
@endif
