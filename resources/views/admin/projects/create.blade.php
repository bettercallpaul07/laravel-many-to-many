@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col">
            <h1>
                Aggiungi nuovo progetto
            </h1>
        </div>
        @include('partials.errors')
    </div>
    <div class="row mb-4">
        <div class="col">
            <form action="{{ route("admin.projects.store") }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Titolo</label>
                    <input
                     type="text"
                     class="form-control"
                     id="title"
                     name="title"
                     value="{{ old("title") }}"
                     placeholder="Inserisci il titolo..."
                     required
                     maxlength="128">
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Contenuto</label>
                    <textarea
                        rows="10"
                        class="form-control"
                        id="content"
                        name="content"
                        placeholder="Inserisci il contenuto..."
                        required
                        maxlength="4096">{{ old("content") }}</textarea>
                </div>


                <div class="mb-3">
                    <label for="category">Categoria</label>
                    <select name="category_id" id="category_id" class="form-select">
                    <option value="">Nessuna categoria</option>
                        @foreach ($categories as $category)
                    <option
                            value="{{ $category->id }}"
                            {{ old("category_id") == $category->id ? "selected" : "" }}
                            >{{ $category->name }}</option>
                    @endforeach
                    </select>

                </div>

                <div class="mb-3">

                    <label for="tags">
                        Tags
                    </label>

                    @foreach ($tags as $tag)
                    <div class="form-check form-check-inline">
                        <input
                        class="form-check-input"
                        type="checkbox" 
                        id="tag-{{ $tag->id }}" 
                        name="tags[]" 
                        value="{{ $tag->id }}" {{ in_array($tag->id, old("tags", [])) ? "checked" : "" }}>
                        <label for="tag-{{ $tag->id }}">
                            {{ $tag->name }}
                        </label>
                    </div>
                    @endforeach
                </div>




                <div>
                    <button type="submit" class="btn btn-success">
                        Salva nuovo progetto
                    </button>
                </div>
                     
                     
                     
                    



                </div>
            
            
            
            </form>

        </div>

    </div>
</div>
@endsection