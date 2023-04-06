<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
    ];
    //protected fillable serve per dire a laravel che i campi possono essere riempiti
    //in questo caso, il nome e lo slug
    //in questo modo, se proviamo a creare un tag con un altro campo, laravel ci darà un errore

    public function projects() {
        //restituisce i progetti associati al tag
        return $this->belongsToMany(Project::class);
    }




}
