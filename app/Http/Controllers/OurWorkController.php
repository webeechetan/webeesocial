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
        // selecting all categories
        $categories = Category::all();

        // pushing previus selected category in an array from categories relation
        $old_categories = array();
        foreach($ourWork->categories as $cat){
            array_push($old_categories,$cat->id);
        }

        return view('admin.our-works.edit',compact('categories','ourWork','old_categories'));
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
        $request ->validate([
            'title' => 'required',
            'description' => 'required',
            'thumbnail' => 'required',
        ]);

        $ourWork->title = $request->title;
        $ourWork->slug = $request->slug;
        $ourWork->thumbnail = $request->thumbnail;
        $ourWork->description = $request->description;
        $ourWork->short_description = $request->short_description;
        $ourWork->meta_title = $request->meta_title;
        $ourWork->meta_description = $request->meta_description;
        $ourWork->og_title = $request->og_title;
        $ourWork->og_image = $request->og_image;

        if($ourWork->save()){
            $ourWork->categories()->sync($request->categories);
            $this->alert('success','Ourwork Updated','success');
            return redirect()->route('our-work.index');
        } 
        $this->alert('error','Something went wrong','danger');
        return redirect()->back();
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OurWork  $ourWork
     * @return \Illuminate\Http\Response
     */
    public function destroy(OurWork $ourWork)
    {
        if($ourWork->delete()){
            $this->alert('success','Our work Deleted successfully','success');
            return redirect()->route('our-works.index');

        }else{
            $this->alert('error','Something went wrong','danger');
            return redirect()->back();  
        }
    }
}
