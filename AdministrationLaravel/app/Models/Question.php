<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Models;

class Question extends Model
{
    protected $table = 'Question'; // Assurez-vous que le nom de la table correspond à votre base de données

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
