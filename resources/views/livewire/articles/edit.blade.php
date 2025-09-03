<?php

use function Livewire\Volt\{state, mount};
use App\Models\Article;

state(['article', 'title', 'body']);

mount( function(Article $article) {
    $this->article = $article;
    $this->title = $article->title;
    $this->body = $article->body;
});

$update = function () {
    $this->article->update($this->all());
    return redirect()->route('articles.show', $this->article);
};

?>

<div>
    <a href="{{ route('articles.show', $article) }}">戻る</a>
    <h1>更新</h1>
    <form wire:submit="update">
        <p>
            <label for="title">タイトル</label><br>
            <input type="text" wire:model="title" id="title">
        </p>
        <p>
            <label for="body">本文</label><br>
            <textarea wire:model="body" id="body"></textarea>
        </p>
        <button type="submit">更新</button>
    </form>
</div>
