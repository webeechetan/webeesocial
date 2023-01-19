<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Blog;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = Blog::all();
        return view('admin.news.index',compact('news'));
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $request -> validate([
            'heading' => 'required',
        ]);
        
        $blog = new Blog();
        $blog->publish_date = $request->publish_date;
        $blog->title = $request->heading;
        $blog->short_description = $request->short_description;
        $blog->description = $request->news;
        $blog->type = 2;

        if($blog->save()){
            $this->alert('success','News Added successfully','success');
            return redirect()->route('news.index');
        }
        $this->alert('error','Something went wrong','error');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */ 
    public function show(News $news)
    {
        return view('admin.news.show',compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $news = Blog::find($id);        
        return view ('admin.news.edit',compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $news)
    {

        dd($news);
        
        $news->publish_date = $request->publish_date;
        $news->title = $request->heading;
        $news->short_description = $request->short_description;
        $news->description = $request->description;

        if($news->save()){
            $this->alert('success','News Updated successfully','success');
            return redirect()->route('news.index');
        }
        $this->alert('error','Something went wrong','danger');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blogs , $id)
    {

        $id = Blog::find($id);

        if($id->delete()){
            $this->alert('success','News Deleted successfully','success');
             return redirect()->route('news.index');
        }else{
            $this->alert('error','Something went wrong','danger');
            return redirect()->back(); 
        }
        
        // if($blogs->delete()){
        //     $this->alert('success','News Deleted successfully','success');
        //     return redirect()->route('news.index');

        // }else{
        //     $this->alert('error','Something went wrong','danger');
        //     return redirect()->back();  
        // }
    }
}
