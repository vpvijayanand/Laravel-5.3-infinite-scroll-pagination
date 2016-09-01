<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;

use App\Http\Requests;

class BlogController extends Controller
{
    public function myBlog(Request $request)
    {
        $blogs = Blog::paginate(10);
        if ($request->ajax()) {
            $view = view('data', compact('blogs'))->render();
            return response()->json(['html' => $view]);

        }
        return view('my-blog', compact('blogs'));
    }
}
