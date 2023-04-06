@if ($errors->any())
<div class="row mb-4">
    <div class="col">
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
            <li>
                {{ $error }}
            </li>
            @endforeach
        </div>
    </div>
</div>
@endif
