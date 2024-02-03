@extends('layout.app')
@section('title',$tasks->title)


@section('content')
<div class="mb-4">
  <a href="{{ route('tasks.index') }}" class="link">← Go back to the task list!</a>
</div>

<p class="mb-4 text-slate-700">{{ $tasks->description }}</p>

@if ($tasks->long_description)
  <p class="mb-4 text-slate-700">{{ $tasks->long_description }}</p>
@endif


<p class="mb-4 text-sm text-slate-500">Created {{ $tasks->created_at->diffForHumans() }} • Updated
  {{ $tasks->updated_at->diffForHumans() }}</p>
  <p class="mb-4">
    @if ($tasks->completed)
      <span class="font-medium text-green-500">Completed</span>
    @else
      <span class="font-medium text-red-500">Not completed</span>
    @endif
  </p>

<div>
  <div class="flex gap-2">
    <a href="{{ route('tasks.edit', ['task' => $tasks]) }}"
      class="btn">Edit</a>
</div>

<div>
  <form action="{{route('tasks.complete',['task'=>$tasks])}}" method="POST">
  @csrf
  @method('PUT')
   <button type="submit" class="btn">{{$tasks->completed ? 'Not Complete': 'Completed'}}</button>
  </form>
</div>



 <div>
    <form action="{{ route('tasks.destroy', ['task' => $tasks]) }}" method="POST">
      @csrf
      @method('DELETE')
      <div class="flex items-center gap-2">
        <button type="submit" class="btn">Delete</button>

      </div>
    </form>
  </div>
@endsection

