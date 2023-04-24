<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateData;
use App\Post;
use App\User;
use App\UserInfo;
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
        // $user_info = Post::query()->join('user_info', 'users.id', 'user_info.user_id');
        $user_infos = UserInfo::where('user_id', Auth::id())->get();
        $query = User::query()->join('post', 'users.id', 'post.user_id')->orderBy('post.updated_at', 'desc');
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
                'user_infos' => $user_infos,
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
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:50',
            'comment' => 'required|max:500',
        ]);
        $post = new Post;
        // アップロードされたファイル名を取得
        if ($request->file('images') !== null) {
            $file_name = $request->file('images')->getClientOriginalName();
            $request->file('images')->storeAs('public/usersimages', $file_name);
            $post->images = $file_name;
        }
        // 取得したファイル名で保存
        // 変数　＝　代入したい値　ブレードのname属性を持ってきている
        $post->title = $request->title;
        $post->comment = $request->comment;
        // Auth::id() でログインしているユーザー（idのみ可能）
        $post->user_id = Auth::id();
    
        $post->save();

        return redirect('/post');
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
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:50',
            'comment' => 'required|max:500',
        ]);
        $post = Post::find($id);

        // アップロードされたファイル名を取得
        if ($request->file('images') !== null) {
            $file_name = $request->file('images')->getClientOriginalName();
            $request->file('images')->storeAs('public/usersimages', $file_name);
            $post->images = $file_name;
        }

        // 変数　＝　代入したい値　ブレードのname属性を持ってきている
        $post->title = $request->title;
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
        if (Auth::user()->role === 1) {
            return redirect('/post');
        } else {
            return redirect('/');
        }
    }
}
