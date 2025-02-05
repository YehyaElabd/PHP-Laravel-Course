@extends('layouts.app')

@section('title') Edit @endsection


@section('content')


<div class="container mt-5">
    <h2 class="mb-4">Edit Form</h2>
<form method="POST" action="{{route('posts.update' , $post->id)}}"> 
    @csrf
    @method('PUT')
    <!-- Label and Input -->
    <div class="mb-3">
      <label for="input1"  class="form-label">Title</label>
      <input name="title" value="{{$post->title}}" type="text"  class="form-control" id="input1" placeholder="Enter title Name">
    </div>

    <!-- Label 2 and Input 2 -->
    <div class="mb-3">
      <label for="input2" class="form-label">Description</label>
      <input name="description" value="{{$post->description}}" type="text" class="form-control" id="input2" placeholder="Write Description">
    </div>

    <!-- Label and Select -->
    <div class="mb-3">
      <label for="select" class="form-label">Post Creator</label>
      <select name="creator" class="form-select" id="select">
        @foreach ($users as $user)
        <option @if($user->id == $post-> user_id) selected @endif value="{{$user->id}}">{{$user->name}}</option>
        @endforeach
      </select>
    </div>

    <!-- Submit Button -->
    <button type="submit" class="btn btn-outline-success  btn-lg">Submit</button>
  </form>
</div>


@endsection