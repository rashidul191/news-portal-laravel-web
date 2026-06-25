<?php

namespace App\Http\Controllers;

use App\Models\AddsManage;
use App\Models\News;
use App\Models\VideoManage;
use App\Models\Category;
use App\Models\EPaper;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data['adds'] = AddsManage::orderBy('id', 'asc')->limit(4)->get();
        $data['addss'] = AddsManage::orderBy('id', 'asc')->skip(4)->take(4)->get();
        $data['addsss'] = AddsManage::orderBy('id', 'asc')->skip(6)->take(2)->get();
        $data['adds9'] = AddsManage::where('id', 9)->first();

        $data['video'] = VideoManage::where('id', 1)->first();

        $data['newsLead'] = News::where('featherPost', 'Yes')
            ->whereNotNull('postImage')->orderByDesc('id', 'desc')
            ->limit(1)->first();
        $data['slide'] = News::where('featherPost', 'Yes')
            ->whereNotNull('postImage')->orderByDesc('id', 'desc')->skip(1)
            ->limit(4)->get();


        $data['featherPost1'] = News::where('treandingPost', 'Yes')->orderBy('id', 'desc')->limit(9)->get();

        $data['newsLatest'] = News::orderBy('id', 'desc')->limit(11)->get();
        $data['newsPopular'] = News::orderBy('views', 'desc')->limit(11)->get();

        $categories = Category::where('status', 0)
            ->with([
                'news' => function ($query) {
                    $query->latest();
                }
            ])
            ->get();
        $ePaper = EPaper::orderBy('id', 'desc')->first();

        return view('fontend.index', compact('data', 'ePaper', 'categories'));
    }

    public function Category($id)
    {
        $category = Category::where('id', $id)->first();
        $news = News::where('category', $id)->orderBy('id', 'desc')->paginate(10);
        $data = News::orderBy('id', 'desc')->limit(50)->get();
        return view('fontend.category', compact('category', 'news', 'data'));
    }
    public function News($id)
    {
        $news = News::where('id', $id)->first();
        $news->increment('views');
        $data = News::orderBy('id', 'desc')->limit(50)->get();
        return view('fontend.details', compact('news', 'data'));
    }
    public function Archive()
    {
        $news = News::orderBy('id', 'desc')->paginate(10);
        $data = News::orderBy('id', 'desc')->limit(50)->get();
        return view('fontend.archive', compact('news', 'data'));
    }

    public function Epaper($id)
    {
        $ePaper = EPaper::orderBy('id', 'desc')->first();
        $data = EPaper::orderBy('id', 'desc')->limit(8)->get();
        $paper = EPaper::where('id', $id)->first();
        return view('fontend.epaper', compact('ePaper', 'data', 'paper'));
    }

}
