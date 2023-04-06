@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div>
            <h1>Tutti i miei progetti</h1>
        </div>

        <a href="{{ route("admin.projects.create")}}" class="btn btn-success">
            Aggiungi Progetto

        </a>
    </div>

    <div class="row">
        <div class="col">
            <table class="table">

                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome Progetto</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Azioni</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                  <tr>
                    <th scope="row">{{ $project->id }}</th>
                    <td>{{ $project->title }}</td>
                    <td>{{ $project->slug }}</td>
                    <td>
                        @if ($project->category)
                        <a href="{{ route("admin.categories.show", $project->category->id) }}">
                            {{ $project->category->name }}
                        </a>
                        @else
                            Nessuna categoria
                        @endif
                    <td>
                        <a href="{{ route("admin.projects.show", $project->id) }}" class="btn btn-primary">
                            Dettagli
                        </a>
                        <a href="{{ route("admin.projects.edit", $project->id) }}" class="btn btn-warning">
                            Aggiorna
                        </a>
                        <form
                        action="{{ route("admin.projects.destroy", $project->id) }}"
                        class="d-inline-block"
                        method="POST"
                        onsubmit="return confirm('Sei sicuro di volerlo eliminare?');">
                        @csrf
                        @method("DELETE")
                            <button class="btn btn-danger">
                                Elimina
                            </button>
                        </form>

                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>

        </div>
    </div>
</div>
@endsection