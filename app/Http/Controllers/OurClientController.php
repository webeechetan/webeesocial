<?php

namespace App\Http\Controllers;

use App\Models\OurClient;
use Illuminate\Http\Request;

class OurClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = OurClient::all();
        return view('admin.our-clients.index',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.our-clients.create');
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
            'image' => 'required|mimes:jpeg,png,jpg|max:1024',
        ]);
        $client = new OurClient();
        $image = $request->file('image');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('images/our-clients'), $imageName);
        $client->image = $imageName;
        $client->image_alt = $request->image_alt;
        if($client->save()){
            $this->alert('success', 'Client Added Successfully', 'success');
            return redirect()->route('our-clients.index');
        }
        $this->alert('error', 'Something Went Wrong', 'error');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OurClient  $ourClient
     * @return \Illuminate\Http\Response
     */
    public function show(OurClient $ourClient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OurClient  $ourClient
     * @return \Illuminate\Http\Response
     */
    public function edit(OurClient $ourClient)
    {
        return view('admin.our-clients.edit',compact('ourClient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OurClient  $ourClient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OurClient $ourClient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OurClient  $ourClient
     * @return \Illuminate\Http\Response
     */
    public function destroy(OurClient $ourClient)
    {
        //
    }
}