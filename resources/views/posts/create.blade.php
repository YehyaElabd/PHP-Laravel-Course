@extends('layouts.app')

@section('title') Create @endsection


@section('content')

<!-- /resources/views/post/create.blade.php -->
  
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
 
<!-- Create Post Form -->
<div class="container mt-5">
    <h2 class="mb-4">Create Form</h2>
<form method="POST" action="{{route('posts.store')}}"> 
    @csrf
    <!-- Label and Input -->
    <div class="mb-3">
      <label for="input1" class="form-label">Title</label>
      <input name="title" type="text" class="form-control" id="input1" placeholder="Enter title Name" required>
    </div>

    <!-- Label 2 and Input 2 -->
    <div class="mb-3">
      <label for="input2" class="form-label">Description</label>
      <input name="description" type="text" class="form-control" id="input2" placeholder="Write Description" required>
    </div>

    <!-- Label and Select -->
    <div class="mb-3">
      <label for="select" class="form-label">Post Creator</label>
      <select name="creator" class="form-select" id="select">
        @foreach ($users as $user)
        <option value="{{$user->id}}">{{$user->name}}</option>
        @endforeach
      </select>
    </div>

    <!-- Submit Button -->
    <button type="submit" class="btn btn-outline-success  btn-lg">Submit</button>
  </form>
</div>


@endsection