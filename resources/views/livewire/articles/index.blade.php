<?php

use function Livewire\Volt\{state};
use App\Models\Article;

state(['articles' => fn () => Article::all()]);

?>

<div>
    <h1>論文一覧</h1>
    @foreach ($articles as $article)
        <p><a href="{{ route('articles.show', $article) }}">{{ $article->title }}</a></p>
    @endforeach
</div>

