<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Session;
use Auth;
use App\Comment;
use DB;
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::orderBy('id', 'desc')->where("isDeleted", "FALSE")->get();
        $commentscount = DB::table('comments')
            ->selectRaw('*, count(*)')
            ->groupBy('artikelID');



        return view('articles.index')
        ->with('storedArticles', $articles)
        ->with('commentCount', $commentscount);

        /*
            $reserves = DB::table('reserves')->selectRaw('*, count(*)')->groupBy('day');
        */
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
            'newArticleTitle' => 'required|min:5|max:255',
            'newArticleLink' => 'required',
            ]);

        $article = new Article;    

        $article->title = $request->newArticleTitle;
        $article->link = $request->newArticleLink;
        $article->points = 0;
        $article->isDeleted = "FALSE";
        $article->userID = Auth::id();
        $article->save();

        Session::flash('success', 'New article has been succesfully created!');
        return redirect()->route('articles.index');
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
        $article = Article::find($id);
        return view('articles.edit')->with('articleUnderEdit', $article);
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
            'updatedArticleTitle' => 'required|min:5|max:255',
            'updatedArticleLink' => 'required',
            ]);
        $article = Article::find($id);
        $article->title = $request->updatedArticleTitle;
        $article->link = $request->updatedArticleLink;

        $article->save();
        Session::flash('success', 'Article has been successfully updated');
        return redirect()->route('articles.index');
    }

    public function upvote($id)
    {
        $article = Article::find($id);
        $article->points += 1;
        $article->save();
        Session::flash('success', 'Downvote was a succes');

        return redirect()->route('articles.index');
    }
    public function downvote(Request $request, $id)
    {
        $article = Article::find($id);
        $article->points -= 1;
        $article->save();
        Session::flash('success', 'Downvote was a succes');

        return redirect()->route('articles.index');
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

    public function deleteArticle($id)
    {
        $article = Article::find($id);
        $article->isDeleted = "TRUE";
        $article->save();
        Session::flash('success', 'Delete was a succes');

        return redirect()->route('articles.index');
    }
    public function addArticle()
    {
        return view('articles.index');
    }
}
