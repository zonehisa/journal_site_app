<?php

use function Livewire\Volt\{state, rules};
use App\Models\Article;

state(['title', 'body']);

rules([
    'title' => 'required|string|max:50',
    'body' => 'required|string|max:2000',
]);

$create = function () {
    $this->validate();
    Article::create([
        'title' => $this->title,
        'body' => $this->body,
    ]);
    return redirect()->route('articles.index');
};

?>

<div>
    <a href="{{ route('articles.index') }}">一覧に戻る</a>
    <h1>新規論文投稿</h1>
    <form wire:submit="create">
        <div>
            <label for="title">論文タイトル</label>
            @error('title')
                <span class="error">({{ $message }})</span>
            @enderror
            <br>
            <input type="text" wire:model="title">
        </div>
        <div>
            <label for="body">本文</label>
            @error('body')
                <span class="error">({{ $message }})</span>
            @enderror
            <br>
            <textarea wire:model="body"></textarea>
        </div>
        <button type="submit">投稿</button>
    </form>
</div>
