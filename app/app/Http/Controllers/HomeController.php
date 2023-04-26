<?php

namespace App\Http\Controllers;

use App\Favorite;
use App\News;
use App\Post;
use App\User;
use App\UserInfo;
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
        if (Auth::user()->role === 1) {
            $userinfos = UserInfo::where('user_id', Auth::id())->first();
            if ($userinfos != null) {
                $news = News::all();
                $like_model = new Favorite;
                return view('users/userHome', [
                    'news' => $news,
                    'like_model' => $like_model,
                ]);
            } else {
                $userinfo = UserInfo::where('user_id', Auth::id())->first();
                return view('users/loginUsersNullEdit', [
                    'user_info' => $userinfo,
                ]);
            }
        }else{
            $posts = Post::all();
            $users = New User;
            $userinfos = $users->join('user_info', 'users.id', 'user_id')->get();
            return view('admin/adminHome', [
                'posts' => $posts,
                'users' => $users,
                'userinfos' => $userinfos,
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
        User::find($id)->delete();
        UserInfo::where('user_id', $id)->delete();
        return redirect('/');
    }
}
