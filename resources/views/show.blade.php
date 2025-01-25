@extends('layouts.app')

@section('title', $task->title)
@section('content')

    <p>{{ $task->description }}</p>
    @if ($task->long_description)
        <p>{{ $task->long_description }}</p>
    @endif
    <p>{{ $task->created_at }}</p>
    <p>{{ $task->updated_at }}</p>
    <p>
        @if ($task->completed)
            <span>Completed</span>
            @else
            <span>Incomplete</span>
        @endif
    </p>

    <div>
        <a href="{{ route('tasks.edit', ['task' => $task->id]) }}">Edit Task</a>
    </div>

    <div>
        <form method="POST" action="{{route('tasks.toggle-complete',['task' => $task])}}">
            @csrf
            @method('PUT')
            <button type="submit">
                Mark As {{ $task->completed ? 'Incomplete' : 'Complete' }}
            </button>
        </form>
    </div>

    <div>
        <form action="{{ route('tasks.destroy', ['task' => $task]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Delete Task</button>
        </form>
    </div>
@endsection
