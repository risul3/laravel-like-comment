<?php

namespace risul\LaravelLikeComment\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;

class CommentController extends Controller
{
    /**
     * undocumented function
     *
     * @return void
     * @author 
     **/
    public function index(){
    	return view('laravelLikeComment::like');
    }
}
