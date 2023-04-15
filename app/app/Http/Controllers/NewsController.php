<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateData;
use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::all();
        // dd($posts);
        // return view('users/userHome');
        return view('admin/newsIndex', [
            'news' => $news,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/newsCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:50',
            'comment' => 'required|max:500',
            'images' => 'required|image|mimes:jpeg,png,jpg,gif|max:1024',
        ]);
        $news = new News;
        // アップロードされたファイル名を取得
        $file_name = $request->file('images')->getClientOriginalName();

        // 取得したファイル名で保存
        $request->file('images')->storeAs('public/adminimages',$file_name);
        // 変数　＝　代入したい値　ブレードのname属性を持ってきている
        $news->title = $request->title;
        $news->images = $file_name;
        $news->comment = $request->comment;


        $news->save();

        return redirect('/news')->with('flash_message', 'お知らせを作成しました');
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
        $news = News::findOrFail($id);
        // dd($news);
        return view('admin/newsEdit', ['news' => $news]);
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
        $validatedData = $request->validate([
            'title' => 'required|max:50',
            'comment' => 'required|max:500',
            'images' => 'required|image|mimes:jpeg,png,jpg,gif|max:1024',
        ]);
        $news = News::find($id);

        // アップロードされたファイル名を取得
        $file_name = $request->file('images')->getClientOriginalName();

        // 取得したファイル名で保存
        $request->file('images')->storeAs('public/adminimages', $file_name);
        // 変数　＝　代入したい値　ブレードのname属性を持ってきている
        $news->title = $request->title;
        $news->images = $file_name;
        $news->comment = $request->comment;

        $news->save();

        // $colums = ['title', 'images', 'comment'];

        // foreach ($colums as $column) {
        //     $edits->$column = $request->$column;
        // }
        // $edits->save();

        return redirect('/news');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        News::find($id)->delete();
        return redirect('/news')->with('flash_message', 'お知らせを削除しました');
    }
}
