@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div>
            <h1>Tutte i tag</h1>
        </div>

        <a href="{{ route("admin.tags.create")}}" class="btn btn-success">
            Aggiungi Tag
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
                    @foreach ($tags as $tag)
                  <tr>
                    <th scope="row">{{ $tag->id }}</th>
                    <td>{{ $tag->name }}</td>
                    <td>{{ $tag->slug }}</td>
                    <td>
                        @if ($tag->projects->count() > 0)
                            {{ $tag->projects->count() }}
                        @else
                            Nessun progetto
                        @endif
                    </td>
                    <td>
                        <a href="{{ route("admin.tags.show", $tag->id) }}" class="btn btn-primary">
                            Dettagli
                        </a>
                        <a href="{{ route("admin.tags.edit", $tag->id) }}" class="btn btn-warning">
                            Aggiorna
                        </a>
                        <form
                        action="{{ route("admin.tags.destroy", $tag->id) }}"
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

