@extends('layouts.app')

@section('title') Index @endsection

@section('content')

<div class="text-center">
      <a href="{{route('posts.create')}}" button type="button" class="btn btn-danger">Create Post</button> </a>    
</div>




  <div class="text-center">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Posted By</th>
            <th scope="col">Created at</th>
            <th scope="col">Action</th>
            
          </tr>
        </thead>
        <tbody>
          @foreach ($posts as $post)
          <tr>
            <th scope="row">{{$post->id}}</th>
            <td>{{$post->title}}</td>
            <td>{{$post->user ? $post->user->name : "Not Found"}}</td>
            {{-- @dd($post->created_at)) --}}
            <td>{{$post->created_at->format('Y-m-d')}}</td>
            <td>
              <a  href="{{route('posts.show', $post->id)}}"  class="btn btn-info">View</a>
              <a  href="{{route('posts.edit' , $post->id)}}" , class="btn btn-dark">Edit</a>
              
              <form action="{{route('posts.destroy' , $post->id)}}" method="POST" style="display: inline-block">
                @csrf
                @method('DELETE')
                
                {{-- <button type="submit"  href="{{route('posts.destroy')}}" , class="btn btn-danger">Delete</a> --}}
                <button type="submit", class="btn btn-danger">Delete</a>
              </form>
            </td>
          </tr>
          @endforeach


        </tbody>
      </table>
  </div>



@endsection