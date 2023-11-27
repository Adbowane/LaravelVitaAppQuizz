<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Models;

class Answer extends Model
{
    protected $table = 'Answer'; // Assurez-vous que le nom de la table correspond à votre base de données

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
