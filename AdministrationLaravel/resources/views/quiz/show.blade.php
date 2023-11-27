<!-- Affichage du quiz, des questions et des réponses -->
<h1>{{ $quiz->Name }}</h1>
<a href="{{ route('showQuiz', ['quizId' => $quiz->id]) }}">Voir le quiz</a>
@foreach ($quiz->questions as $question)
    <h2>{{ $question->Content }}</h2>
    <ul>
        @foreach ($question->answers as $answer)
            <li>{{ $answer->Content }}</li>
        @endforeach
    </ul>
    <!-- Formulaire pour modifier la question -->
    <form action="{{ route('updateQuestion', ['questionId' => $question->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="content" value="{{ $question->Content }}">
        <button type="submit">Modifier</button>
    </form>

    <!-- Formulaire pour modifier la réponse -->
    @foreach ($question->answers as $answer)
        <form action="{{ route('updateAnswer', ['answerId' => $answer->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="text" name="content" value="{{ $answer->Content }}">
            <button type="submit">Modifier</button>
        </form>
    @endforeach
@endforeach


