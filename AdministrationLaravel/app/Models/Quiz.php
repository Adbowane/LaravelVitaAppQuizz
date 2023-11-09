<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// class Quiz extends Model
// {
//     use HasFactory;
// }
class Quiz extends Model
{
    protected $fillable = ['nom_du_quiz', 'question', 'bonnes_reponses', 'mauvaises_reponses', 'tags'];
}