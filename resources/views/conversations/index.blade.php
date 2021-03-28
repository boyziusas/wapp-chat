@extends('conversations.layouts.app')

@section('content')
    <h2>Conversations</h2>

    <div class="list-group">
        @forelse($conversations as $conversation)
            <a href="{{ route('conversations.show', ['conversation' => $conversation['id']]) }}"
               class="list-group-item d-flex justify-content-between align-items-center list-group-item-action">
                {{ $conversation['name'] }}
            </a>
        @empty
            No messages...
        @endforelse
    </div>
@endsection
