<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;

//Models
use App\Models\Category;
use App\Models\Project;
use App\Models\Tag;



//Helpers
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();

        return view("admin.projects.index", compact("projects"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        $categories = Category::all();
        $tags = Tag::all();

        return view("admin.projects.create", compact("categories", "tags"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */




    public function store(StoreProjectRequest $request)
    {
        //qui prendiamo gli input validati
        $data = $request->validated();

        //rendiamo uno slug il titolo importando Str come helpers
        $slug = Str::slug($data["title"]);

        $newProject = Project::create([

            //qui salviamo i dati
            "title" => $data["title"],
            "slug" => $slug,
            "content" => $data["content"],
            "category_id" => $data["category_id"],
            "tags" => $data["tags"]
        ]);

        if (array_key_exists("tags", $data)) {
            //se esiste la chiave tags
            //allora facciamo il foreach
            //e facciamo l'attach

            //sync() è una funzione di Laravel che ci permette di collegare i tag al progetto
            $newProject->tags()->sync($data["tags"]);
            //oppure
            // foreach
            // ($data["tags"] as $tag) {
            //     $newProject->tags()->attach($tag);
            // }
        }



        //tags() è una funzione che abbiamo definito in app\Models\Project.php
        //tags() restituisce i tag del progetto
        //attach() è una funzione di Laravel che ci permette di collegare i tag al progetto


        //facciamo il redirect alla show dopo aver salvato i dati
        return redirect()->route("admin.projects.show", $newProject)->with("success", "Post aggiunto con successo!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view("admin.projects.show", compact("project"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)

    {

        $categories = Category::all();
        $tags = Tag::all();
        //qui prendiamo tutti i dati delle categorie e dei tag
        //e li passiamo alla view

        return view("admin.projects.edit", compact("project", "categories", "tags"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */


    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->validated();
        //qui prendiamo gli input validati

        $data["slug"] = Str::slug($data["title"]);
        //rendiamo uno slug il titolo importando Str come helpers

        $project->update($data);
        //update() è una funzione di Laravel che ci permette di aggiornare i dati del progetto
        

        if (array_key_exists("tags", $data)) {
            $project->tags()->sync($data["tags"]);
        } else {
            $project->tags()->detach();
        }
        //sync() è una funzione di Laravel che ci permette di sincronizzare i tag del progetto
        //detach() è una funzione di Laravel che ci permette di rimuovere i tag dal progetto

        return redirect()->route("admin.projects.show", $project->id)->with("success", "Progetto modificato con successo!");
        //facciamo il redirect alla show dopo aver salvato i dati
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route("admin.projects.index", $project->id)->with("success", "Progetto eliminato con successo!");
    }
}
