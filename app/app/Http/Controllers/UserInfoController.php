<?php

namespace App\Http\Controllers;

use App\News;
use App\Post;
use App\User;
use App\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role === 1) {
            $news = News::all();
            $posts = Post::all();
            $userinfo= UserInfo::all();
            $users = Auth::user();
            $loginuserinfo = UserInfo::with('user')->where('user_id', Auth::id())->first();
            // $loginuserinfos = UserInfo::with('user')->get();
            // dd($users);
            // return view('users/userHome');
            return view('users/loginUsersIndex', [
                'news' => $news,
                'posts' => $posts,
                'user_info' => $userinfo,
                'users' => $users,
                'loginuser_info' => $loginuserinfo,
            ]);
        } else {
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userlists = UserInfo::with('post')->where('user_id', 'user_id');
        return view('users/userList', [
            // dd($userlists),
            'userlists' => $userlists,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $userinfo = UserInfo::findOrFail($id);
        // dd($news);
        $userinfo = UserInfo::where('user_id', Auth::id())->first();
        return view('users/loginUsersEdit', [
            'user_info' => $userinfo,
            // dd($posts),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *Z
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $userinfo = UserInfo::find($id);


        // アップロードされたファイル名を取得
        if($request->file('images') !== null) {
            $file_name = $request->file('images')->getClientOriginalName();
            $request->file('images')->storeAs('public/usersimages', $file_name);
            $userinfo->images = $file_name;
        }

        // 取得したファイル名で保存
        // dd($request->name);
        // 変数　＝　代入したい.値　ブレードのname属性を持ってきている
        $userinfo->user= $request->name;
        $userinfo->sports = $request->sports;
        $userinfo->prefecture = $request->prefecture;
        $userinfo->comment = $request->comment;

        $userinfo->save();

        // $colums = ['title', 'images', 'comment'];

        // foreach ($colums as $column) {
        //     $edits->$column = $request->$column;
        // }
        // $edits->save();
        return redirect('/user_info');

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
