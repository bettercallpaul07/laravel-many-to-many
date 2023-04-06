<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "slug",
        "content",
        "category_id"
    ];

    public function category() {
        //restitusce la categoria del progetto
        return $this->belongsTo(Category::class);
    }

    public function tags() {
        //restituisce i tag del progetto
        return $this->belongsToMany(Tag::class);
    }

};
