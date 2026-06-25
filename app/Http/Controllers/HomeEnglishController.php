<?php

namespace App\Http\Controllers;

use App\Models\AddsManage;
use App\Models\EnglishNews;
use App\Models\VideoManage;
use App\Models\Category;
use App\Models\EPaper;
use Illuminate\Http\Request;

class HomeEnglishController extends Controller
{
    public function index()
    {
        $data['adds'] = AddsManage::orderBy('id', 'asc')->limit(4)->get();
        $data['addss'] = AddsManage::orderBy('id', 'asc')->skip(4)->take(4)->get();
        $data['addsss'] = AddsManage::orderBy('id', 'asc')->skip(6)->take(2)->get();
        $data['adds9'] = AddsManage::where('id', 9)->first();

        $data['video'] = VideoManage::where('id', 1)->first();

        $data['newsLead'] = EnglishNews::where('featherPost', 'Yes')
            ->whereNotNull('postImage')
            ->orderByDesc('id', 'desc')
            ->limit(1)->first();
        $data['slide'] = EnglishNews::where('featherPost', 'Yes')
            ->whereNotNull('postImage')
            ->orderByDesc('id', 'desc')->skip(1)
            ->limit(4)->get();


        $data['featherPost1'] = EnglishNews::where('treandingPost', 'Yes')->orderBy('id', 'desc')->limit(9)->get();

        $data['newsLatest'] = EnglishNews::orderBy('id', 'desc')->limit(11)->get();
        $data['newsPopular'] = EnglishNews::orderBy('views', 'desc')->limit(11)->get();

        $categories = Category::where('status', 0)
            ->with([
                'englishNews' => function ($query) {
                    $query->latest();
                }
            ])
            ->get();
        $ePaper = EPaper::orderBy('id', 'desc')->first();

        return view('fontendEng.index', compact('data', 'ePaper', 'categories'));
    }
    public function Category($id)
    {
        $category = Category::where('id', $id)->first();
        $news = EnglishNews::where('category', $id)->orderBy('id', 'desc')->paginate(10);
        $data = EnglishNews::orderBy('id', 'desc')->limit(50)->get();
        return view('fontendEng.category', compact('category', 'news', 'data'));
    }
    public function News($id)
    {
        $news = EnglishNews::where('id', $id)->first();
        $news->increment('views');
        $data = EnglishNews::orderBy('id', 'desc')->limit(50)->get();
        return view('fontendEng.details', compact('news', 'data'));
    }
    public function Archive()
    {
        $news = EnglishNews::orderBy('id', 'desc')->paginate(15);
        $data = EnglishNews::orderBy('id', 'desc')->limit(50)->get();
        return view('fontendEng.archive', compact('news', 'data'));
    }
}
