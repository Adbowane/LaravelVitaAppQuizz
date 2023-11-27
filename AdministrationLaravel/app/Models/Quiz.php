<?php


namespace App\Models;
use Illuminate\Database\Eloquent\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

// Modèle pour la table Player
class Player extends Model
{
    protected $fillable = ['Firstname', 'LastName', 'LastPlay'];
}

class Quiz extends Model
{
    // protected $table = 'Quiz'; // Assurez-vous que le nom de la table correspond à votre base de données

    // public function questions()
    // {
    //     return $this->hasMany(Question::class);
    // }
    protected $fillable = ['Name', 'Description'];
}

// Modèle pour la table Question
class Question extends Model
{
    protected $fillable = ['Type', 'Content', 'Description'];
}

// Modèle pour la table Answer
class Answer extends Model
{
    protected $fillable = ['Content'];
}

// Modèle pour la table AnswerQuestion
class AnswerQuestion extends Model
{
    protected $fillable = ['AnswerId', 'QuestionId', 'isCorrect'];
}

// Modèle pour la table Game
class Game extends Model
{
    protected $fillable = ['Date', 'PlayerId', 'QuizId'];
}

// Modèle pour la table GameResult
class GameResult extends Model
{
    protected $fillable = ['GameId', 'AnswerId', 'QuestionId'];
}

// Modèle pour la table QuestionQuiz
class QuestionQuiz extends Model
{
    protected $fillable = ['QuestionId', 'QuizId'];
}
