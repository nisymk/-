<?php

namespace App\Http\Controllers;

use App\Event;
use App\Favorite;
use App\Http\Requests\CreateData;
use App\News;
use App\Post;
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
        $news = News::orderBy('updated_at', 'desc')->get();

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
        $file_name = $request->file('images')->getClientOriginalName();
        $request->file('images')->storeAs('public/adminimages',$file_name);

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
        $news = News::findOrFail($id);
        $like_model = new Event;

        return view('users/newsDetail', [
            'news' => $news,
            'like_model' => $like_model,
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
        $news = News::findOrFail($id);

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
        ]);
        $news = News::find($id);
        $images = $request->file('images');
        
        if (isset($images)) {
            $file_name = $request->file('images')->getClientOriginalName();
            $request->file('images')->storeAs('public/adminimages', $file_name);
        }

        $news->title = $request->title;
        $news->images = $file_name ?? $news['images'];
        $news->comment = $request->comment;

        $news->save();

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

    public function ajaxlike(Request $request)
    {
        $id = Auth::user()->id;
        $news_id = $request->news_id;
        $like = new Favorite;
        $news = News::findOrFail($news_id);

        if ($like->like_exist($id, $news_id)) {
            $like = Favorite::where('news_id', $news_id)->where('user_id', $id)->delete();
        } else {
            $like = new Favorite;
            $like->news_id = $request->news_id;
            $like->user_id = Auth::user()->id;
            $like->save();
        }

        $newsLikesCount = $news->loadCount('like')->likes_count;

        $json = [
            'newsLikesCount' => $newsLikesCount,
        ];
        return response()->json($json);
    }

    public function ajaxevent(Request $request)
    {
        $id = Auth::user()->id;
        $news_id = $request->news_id;
        $event = new Event;
        $news = News::findOrFail($news_id);

        if ($event->like_exist($id, $news_id)) {
            $event = Event::where('news_id', $news_id)->where('user_id', $id)->delete();
        } else {
            $event = new Event;
            $event->news_id = $request->news_id;
            $event->user_id = Auth::user()->id;
            $event->save();
        }

        $newsLikesCount = $news->loadCount('like')->likes_count;

        $json = [
            'newsLikesCount' => $newsLikesCount,
        ];
        return response()->json($json);
    }
}
