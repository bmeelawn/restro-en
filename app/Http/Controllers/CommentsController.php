<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Restaurant;
use App\User;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id)
    {   
        $order = $request->input('order');
        $restaurant = Restaurant::find($id);

        switch($order) {
            case 'latest':
                $comment = Comment::with('user')->where('res_id', $id)->orderBy('id', 'DESC')->get();
            break;
            default:
            $comment = Comment::with('user')->where('res_id', $id)->get();
        }
        return view('pages.show')->with(['restaurant' => $restaurant, 'comment' => $comment]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $res_id)
    {   
        $user_id = session()->get('user')[0]['id'];
        $res_id = $res_id;

        $request->validate([
            "Add_Comment" => "required"
        ]);

        $comment = new Comment;
        $comment->comment = $request->input('Add_Comment');
        $comment->user_id = $user_id;
        $comment->res_id = $res_id;
        $comment->save();

        return redirect('/show/'.$res_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
