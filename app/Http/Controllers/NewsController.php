<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.news.index')->with('news',News::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
           //Validate
        $this->validate($request, [
        'title'=>'required|max:100',
        'desc'=>'required'
        ]);
        $input=$request->all();
        News::create($input);
        return view('welcome-links.news')->with('news',News::all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news=News::findorFail($id);
        return view('admin.news.index')->with('news',$news);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news=News::findorFail($id);
        return view('admin.news.edit')->with('news',$news);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {  
           //Validate
        $this->validate($request, [
        'title'=>'required|max:10',
        'desc'=>'required'
        ]);
        
        $news = News::findOrFail($id);
        $input = $request->all();
        $news->fill($input)->save();
        return redirect()->route('news.index')->with('msg-success','successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = User::findOrFail($id);
        $news->delete();
        return redirect()->route('news.index')->with('msg-success','successfully Removed.');
    }
}
