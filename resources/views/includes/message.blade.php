@if (session('message'))
<div class="alert alert-info" role="alert">
    {{ session('message') }}
</div>
@endif

{{-- error message --}}
{{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}
