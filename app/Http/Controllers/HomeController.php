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


        $data['featherPost1'] = News::where('treandingPost', 'Yes')->orderBy('id', 'desc')->limit(18)->get();

        $data['newsLatest'] = News::orderBy('id', 'desc')->limit(14)->get();
        $data['newsPopular'] = News::orderBy('views', 'desc')->limit(14)->get();

        // $cat['cat1'] = Category::where('id', 1)->first();
        // $news['cat1'] = News::where('category',  $cat['cat1']->id)->orderBy('id','desc')->limit(1)->first();
        // $news['cat1Title'] = News::where('category',  $cat['cat1']->id)->orderBy('id','desc')->skip(1)->limit(4)->get();

        $cat['cat2'] = Category::where('id', 2)->first();
        $news['cat2'] = News::where('category', $cat['cat2']->id)->orderBy('id', 'desc')->limit(9)->get();
        // dd($news['cat2']);
        $news['cat2Title'] = News::where('category', $cat['cat2']->id)->orderBy('id', 'desc')->skip(1)->limit(4)->get();

        $cat['cat3'] = Category::where('id', 3)->first();
        $news['cat3'] = News::where('category', $cat['cat3']->id)->orderBy('id', 'desc')->limit(9)->get();
        $news['cat3Title'] = News::where('category', $cat['cat3']->id)->orderBy('id', 'desc')->skip(1)->limit(4)->get();

        $cat['cat4'] = Category::where('id', 4)->first();
        $news['cat4'] = News::where('category', $cat['cat4']->id)->orderBy('id', 'desc')->limit(9)->get();
        $news['cat4Title'] = News::where('category', $cat['cat4']->id)->orderBy('id', 'desc')->skip(1)->limit(4)->get();

        // $cat['cat5'] = Category::where('id', 5)->first();
        // $news['cat5'] = News::where('category',  $cat['cat5']->id)->orderBy('id','desc')->limit(9)->get();
        // $news['cat5Title'] = News::where('category',  $cat['cat5']->id)->orderBy('id','desc')->skip(1)->limit(4)->get();

        $cat['cat6'] = Category::where('id', 6)->first();
        $news['cat6'] = News::where('category', $cat['cat6']->id)->orderBy('id', 'desc')->limit(9)->get();
        $news['cat6Title'] = News::where('category', $cat['cat6']->id)->orderBy('id', 'desc')->skip(1)->limit(5)->get();

        // $cat['cat7'] = Category::where('id', 7)->first();
        // $news['cat7'] = News::where('category',  $cat['cat7']->id)->orderBy('id','desc')->limit(1)->first();
        // $news['cat7Title'] = News::where('category',  $cat['cat7']->id)->orderBy('id','desc')->skip(1)->limit(5)->get();

        $cat['cat8'] = Category::where('id', 8)->first();
        $news['cat8'] = News::where('category', $cat['cat8']->id)->orderBy('id', 'desc')->limit(9)->get();
        $news['cat8Title'] = News::where('category', $cat['cat8']->id)->orderBy('id', 'desc')->skip(1)->limit(5)->get();

        // $cat['cat9'] = Category::where('id', 9)->first();
        // $news['cat9'] = News::where('category',  $cat['cat9']->id)->orderBy('id','desc')->limit(1)->first();
        // $news['cat9Title'] = News::where('category',  $cat['cat9']->id)->orderBy('id','desc')->skip(1)->limit(3)->get();

        $cat['cat10'] = Category::where('id', 10)->first();
        $news['cat10'] = News::where('category', $cat['cat10']->id)->orderBy('id', 'desc')->limit(9)->get();
        $news['cat10Title'] = News::where('category', $cat['cat10']->id)->orderBy('id', 'desc')->skip(1)->limit(4)->get();

        $cat['cat11'] = Category::where('id', 11)->first();
        $news['cat11'] = News::where('category', $cat['cat11']->id)->orderBy('id', 'desc')->limit(9)->get();
        $news['cat11Title'] = News::where('category', $cat['cat11']->id)->orderBy('id', 'desc')->skip(1)->limit(5)->get();

        $cat['cat12'] = Category::where('id', 12)->first();
        $news['cat12'] = News::where('category', $cat['cat12']->id)->orderBy('id', 'desc')->limit(9)->get();
        $news['cat12Title'] = News::where('category', $cat['cat12']->id)->orderBy('id', 'desc')->skip(1)->limit(5)->get();

        $cat['cat13'] = Category::where('id', 13)->first();
        $news['cat13'] = News::where('category', $cat['cat13']->id)->orderBy('id', 'desc')->limit(9)->get();
        $news['cat13Title'] = News::where('category', $cat['cat13']->id)->orderBy('id', 'desc')->skip(1)->limit(2)->get();

        $cat['cat14'] = Category::where('id', 14)->first();
        $news['cat14'] = News::where('category', $cat['cat14']->id)->orderBy('id', 'desc')->limit(9)->get();
        $news['cat14Title'] = News::where('category', $cat['cat14']->id)->orderBy('id', 'desc')->skip(1)->limit(2)->get();

        $cat['cat15'] = Category::where('id', 15)->first();
        $news['cat15'] = News::where('category', $cat['cat15']->id)->orderBy('id', 'desc')->limit(9)->get();
        $news['cat15Title'] = News::where('category', $cat['cat15']->id)->orderBy('id', 'desc')->skip(1)->limit(2)->get();

        $cat['cat16'] = Category::where('id', 16)->first();
        $news['cat16'] = News::where('category', $cat['cat16']->id)->orderBy('id', 'desc')->limit(9)->get();
        $news['cat16Title'] = News::where('category', $cat['cat16']->id)->orderBy('id', 'desc')->skip(1)->limit(2)->get();

        $cat['cat17'] = Category::where('id', 17)->first();
        $news['cat17'] = News::where('category', $cat['cat17']->id)->orderBy('id', 'desc')->limit(9)->get();
        $news['cat17Title'] = News::where('category', $cat['cat17']->id)->orderBy('id', 'desc')->skip(1)->limit(2)->get();

        $cat['cat18'] = Category::where('id', 18)->first();
        $news['cat18'] = News::where('category', $cat['cat18']->id)->orderBy('id', 'desc')->limit(9)->get();
        $news['cat18Title'] = News::where('category', $cat['cat18']->id)->orderBy('id', 'desc')->skip(1)->limit(9)->get();

        // $cat['cat19'] = Category::where('id', 19)->first();
        // $news['cat19'] = News::where('category',  $cat['cat19']->id)->orderBy('id','desc')->limit(1)->first();
        // $news['cat19Title'] = News::where('category',  $cat['cat19']->id)->orderBy('id','desc')->skip(1)->limit(6)->get();

        $cat['cat20'] = Category::where('id', 20)->first();
        $news['cat20'] = News::where('category', $cat['cat20']->id)->orderBy('id', 'desc')->limit(9)->get();
        $news['cat20Title'] = News::where('category', $cat['cat20']->id)->orderBy('id', 'desc')->skip(1)->limit(4)->get();

        $cat['cat21'] = Category::where('id', 21)->first();
        $news['cat21'] = News::where('category', $cat['cat21']->id)->orderBy('id', 'desc')->limit(9)->get();
        $news['cat21Title'] = News::where('category', $cat['cat21']->id)->orderBy('id', 'desc')->skip(1)->limit(1)->get();

        $cat['cat22'] = Category::where('id', 22)->first();
        $news['cat22'] = News::where('category', $cat['cat22']->id)->orderBy('id', 'desc')->limit(9)->get();
        $news['cat22Title'] = News::where('category', $cat['cat22']->id)->orderBy('id', 'desc')->get();

        $cat['cat23'] = Category::where('id', 23)->first();
        $news['cat23'] = News::where('category', $cat['cat23']->id)->orderBy('id', 'desc')->limit(9)->get();
        $news['cat23Title'] = News::where('category', $cat['cat23']->id)->orderBy('id', 'desc')->skip(1)->limit(1)->get();

        $cat['cat24'] = Category::where('id', 24)->first();
        $news['cat24'] = News::where('category', $cat['cat24']->id)->orderBy('id', 'desc')->limit(9)->get();
        $news['cat24Title'] = News::where('category', $cat['cat24']->id)->orderBy('id', 'desc')->skip(1)->limit(1)->get();

        $cat['cat25'] = Category::where('id', 25)->first();
        $news['cat25'] = News::where('category', $cat['cat25']->id)->orderBy('id', 'desc')->limit(9)->get();
        $news['cat25Title'] = News::where('category', $cat['cat25']->id)->orderBy('id', 'desc')->skip(1)->limit(1)->get();

        $cat['cat26'] = Category::where('id', 26)->first();
        $news['cat26'] = News::where('category', $cat['cat26']->id)->orderBy('id', 'desc')->limit(9)->get();
        $news['cat26Title'] = News::where('category', $cat['cat26']->id)->orderBy('id', 'desc')->skip(1)->limit(2)->get();

        $cat['cat27'] = Category::where('id', 27)->first();
        $news['cat27'] = News::where('category', $cat['cat27']->id)->orderBy('id', 'desc')->limit(9)->get();
        $news['cat27Title'] = News::where('category', $cat['cat27']->id)->orderBy('id', 'desc')->skip(1)->limit(2)->get();

        // $cat['cat29'] = Category::where('id', 29)->first();
        // $news['cat29'] = News::where('category',  $cat['cat29']->id)->orderBy('id','desc')->limit(1)->first();
        // $news['cat29Title'] = News::where('category',  $cat['cat29']->id)->orderBy('id','desc')->skip(1)->limit(2)->get();

        $cat['cat30'] = Category::where('id', 30)->first();
        $news['cat30'] = News::where('category', $cat['cat30']->id)->orderBy('id', 'desc')->limit(9)->get();
        $news['cat30Title'] = News::where('category', $cat['cat30']->id)->orderBy('id', 'desc')->skip(1)->limit(2)->get();

        $cat['cat31'] = Category::where('id', 31)->first();
        $news['cat31'] = News::where('category', $cat['cat31']->id)->orderBy('id', 'desc')->limit(9)->get();
        $news['cat31Title'] = News::where('category', $cat['cat31']->id)->orderBy('id', 'desc')->skip(1)->limit(4)->get();

        $cat['cat32'] = Category::where('id', 32)->first();
        $news['cat32'] = News::where('category', $cat['cat32']->id)->orderBy('id', 'desc')->limit(9)->get();
        $news['cat32Title'] = News::where('category', $cat['cat32']->id)->orderBy('id', 'desc')->skip(1)->limit(4)->get();

        $cat['cat33'] = Category::where('id', 33)->first();
        $news['cat33'] = News::where('category', $cat['cat33']->id)->orderBy('id', 'desc')->limit(9)->get();
        $news['cat33Title'] = News::where('category', $cat['cat33']->id)->orderBy('id', 'desc')->skip(1)->limit(2)->get();

        $cat['cat36'] = Category::where('id', 36)->first();
        $news['cat36'] = News::where('category', $cat['cat36']->id)->orderBy('id', 'desc')->limit(9)->get();
        $news['cat36Title'] = News::where('category', $cat['cat36']->id)->orderBy('id', 'desc')->skip(1)->limit(9)->get();

        $cat['cat37'] = Category::where('id', 37)->first();
        $news['cat37'] = News::where('category', $cat['cat37']->id)->orderBy('id', 'desc')->limit(9)->get();
        $news['cat37Title'] = News::where('category', $cat['cat37']->id)->orderBy('id', 'desc')->skip(1)->limit(1)->get();

        $cat['cat38'] = Category::where('id', 38)->first();
        $news['cat38'] = News::where('category', $cat['cat38']->id)->orderBy('id', 'desc')->limit(9)->get();
        $news['cat38Title'] = News::where('category', $cat['cat38']->id)->orderBy('id', 'desc')->skip(1)->limit(2)->get();

        $cat['cat39'] = Category::where('id', 39)->first();
        $news['cat39'] = News::where('category', $cat['cat39']->id)->orderBy('id', 'desc')->limit(9)->get();
        $news['cat39Title'] = News::where('category', $cat['cat39']->id)->orderBy('id', 'desc')->skip(1)->limit(2)->get();

        $cat['cat40'] = Category::where('id', 40)->first();
        $news['cat40'] = News::where('category', $cat['cat40']->id)->orderBy('id', 'desc')->limit(9)->get();
        $news['cat40Title'] = News::where('category', $cat['cat40']->id)->orderBy('id', 'desc')->skip(1)->limit(2)->get();

        $cat['cat41'] = Category::where('id', 41)->first();
        $news['cat41'] = News::where('category', $cat['cat41']->id)->orderBy('id', 'desc')->limit(9)->get();
        $news['cat41Title'] = News::where('category', $cat['cat41']->id)->orderBy('id', 'desc')->skip(1)->limit(2)->get();


        $cat['cat42'] = Category::where('id', 42)->first();
        $news['cat42'] = News::where('category', $cat['cat42']->id)->orderBy('id', 'desc')->limit(9)->get();
        $news['cat42Title'] = News::where('category', $cat['cat42']->id)->orderBy('id', 'desc')->skip(1)->limit(1)->get();

        $cat['cat43'] = Category::where('id', 43)->first();
        $news['cat43'] = News::where('category', $cat['cat43']->id)->orderBy('id', 'desc')->limit(9)->get();
        $news['cat43Title'] = News::where('category', $cat['cat43']->id)->orderBy('id', 'desc')->skip(1)->limit(3)->get();

        $cat['cat44'] = Category::where('id', 44)->first();
        $news['cat44'] = News::where('category', $cat['cat44']->id)->orderBy('id', 'desc')->limit(9)->get();
        $news['cat44Title'] = News::where('category', $cat['cat44']->id)->orderBy('id', 'desc')->skip(1)->limit(1)->get();

        $cat['cat45'] = Category::where('id', 45)->first();
        $news['cat45'] = News::where('category', $cat['cat45']->id)->orderBy('id', 'desc')->limit(9)->get();
        $news['cat45Title'] = News::where('category', $cat['cat45']->id)->orderBy('id', 'desc')->skip(1)->limit(1)->get();

        $cat['cat47'] = Category::where('id', 47)->first();
        $news['cat47'] = News::where('category', $cat['cat47']->id)->orderBy('id', 'desc')->limit(9)->get();
        $news['cat47Title'] = News::where('category', $cat['cat47']->id)->orderBy('id', 'desc')->skip(1)->limit(1)->get();

        $cat['cat48'] = Category::where('id', 48)->first();
        $news['cat48'] = News::where('category', $cat['cat48']->id)->orderBy('id', 'desc')->limit(9)->get();
        $news['cat48Title'] = News::where('category', $cat['cat48']->id)->orderBy('id', 'desc')->skip(1)->limit(1)->get();

        $ePaper = EPaper::orderBy('id', 'desc')->first();

        return view('fontend.index', compact('data', 'cat', 'news', 'ePaper'));
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
