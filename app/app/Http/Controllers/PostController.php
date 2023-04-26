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
        $users = new User;
        $user_infos = UserInfo::where('user_id', Auth::id())->get();
        if (Auth::user()->role === 1) {
            $query = User::query()->join('post', 'users.id', 'post.user_id')->orderBy('post.updated_at', 'desc');
            if ($search) {
                $spaceConversion = mb_convert_kana($search, 's');

                $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);

                foreach ($wordArraySearched as $value) {
                    $query = $query->where('name', 'like', '%' . $value . '%')
                        ->orWhere('comment', 'like', '%' . $value . '%')
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
        } else {
            $query = User::query()->join('post', 'users.id', 'post.user_id')->orderBy('post.updated_at', 'desc');
            $queryUsers = User::query()->join('user_info', 'users.id', 'user_id')->orderBy('user_info.updated_at', 'desc');
            if ($search) {
                $spaceConversion = mb_convert_kana($search, 's');
                
                $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);
                
                foreach ($wordArraySearched as $value) {
                    $queryUsers = $queryUsers->where('name', 'like', '%' . $value . '%')
                        ->orWhere('email', 'like', '%' . $value . '%')
                        ->orWhere('comment', 'like', '%' . $value . '%');
                    $query = $query->where('name', 'like', '%' . $value . '%')
                    ->orWhere('comment', 'like', '%' . $value . '%')
                    ->orWhere('title', 'like', '%' . $value . '%');
                }

                $posts = $query->get();
                $userinfos = $queryUsers->get();
            } else {
                $posts = $query->get();
                $userinfos = $queryUsers->get();
            }
            return view('admin/adminHome', [
                'posts' => $posts,
                'search' => $search,
                'userinfos' => $userinfos,
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
        if ($request->file('images') !== null) {
            $file_name = $request->file('images')->getClientOriginalName();
            $request->file('images')->storeAs('public/usersimages', $file_name);
            $post->images = $file_name;
        }
        $post->title = $request->title;
        $post->comment = $request->comment;
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

        $post->title = $request->title;
        $post->comment = $request->comment;

        $post->save();

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
