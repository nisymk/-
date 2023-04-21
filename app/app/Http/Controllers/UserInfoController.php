<?php

namespace App\Http\Controllers;

use App\Event;
use App\Favorite;
use App\Http\Requests\CreateData;
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
        $news = News::all();
        $posts = Post::all();
        $userinfo = UserInfo::all();
        $users = Auth::user();
        $loginuserinfo = $users->userinfo;
        $events = Event::all();
        $favorites = Favorite::all();
        if (Auth::user()->role === 1) {
            return view('users/loginUsersIndex', [
                'news' => $news,
                'posts' => $posts,
                'user_info' => $userinfo,
                'users' => $users,
                'loginuser_info' => $loginuserinfo,
                'events' => $events,
                'favorites' => $favorites,
            ]);
        } else {
            // $posts = Post::all();
            // return view('users/userHome');
            return view('admin/adminDetail', [
                'posts' => $posts,
                'user_info' => $userinfo,
                'users' => $users,
                'loginuser_info' => $loginuserinfo,
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
        $event = new Event;
        // Auth::id() でログインしているユーザー（idのみ可能）
        $event->user_id = Auth::id();
        $event->news_id = $request->news_id;

        $event->save();

        // return redirect('/user_info');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $news = News::all();
        return view('users/userDetail', [
            'user' => $user,
            'news' => $news,
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
        $userinfo = UserInfo::where('user_id', Auth::id())->first();
        return view('users/loginUsersEdit', [
            'user_info' => $userinfo,
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
        $validatedData = $request->validate([
           'name' => 'required|max:100',
           'prefecture' => 'required|max:50',
        ]);
        $info = UserInfo::find($id);
        $userinfo = UserInfo::where('user_id', Auth::id())->first();
        if ($userinfo == null) {
            $userinfo = new UserInfo;
            // アップロードされたファイル名を取得
            if ($request->file('images') !== null) {
                $file_name = $request->file('images')->getClientOriginalName();
                $request->file('images')->storeAs('public/usersimages', $file_name);
                $userinfo->images = $file_name;
            }
            // 取得したファイル名で保存
            // 変数　＝　代入したい値　ブレードのname属性を持ってきている
            $userinfo->prefecture= $request->prefecture;
            $userinfo->sports = $request->sports;
            $userinfo->comment = $request->comment;
            // Auth::id() でログインしているユーザー（idのみ可能）
            $userinfo->user_id = Auth::id();

            $userinfo->save();

            return redirect('/user_info');
        } else {
            // アップロードされたファイル名を取得
            if($request->file('images') !== null) {
                $file_name = $request->file('images')->getClientOriginalName();
    
                if (Auth::user()->role === 1) {
                    $request->file('images')->storeAs('public/usersimages', $file_name);
                } else {
                    $request->file('images')->storeAs('public/adminimages', $file_name);
                }
                $userinfo->images = $file_name;
                $userinfo->save();
            }
    
            // 変数　＝　代入したい.値　ブレードのname属性を持ってきている
            $user = Auth::user();
            $user->name = $request->name;
            $user->save();
    
            if (!empty($request->prefecture)){
                $userinfo->prefecture = $request->prefecture;
            }
            if (!empty($request->sports)) {
                $userinfo->sports = $request->sports;
            }
            if (!empty($request->comment)){
                $userinfo->comment = $request->comment;
            }
            if (!empty($request->sports) || !empty($request->prefecture) || !empty($request->comment)) {
                $userinfo->save();
            }
            return redirect('/user_info');
        }

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
