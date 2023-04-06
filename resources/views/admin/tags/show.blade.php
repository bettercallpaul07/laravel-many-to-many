@extends('layouts.admin')

@section('content')

<div class="container-fluid mt-4">

    
    <div class="row justify-content-center">
        <div class="col">
            <h1>
                {{ $tag->name }}
            </h1>

            <h6>
                Slug: {{ $tag->slug }}
            </h6>

            @if ($tag->projects->count() > 0)
                <h3>
                    N. progetti associati {{ $tag->projects->count() }}
                </h3>
            @else  
                <h3>
                    Nessun progetto
                </h3>
            @endif

            <h2>
                Progetti:
            </h2>
                <ul>
                    @foreach ($tag->projects as $project)
                        <li>
                            <a href="{{ route("admin.projects.show", $project->id) }}">
                                {{ $project->title }}
                            </a>
                        </li>
                    @endforeach
            <p>
                {{ $tag->description }}
            </p>

        </div>

    </div>
</div>

@endsection