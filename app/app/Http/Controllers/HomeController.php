<?php

namespace App\Http\Controllers;

use App\News;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()//一覧表示（全部のデータを表示したい時）
    {
        //  （TODO）ユーザー画面にNewsを表示する
        if (Auth::user()->role === 1) {
            $news = News::all();
            // dd($news);
            // dd($posts);
            // return view('users/userHome');
            return view('users/userHome', [
                'news' => $news,
            ]);
        }else{
            $posts = Post::all();
            // return view('users/userHome');
            return view('admin/adminHome', [
                'posts' => $posts,
                // dd($posts),
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()//フォームの表示（登録画面の表示）ララベルのゲット送信
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)//保存の処理を行う（ララベルのPost送信）
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)//詳細画面の表示
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)//編集のページの表示
    {
        //
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
}
