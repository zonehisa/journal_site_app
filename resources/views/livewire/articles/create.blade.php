<?php

use function Livewire\Volt\{state};
use App\Models\Article;

state(['title', 'body']);

$create = function () {
    Article::create([
        'title' => $this->title,
        'body' => $this->body,
    ]);
    return redirect()->route('articles.index');
};

?>

<div>
    <h1>新規論文投稿</h1>
    <form wire:submit="create">
        <div>
            <label for="title">論文タイトル</label><br>
            <input type="text" wire:model="title">
        </div>
        <div>
            <label for="body">本文</label><br>
            <textarea wire:model="body"></textarea>
        </div>
        <button type="submit">投稿</button>
    </form>
</div>
