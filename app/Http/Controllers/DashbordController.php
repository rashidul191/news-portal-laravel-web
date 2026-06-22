<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class DashbordController extends Controller
{
    public function index()
    {
        $news = News::orderBy('id','desc')->get();
        return view('admin.dashboard', compact('news'));
    }

}
