<?php

use function Livewire\Volt\{state, mount, rules};
use App\Models\Article;

state(['article', 'title', 'body', 'priority']);

rules([
    'title' => 'required|string|max:50',
    'body' => 'required|string|max:2000',
    'priority' => 'required|string|min:1|max:3',
]);

mount( function(Article $article) {
    $this->article = $article;
    $this->title = $article->title;
    $this->body = $article->body;
    $this->priority = $article->priority;
});

$update = function () {
    $this->varidate();
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
            @error('title')
                <span class="error">({{ $message }})</span>
            @enderror
            <input type="text" wire:model="title" id="title">
        </p>
        <p>
            <label for="body">本文</label><br>
            @error('body')
                <span class="error">({{ $message }})</span>
            @enderror
            <textarea wire:model="body" id="body"></textarea>
        </p>
        <p>
            <label for="priority">優先度</label><br>
            @error('priority')
                <span class="error">({{ $message }})</span>
            @enderror
            <select wire:model="priority" id="priority">
                <option value="1">低</option>
                <option value="2">中</option>
                <option value="3">高</option>
            </select>
        </p>
        <button type="submit">更新</button>
    </form>
</div>
