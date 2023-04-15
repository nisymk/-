<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateData;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
     
        $search = $request->input('search');

        $query = User::query()->join('post', 'users.id', 'post.user_id');
        // dd($query);
        if ($search) {

            $spaceConversion = mb_convert_kana($search, 's');

            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);
            
            foreach($wordArraySearched as $value) {
                $query = $query->where('name', 'like', '%'.$value.'%')
                ->orWhere('comment', 'like', '%'.$value.'%')
                ->orWhere('title', 'like', '%' . $value . '%');
            }
            $posts = $query->get();

        } else {
            $posts = $query->get();
        }
        return view('users/postIndex', [
                'posts' => $posts,
                'search' => $search,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users/postCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateData $request)
    {
        $post = new Post;
        // アップロードされたファイル名を取得
        $file_name = $request->file('images')->getClientOriginalName();

        // 取得したファイル名で保存
        $request->file('images')->storeAs('public/usersimages', $file_name);
        // 変数　＝　代入したい値　ブレードのname属性を持ってきている
        $post->title = $request->title;
        $post->images = $file_name;
        $post->comment = $request->comment;
        // Auth::id() でログインしているユーザー（idのみ可能）
        $post->user_id = Auth::id();
    
        $post->save();

        return redirect('/');
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
        $posts = Post::findOrFail($id);
        // dd($news);
        return view('users/postEdit', ['post' => $posts]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateData $request, $id)
    {
        $post = Post::find($id);

        // アップロードされたファイル名を取得
        $file_name = $request->file('images')->getClientOriginalName();

        // 取得したファイル名で保存
        // dd($request);
        $request->file('images')->storeAs('public/usersimages', $file_name);
        // 変数　＝　代入したい値　ブレードのname属性を持ってきている
        $post->title = $request->title;
        $post->images = $file_name;
        $post->comment = $request->comment;

        $post->save();

        // $colums = ['title', 'images', 'comment'];

        // foreach ($colums as $column) {
        //     $edits->$column = $request->$column;
        // }
        // $edits->save();
        return redirect('/post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // where('id', $id) == find($id)
        POST::find($id)->delete();
        return redirect('/post');
    }
}
