@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col">
            <h1>
                Modifica progetto
            </h1>
        </div>
        @include('partials.errors')
    </div>
    <div class="row mb-4">
        <div class="col">
            <form action="{{ route("admin.projects.update", $project->id) }}" method="POST">
                
                @csrf

                @method("PUT")

                <div class="mb-3">
                    <label for="title" class="form-label">Titolo</label>
                    <input
                     type="text"
                     class="form-control"
                     id="title"
                     name="title"
                     value="{{ old("title", $project->title) }}"
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
                        maxlength="4096">{{ old("content", $project->content) }}</textarea>
                </div>

                <div class="mb-3">
                    
                    <label for="category_id" class="form-label">
                        Categoria
                    </label>

                    <select name="category_id" id="category_id" class="form-select">
                    <option value="">Nessuna categoria</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old("category_id", $project->category_id) == $category->id ? "selected" : "" }}>{{ $category->name }}</option>
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
                        @if ((old("tags") !== null) && (count(old("tags")) > 0) && (in_array($tag->id, old("tags"))))
                            {{ in_array($tag->id, old("tags")) ? "checked" : "" }}
                        @else
                            {{ $project->tags->contains($tag) ? "checked" : "" }}
                        @endif
                        value="{{ $tag->id }}">

                        <label for="tag-{{ $tag->id }}">
                            {{ $tag->name }}
                        </label>
                    </div>
                    @endforeach
                </div>


                <div>
                    <button type="submit" class="btn btn-warning">
                        Aggiorna il progetto
                    </button>
                </div>
                     
            </form>

        </div>
            
            
            

    </div>

</div>
@endsection

Missing required parameter for [Route: admin.projects.update] [URI: admin/projects/{project}] [Missing parameter: project].