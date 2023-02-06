<?php

namespace App\Http\Controllers;

use App\Models\Meta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class WebSiteController extends Controller
{
    public $meta;

    public function __construct()
    {

        $url = Route::current()->uri();

        // 

        $meta = Meta::where('url',$url)->first();

        
        // echo $meta;
        // exit;

        if($meta){
            $this->meta = $meta;
        }else{
            $this->meta = new Meta();
        }
    }
    
    public function viewIndex(){
        //  $meta = $this->meta ;
        //  dd($meta->id);
        return view('frontend.index', ['meta'=>$this->meta]);
    }

    public function viewAbout(){
        
        return view('frontend.about-us', ['meta'=>$this->meta]);
    }

    public function viewGetintouch(){

        return view('frontend.getin-touch', ['meta'=>$this->meta]);
    }

    

    
    public function viewBlog(){

        return view('frontend.blog', ['meta'=> $this->meta]);
    }

    public function viewOurClients(){
    
        return view('frontend.ourclients', ['meta'=> $this->meta]);
    }

    public function viewOurWork(){


        return view('frontend.ourwork', ['meta'=> $this->meta]);
    }


}
