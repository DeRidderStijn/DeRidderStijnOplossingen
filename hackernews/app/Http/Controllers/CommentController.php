<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Session;
use DB;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
       
        $comments = DB::table('comments')->orderBy('id')->where(['artikelID' => $id, 'isDeleted' => 'FALSE'])->get();
        return view('comments.comments')
            ->with('storedComments', $comments)
            ->with('artikelid',$id);
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
    public function store(Request $request)
    {
        $this->validate($request, [
            'newCommentText' => 'required|min:1|max:255',
            ]);

        $comment = new Comment;    

        $comment->text = $request->newCommentText;
        $comment->isDeleted = "FALSE";
        $comment->artikelID = $request->artikelID;
        $comment->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Comment::find($id);
        return view('comments.edit')->with('commentUnderEdit', $comment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'updatedCommentText' => 'required|min:1|max:255',
            ]);
        $comment = Comment::find($id);
        $comment->text = $request->updatedCommentText;
        $comment->save();
        Session::flash('success', 'Article has been successfully updated');
        return redirect('comments/' . $request->articleid . '/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function deleteComment($id)
    {
        $comment = Comment::find($id);
        $comment->isDeleted = "TRUE";
        $comment->save();
        Session::flash('success', 'Delete was a succes');

        return redirect()->back();
    }
}
