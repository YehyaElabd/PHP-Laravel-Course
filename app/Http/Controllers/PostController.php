<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\User;
class PostController extends Controller
{
    //
    public function index()
    {

        // Select * all From database

        $postsFromDB = Post::all(); //Collection object

        return view( 'posts.index', ['posts' => $postsFromDB]); 
    }

    public function show($PostId)
    {

        $postsFromDB = Post::findorFail($PostId); // Model object    
        return  view( 'posts.show', ['post' => $postsFromDB] );
    }

    public function create()
    {
        $users = User::all();
        // dd($users);
        // return ' Create a new post';
        return view( 'posts.create' , ['users' => $users]);
    }

    public function store()
    {
     
        // using dd to debug the Code
        // dd( request() -> all());
        // dd( request() -> title);

        // Get the Data
        // $data = request() -> all();
        
        // $title = request() -> title;
        // $description = request() -> description;
        // $user_id = request() -> user_id;
        // // Display the Data
        //----------------------------------------------------------------
        // Store the Data

        // Validate

        request()->validate([
            'title' =>'required|min:5',
            'description' =>'required|min:10',
            'creator' =>'required|exists:users,id'  // validate the creator exists in users table with id
        ]);

        Post::create([
            'title' => request() -> title,
            'description' => request() -> description,
            'user_id' => request() -> creator
        ]);
        // dd( $title, $description, $user_id);

        // $post = new Post();
        // $post -> title = $title;
        // $post -> description = $description;
        // $post -> user_id = $user_id; ;
        // $post -> save(); // save to database


        // Redirect to the index page [Home page]
        // return ' Store a new post';
        return redirect( route( 'posts.index'));
        // return to_route( 'posts.index');

    }
    public function edit(post $post)
    {

        $users = User::all();

       // $postsFromDB = Post::findorFail($PostId); // Model object    


        
        return view( 'posts.edit', ['users' => $users , 'post'=> $post]);
    }

    public function update($PostId)
    {
        // return 'Update post '. $PostId;
        // Get the Data
        // $data = request() -> all();
        
        $title = request() -> title;
        $description = request() -> description;
       $creator = request() -> creator;


        $postsFromDB = Post::find($PostId); // Model object    
        // Update the Data
        $postsFromDB -> update([
            // 'title' => $title,
            // 'description' => $description,
            // 'user_id' => $creator
            'title' =>  $title,
            'description' => $description,
            'user_id' => $creator
        ]);


        return redirect( route( 'posts.show', $PostId ));
        // return redirect( route( 'posts.show', ['post' => $PostId]));
    }

    public function destroy($PostId)
    {
        // return 'Delete post '. $PostId;
        // Delete the Data
        // Redirect to the index page [Home page]
        // return ' Store a new post';
        $postsFromDB = Post::find($PostId); // Model object  
        $postsFromDB -> delete();  


        return redirect( route( 'posts.index'));
    }
}




////////////////////////////////////////////////////////////////



        // Display the Data
        // dd($title, $description, $creator);
        // ----------------------------------------------------------------
        // Update  the Data

        // Redirect to Posts.show [show] page
        // return ' Store a new post';


  // dd($postsFromDatabase);
  // $allPosts = 
  // [
  //     [
  //         'id' => 1,
  //         'title' => 'PHP',
  //         'author' => 'Mahmoud',
  //         'created_at' => '2025-01-01 00:00:00'
  //     ],
  //     [
  //         'id' => 2,
  //         'title' => 'Javascript',
  //         'author' => 'Eslam',
  //         'created_at' => '2024-01-01 00:00:00'
  //     ],
  //     [
  //         'id' => 3,
  //         'title' => 'HTML5',
  //         'author' => 'Yaya',
  //         'created_at' => '2023-01-01 00:00:00'
  //     ],
  //     [
  //         'id' => 4,
  //         'title' => 'CSS3',
  //         'author' => 'ahmed',
  //         'created_at' => '2020-01-01 00:00:00'
  //     ],
      
  // ];

  // --------------------------------------------

//   $Singlepost = [
//     'id' => $PostId,
//     'description' => 'This is a description for post '. $PostId,
//     'title' => 'Post  PHP of '. $PostId,
//     'author' => 'Author '. $PostId,
//     'created_at' => '2025-01-01 00:00:00'
// ]; 





    // return 'Edit post '. $PostId;
        // $Singlepost = [
        //     'id' => $PostId,
        //     'description' => 'This is a description for post '. $PostId,
        //     'title' => 'Post  PHP of '. $PostId,
        //     'author' => 'Author '. $PostId,
        //     'created_at' => '2025-01-01 00:00:00'
        // ]; 

        // public function show(Post $PostId)

        // I couldn't use Route Model Binding
        //  select * from post where post_id = $PostId  there are 3 ways to select

        // 1- Using Eloquent ORM Better use
        // $postsFromDB = Post::find($PostId); ; //Model Object
        
        // 2- Using Eloquent ORM when Search all Results
        // $postsFromDB = Post::where($PostId)->get(); //Collection object
        
        // 3- Using Eloquent ORM when Search first item will get only when search
        // $postsFromDB = Post::where('id', $PostId)->first(); //Model Object
        // dd($users);
