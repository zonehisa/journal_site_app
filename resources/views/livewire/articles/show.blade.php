<?php

use function Livewire\Volt\{state};
use App\Models\Article;

state(['article' => fn (Article $article) => $article]);

$edit = function () {
    return redirect()->route('articles.edit', $this->article);
};

$destroy = function () {
    $this->article->delete();
    return redirect()->route('articles.index');
};

?>

<div>
    <a href="{{ route('articles.index') }}">一覧へ戻る</a>
    <h1>論文詳細</h1>
    <p>タイトル: {{ $article->title }}</p>
    <p>{!! nl2br(e($article->body)) !!}</p>
    <button wire:click="edit">編集</button>
    <button wire:click="destroy" wire:confirm="本当に削除しますか？">削除する</button>
</div>
