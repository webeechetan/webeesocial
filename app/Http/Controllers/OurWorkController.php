<?php

namespace App\Http\Controllers;

use App\Models\OurWork;
use App\Models\Category;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast;

class OurWorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $works = OurWork::all();
        return view('admin.our-works.index',compact('works'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.our-works.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'slug' => 'required',
        ]);

        $work = new OurWork();
        $work->slug = $request->slug;
        $work->title = $request->title;
        $work->short_description = $request->short_description;
        $work->description = $request->description;
        $work->meta_title = $request->meta_title;
        $work->meta_description = $request->meta_description;
        $work->og_title =  $request->og_title;
        $work->og_image = $request->og_image;
        $work->thumbnail = $request->thumbnail;

        if($work->save()){
            $work->categories()->attach($request->categories);
            $this->alert('success','Added successfully','success');
            return redirect()->route('our-work.index');
        }
        $this->alert('error','Something went wrong','error');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OurWork  $ourWork
     * @return \Illuminate\Http\Response
     */
    public function show(OurWork $ourWork)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OurWork  $ourWork
     * @return \Illuminate\Http\Response
     */
    public function edit(OurWork $ourWork)
    {
        $categories = Category::all();
        return view('admin.our-works.edit',compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OurWork  $ourWork
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OurWork $ourWork)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OurWork  $ourWork
     * @return \Illuminate\Http\Response
     */
    public function destroy(OurWork $ourWork)
    {
        //
    }
}
