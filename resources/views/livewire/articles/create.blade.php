<?php

use function Livewire\Volt\{state, rules};
use App\Models\Article;

state(['title', 'body', 'priority' => 1]);

rules([
    'title' => 'required|string|max:50',
    'body' => 'required|string|max:2000',
    'priority' => 'required|integer|min:1|max:3',
]);

$create = function () {
    $this->validate();
    Article::create([
        'title' => $this->title,
        'body' => $this->body,
        'priority' => $this->priority,
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
        <div>
            <label for="priority">優先度</label>
            @error('priority')
                <span class="error">({{ $message }})</span>
            @enderror
            <br>
            <select wire:model="priority" id="priority">
                <option value="1">低</option>
                <option value="2">中</option>
                <option value="3">高</option>
            </select>            
        </div>
        <button type="submit">投稿</button>
    </form>
</div>
