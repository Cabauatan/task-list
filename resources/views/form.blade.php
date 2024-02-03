@extends('layout.app')

@section('title',isset($tasks) ? 'Edit Task List' : 'Add Task List')
    


@section('content')



<form action="{{ isset($tasks) ? route('tasks.update',['task' => $tasks]) : route('tasks.store')}}" method="POST">
    @csrf
    @isset($tasks)
        @method('PUT')
    @endisset
    <div class="mb-4">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" value="{{$tasks->title ?? old('title')}}" @class(['border-red-500' => $errors->has('title')])>
        @error('title')
            <p class="error">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-4">
        <label for="description">Description</label>
        <textarea name="description" id="description" cols="30" rows="5" @class(['border-red-500' => $errors->has('description')])>{{$tasks->description ??old('description')}}</textarea>
        @error('description')
        <p class="error">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-4">
        <label for="long_description">Long Description</label>
        <textarea name="long_description" id="long_description" cols="30" rows="5" @class(['border-red-500' => $errors->has('long_description')])>{{$tasks->long_description ??old('long_description')}}</textarea>
        @error('long_description')
        <p class="error">{{ $message }}</p>
        @enderror
    </div>
    <div class="flex items-center gap-2">
        <button type="submit" class="btn">
            @isset($tasks)
                Edit
            @else
                Add
            @endisset

        </button>
        <a href="{{ route('tasks.index') }}" class="link">Cancel</a>
    </div>
    
</form>
    
@endsection

