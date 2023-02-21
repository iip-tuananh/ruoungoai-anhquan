<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\blog\Blog;
use App\models\PageContent;
use Session;

class PageContentController extends Controller
{
    public function detail($slug)
    {
    	$data['pagecontentdetail'] = PageContent::where(['status'=>2, 'language'=>'vi', 'type'=>'ve-chung-toi','slug'=>$slug])->first();
        $data['news'] = Blog::where(['status'=>1, 'home_status'=>1])->orderBy('id', 'desc')->limit(10)->get(['id', 'title', 'slug', 'image']);
    	return view('pageContent',$data);
    }
}
