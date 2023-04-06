@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div>
            <h1>Tutte le categorie</h1>
        </div>

        <a href="{{ route("admin.categories.create")}}" class="btn btn-success">
            Aggiungi Categoria
        </a>
    </div>

    <div class="row">
        <div class="col">
            <table class="table">

                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Slug</th>
                    <th scope="col"># Progetti</th>
                    <th scope="col">Azioni</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                  <tr>
                    <th scope="row">{{ $category->id }}</th>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->slug }}</td>
                    <td>
                        @if ($category->projects->count() > 0)
                            {{ $category->projects->count() }}
                        @else
                            Nessun progetto
                        @endif
                    </td>
                    <td>
                        <a href="{{ route("admin.categories.show", $category->id) }}" class="btn btn-primary">
                            Dettagli
                        </a>
                        <a href="{{ route("admin.categories.edit", $category->id) }}" class="btn btn-warning">
                            Aggiorna
                        </a>
                        <form
                        action="{{ route("admin.categories.destroy", $category->id) }}"
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

