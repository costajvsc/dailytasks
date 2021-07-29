{{-- Error message --}}
@if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <span class="d-block">{{ $error }}</span>
        @endforeach
    </div>
@endif
