@extends('layouts.admin')

@section('content')

<div class="container-fluid mt-4">


    <div class="row justify-content-center">
        <div class="col">
            <h1>
                {{ $project->title }}
            </h1>

            <h6>
                Slug: {{ $project->slug }}
            </h6>

            <h3>
                Categoria:
                @if ($project->category)
                <a href="{{ route("admin.categories.show", $project->category->id) }}">
                    {{ $project->category->name }}
                </a>

                @else
                    Nessuna categoria
                @endif
            </h3>

            <p>
                {{ $project->content }}
            </p>

        </div>

</div>
</div>

@endsection