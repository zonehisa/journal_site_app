<?php
use App\Models\Article;
use function Livewire\Volt\{state};

state(['article' => fn (Article $article) => $article]);


?>

<div>
    <h1>論文詳細</h1>
    <p>タイトル: {{ $article->title }}</p>
    <p>{!! nl2br(e($article->body)) !!}</p>
</div>
