<?php

namespace App\Http\Controllers;

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
        $newses = Blog::where('type',2)->get();
        return view('admin.news.index',compact('newses'));
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
            'input_title' => 'required',
            'description' => 'required',
            'slug' => 'required',
        ]);
        
        $blog = new Blog();
        $blog->publish_date = $request->publish_date;
        $blog->slug = $request->slug;
        $blog->title = $request->input_title;
        $blog->short_description = $request->short_description;
        $blog->description = $request->description;
        $blog->meta_title = $request->meta_title;
        $blog->meta_description = $request->meta_description;
        $blog->og_title =  $request->og_title;
        $blog->og_image = $request->og_image;
        $blog->thumbnail = $request->thumbnail;
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
    // public function show(News $news)
    // {
    //     return view('admin.news.show',compact('news'));
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view ('admin.news.edit',['newses' => $blog]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $request -> validate([
            'title' => 'required',
            'description' => 'required',
            'thumbnail' => 'required'
        ]);

        

        $blog->publish_date = $request->publish_date;
        $blog->slug = $request->slug;
        $blog->title = $request->title;
        $blog->short_description = $request->short_description;
        $blog->description = $request->description;
        $blog->meta_title = $request->meta_title;
        $blog->meta_description = $request->meta_description;
        $blog->og_title =  $request->og_title;
        $blog->og_image = $request->og_image;
        $blog->thumbnail = $request->thumbnail;

        if($blog->save()){
            
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
    public function destroy(Blog $blog)
    {
        if($blog->delete()){
            $this->alert('success','News Deleted successfully','success');
            return redirect()->route('news.index');

        }else{
            $this->alert('error','Something went wrong','danger');
            return redirect()->back();  
        }
    }
}
