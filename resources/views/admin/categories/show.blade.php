@extends('layouts.admin')

@section('content')

<div class="container-fluid mt-4">

    
    <div class="row justify-content-center">
        <div class="col">
            <h1>
                {{ $category->name }}
            </h1>

            <h6>
                Slug: {{ $category->slug }}
            </h6>

            @if ($category->projects->count() > 0)
                <h3>
                    N. progetti associati {{ $category->projects->count() }}
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
                    @foreach ($category->projects as $project)
                        <li>
                            <a href="{{ route("admin.projects.show", $project->id) }}">
                                {{ $project->title }}
                            </a>
                        </li>
                    @endforeach
            <p>
                {{ $category->description }}
            </p>

        </div>

    </div>
</div>

@endsection