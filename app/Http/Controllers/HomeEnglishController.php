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


        $data['featherPost1'] = EnglishNews::where('treandingPost', 'Yes')->orderBy('id', 'desc')->limit(18)->get();

        $data['newsLatest'] = EnglishNews::orderBy('id', 'desc')->limit(13)->get();
        $data['newsPopular'] = EnglishNews::orderBy('views', 'desc')->limit(13)->get();


        $cat['cat2'] = Category::where('id', 2)->first();
        $news['cat2'] = EnglishNews::where('category', $cat['cat2']->id)->orderBy('id', 'desc')->limit(9)->get();
        $news['cat2Title'] = EnglishNews::where('category', $cat['cat2']->id)->orderBy('id', 'desc')->skip(1)->limit(4)->get();

        $cat['cat3'] = Category::where('id', 3)->first();
        $news['cat3'] = EnglishNews::where('category', $cat['cat3']->id)->orderBy('id', 'desc')->limit(9)->get();
        $news['cat3Title'] = EnglishNews::where('category', $cat['cat3']->id)->orderBy('id', 'desc')->skip(1)->limit(4)->get();

        $cat['cat4'] = Category::where('id', 4)->first();
        $news['cat4'] = EnglishNews::where('category', $cat['cat4']->id)->orderBy('id', 'desc')->limit(9)->get();
        $news['cat4Title'] = EnglishNews::where('category', $cat['cat4']->id)->orderBy('id', 'desc')->skip(1)->limit(4)->get();

        // $cat['cat5'] = Category::where('id', 5)->first();
        // $news['cat5'] = EnglishNews::where('category',  $cat['cat5']->id)->orderBy('id','desc')->limit(1)->first();
        // $news['cat5Title'] = EnglishNews::where('category',  $cat['cat5']->id)->orderBy('id','desc')->skip(1)->limit(4)->get();

        $cat['cat6'] = Category::where('id', 6)->first();
        $news['cat6'] = EnglishNews::where('category', $cat['cat6']->id)->orderBy('id', 'desc')->limit(9)->get();
        $news['cat6Title'] = EnglishNews::where('category', $cat['cat6']->id)->orderBy('id', 'desc')->skip(1)->limit(5)->get();

        // $cat['cat7'] = Category::where('id', 7)->first();
        // $news['cat7'] = EnglishNews::where('category',  $cat['cat7']->id)->orderBy('id','desc')->limit(1)->first();
        // $news['cat7Title'] = EnglishNews::where('category',  $cat['cat7']->id)->orderBy('id','desc')->skip(1)->limit(5)->get();

        $cat['cat8'] = Category::where('id', 8)->first();
        $news['cat8'] = EnglishNews::where('category', $cat['cat8']->id)->orderBy('id', 'desc')->limit(9)->get();
        $news['cat8Title'] = EnglishNews::where('category', $cat['cat8']->id)->orderBy('id', 'desc')->skip(1)->limit(5)->get();

        // $cat['cat9'] = Category::where('id', 9)->first();
        // $news['cat9'] = EnglishNews::where('category',  $cat['cat9']->id)->orderBy('id','desc')->limit(1)->first();
        // $news['cat9Title'] = EnglishNews::where('category',  $cat['cat9']->id)->orderBy('id','desc')->skip(1)->limit(3)->get();

        $cat['cat10'] = Category::where('id', 10)->first();
        $news['cat10'] = EnglishNews::where('category', $cat['cat10']->id)->orderBy('id', 'desc')->limit(9)->get();
        $news['cat10Title'] = EnglishNews::where('category', $cat['cat10']->id)->orderBy('id', 'desc')->skip(1)->limit(4)->get();

        $cat['cat11'] = Category::where('id', 11)->first();
        $news['cat11'] = EnglishNews::where('category', $cat['cat11']->id)->orderBy('id', 'desc')->limit(9)->get();
        $news['cat11Title'] = EnglishNews::where('category', $cat['cat11']->id)->orderBy('id', 'desc')->skip(1)->limit(5)->get();

        $cat['cat12'] = Category::where('id', 12)->first();
        $news['cat12'] = EnglishNews::where('category', $cat['cat12']->id)->orderBy('id', 'desc')->limit(9)->get();
        $news['cat12Title'] = EnglishNews::where('category', $cat['cat12']->id)->orderBy('id', 'desc')->skip(1)->limit(5)->get();

        $cat['cat13'] = Category::where('id', 13)->first();
        $news['cat13'] = EnglishNews::where('category', $cat['cat13']->id)->orderBy('id', 'desc')->limit(9)->get();
        $news['cat13Title'] = EnglishNews::where('category', $cat['cat13']->id)->orderBy('id', 'desc')->skip(1)->limit(2)->get();

        $cat['cat14'] = Category::where('id', 14)->first();
        $news['cat14'] = EnglishNews::where('category', $cat['cat14']->id)->orderBy('id', 'desc')->limit(9)->get();
        $news['cat14Title'] = EnglishNews::where('category', $cat['cat14']->id)->orderBy('id', 'desc')->skip(1)->limit(2)->get();

        $cat['cat15'] = Category::where('id', 15)->first();
        $news['cat15'] = EnglishNews::where('category', $cat['cat15']->id)->orderBy('id', 'desc')->limit(9)->get();
        $news['cat15Title'] = EnglishNews::where('category', $cat['cat15']->id)->orderBy('id', 'desc')->skip(1)->limit(2)->get();

        $cat['cat16'] = Category::where('id', 16)->first();
        $news['cat16'] = EnglishNews::where('category', $cat['cat16']->id)->orderBy('id', 'desc')->limit(9)->get();
        $news['cat16Title'] = EnglishNews::where('category', $cat['cat16']->id)->orderBy('id', 'desc')->skip(1)->limit(2)->get();

        $cat['cat17'] = Category::where('id', 17)->first();
        $news['cat17'] = EnglishNews::where('category', $cat['cat17']->id)->orderBy('id', 'desc')->limit(9)->get();
        $news['cat17Title'] = EnglishNews::where('category', $cat['cat17']->id)->orderBy('id', 'desc')->skip(1)->limit(2)->get();

        $cat['cat18'] = Category::where('id', 18)->first();
        $news['cat18'] = EnglishNews::where('category', $cat['cat18']->id)->orderBy('id', 'desc')->limit(9)->get();
        $news['cat18Title'] = EnglishNews::where('category', $cat['cat18']->id)->orderBy('id', 'desc')->skip(1)->limit(9)->get();

        // $cat['cat19'] = Category::where('id', 19)->first();
        // $news['cat19'] = EnglishNews::where('category',  $cat['cat19']->id)->orderBy('id','desc')->limit(1)->first();
        // $news['cat19Title'] = EnglishNews::where('category',  $cat['cat19']->id)->orderBy('id','desc')->skip(1)->limit(6)->get();

        $cat['cat20'] = Category::where('id', 20)->first();
        $news['cat20'] = EnglishNews::where('category', $cat['cat20']->id)->orderBy('id', 'desc')->limit(9)->get();
        $news['cat20Title'] = EnglishNews::where('category', $cat['cat20']->id)->orderBy('id', 'desc')->skip(1)->limit(4)->get();

        $cat['cat21'] = Category::where('id', 21)->first();
        $news['cat21'] = EnglishNews::where('category', $cat['cat21']->id)->orderBy('id', 'desc')->limit(9)->get();
        $news['cat21Title'] = EnglishNews::where('category', $cat['cat21']->id)->orderBy('id', 'desc')->skip(1)->limit(1)->get();

        $cat['cat22'] = Category::where('id', 22)->first();
        $news['cat22'] = EnglishNews::where('category', $cat['cat22']->id)->orderBy('id', 'desc')->limit(9)->get();
        $news['cat22Title'] = EnglishNews::where('category', $cat['cat22']->id)->orderBy('id', 'desc')->get();

        $cat['cat23'] = Category::where('id', 23)->first();
        $news['cat23'] = EnglishNews::where('category', $cat['cat23']->id)->orderBy('id', 'desc')->limit(9)->get();
        $news['cat23Title'] = EnglishNews::where('category', $cat['cat23']->id)->orderBy('id', 'desc')->skip(1)->limit(1)->get();

        $cat['cat24'] = Category::where('id', 24)->first();
        $news['cat24'] = EnglishNews::where('category', $cat['cat24']->id)->orderBy('id', 'desc')->limit(9)->get();
        $news['cat24Title'] = EnglishNews::where('category', $cat['cat24']->id)->orderBy('id', 'desc')->skip(1)->limit(1)->get();

        $cat['cat25'] = Category::where('id', 25)->first();
        $news['cat25'] = EnglishNews::where('category', $cat['cat25']->id)->orderBy('id', 'desc')->limit(9)->get();
        $news['cat25Title'] = EnglishNews::where('category', $cat['cat25']->id)->orderBy('id', 'desc')->skip(1)->limit(1)->get();

        $cat['cat26'] = Category::where('id', 26)->first();
        $news['cat26'] = EnglishNews::where('category', $cat['cat26']->id)->orderBy('id', 'desc')->limit(9)->get();
        $news['cat26Title'] = EnglishNews::where('category', $cat['cat26']->id)->orderBy('id', 'desc')->skip(1)->limit(2)->get();

        $cat['cat27'] = Category::where('id', 27)->first();
        $news['cat27'] = EnglishNews::where('category', $cat['cat27']->id)->orderBy('id', 'desc')->limit(9)->get();
        $news['cat27Title'] = EnglishNews::where('category', $cat['cat27']->id)->orderBy('id', 'desc')->skip(1)->limit(2)->get();

        // $cat['cat29'] = Category::where('id', 29)->first();
        // $news['cat29'] = EnglishNews::where('category',  $cat['cat29']->id)->orderBy('id','desc')->limit(1)->first();
        // $news['cat29Title'] = EnglishNews::where('category',  $cat['cat29']->id)->orderBy('id','desc')->skip(1)->limit(2)->get();

        $cat['cat30'] = Category::where('id', 30)->first();
        $news['cat30'] = EnglishNews::where('category', $cat['cat30']->id)->orderBy('id', 'desc')->limit(9)->get();
        $news['cat30Title'] = EnglishNews::where('category', $cat['cat30']->id)->orderBy('id', 'desc')->skip(1)->limit(2)->get();

        $cat['cat31'] = Category::where('id', 31)->first();
        $news['cat31'] = EnglishNews::where('category', $cat['cat31']->id)->orderBy('id', 'desc')->limit(9)->get();
        $news['cat31Title'] = EnglishNews::where('category', $cat['cat31']->id)->orderBy('id', 'desc')->skip(1)->limit(4)->get();

        $cat['cat32'] = Category::where('id', 32)->first();
        $news['cat32'] = EnglishNews::where('category', $cat['cat32']->id)->orderBy('id', 'desc')->limit(9)->get();
        $news['cat32Title'] = EnglishNews::where('category', $cat['cat32']->id)->orderBy('id', 'desc')->skip(1)->limit(4)->get();

        $cat['cat33'] = Category::where('id', 33)->first();
        $news['cat33'] = EnglishNews::where('category', $cat['cat33']->id)->orderBy('id', 'desc')->limit(9)->get();
        $news['cat33Title'] = EnglishNews::where('category', $cat['cat33']->id)->orderBy('id', 'desc')->skip(1)->limit(2)->get();

        $cat['cat36'] = Category::where('id', 36)->first();
        $news['cat36'] = EnglishNews::where('category', $cat['cat36']->id)->orderBy('id', 'desc')->limit(9)->get();
        $news['cat36Title'] = EnglishNews::where('category', $cat['cat36']->id)->orderBy('id', 'desc')->skip(1)->limit(9)->get();

        $cat['cat37'] = Category::where('id', 37)->first();
        $news['cat37'] = EnglishNews::where('category', $cat['cat37']->id)->orderBy('id', 'desc')->limit(9)->get();
        $news['cat37Title'] = EnglishNews::where('category', $cat['cat37']->id)->orderBy('id', 'desc')->skip(1)->limit(1)->get();

        $cat['cat38'] = Category::where('id', 38)->first();
        $news['cat38'] = EnglishNews::where('category', $cat['cat38']->id)->orderBy('id', 'desc')->limit(9)->get();
        $news['cat38Title'] = EnglishNews::where('category', $cat['cat38']->id)->orderBy('id', 'desc')->skip(1)->limit(2)->get();

        $cat['cat39'] = Category::where('id', 39)->first();
        $news['cat39'] = EnglishNews::where('category', $cat['cat39']->id)->orderBy('id', 'desc')->limit(9)->get();
        $news['cat39Title'] = EnglishNews::where('category', $cat['cat39']->id)->orderBy('id', 'desc')->skip(1)->limit(2)->get();

        $cat['cat40'] = Category::where('id', 40)->first();
        $news['cat40'] = EnglishNews::where('category', $cat['cat40']->id)->orderBy('id', 'desc')->limit(9)->get();
        $news['cat40Title'] = EnglishNews::where('category', $cat['cat40']->id)->orderBy('id', 'desc')->skip(1)->limit(2)->get();

        $cat['cat41'] = Category::where('id', 41)->first();
        $news['cat41'] = EnglishNews::where('category', $cat['cat41']->id)->orderBy('id', 'desc')->limit(9)->get();
        $news['cat41Title'] = EnglishNews::where('category', $cat['cat41']->id)->orderBy('id', 'desc')->skip(1)->limit(2)->get();


        $cat['cat42'] = Category::where('id', 42)->first();
        $news['cat42'] = EnglishNews::where('category', $cat['cat42']->id)->orderBy('id', 'desc')->limit(9)->get();
        $news['cat42Title'] = EnglishNews::where('category', $cat['cat42']->id)->orderBy('id', 'desc')->skip(1)->limit(1)->get();

        $cat['cat43'] = Category::where('id', 43)->first();
        $news['cat43'] = EnglishNews::where('category', $cat['cat43']->id)->orderBy('id', 'desc')->limit(9)->get();
        $news['cat43Title'] = EnglishNews::where('category', $cat['cat43']->id)->orderBy('id', 'desc')->skip(1)->limit(6)->get();

        $cat['cat44'] = Category::where('id', 44)->first();
        $news['cat44'] = EnglishNews::where('category', $cat['cat44']->id)->orderBy('id', 'desc')->limit(9)->get();
        $news['cat44Title'] = EnglishNews::where('category', $cat['cat44']->id)->orderBy('id', 'desc')->skip(1)->limit(1)->get();

        $cat['cat45'] = Category::where('id', 45)->first();
        $news['cat45'] = EnglishNews::where('category', $cat['cat45']->id)->orderBy('id', 'desc')->limit(9)->get();
        $news['cat45Title'] = EnglishNews::where('category', $cat['cat45']->id)->orderBy('id', 'desc')->skip(1)->limit(1)->get();

        $cat['cat47'] = Category::where('id', 47)->first();
        $news['cat47'] = EnglishNews::where('category', $cat['cat47']->id)->orderBy('id', 'desc')->limit(9)->get();
        $news['cat47Title'] = EnglishNews::where('category', $cat['cat47']->id)->orderBy('id', 'desc')->skip(1)->limit(1)->get();

        $cat['cat48'] = Category::where('id', 48)->first();
        $news['cat48'] = EnglishNews::where('category', $cat['cat48']->id)->orderBy('id', 'desc')->limit(9)->get();
        $news['cat48Title'] = EnglishNews::where('category', $cat['cat48']->id)->orderBy('id', 'desc')->skip(1)->limit(1)->get();


        $ePaper = EPaper::orderBy('id', 'desc')->first();

        return view('fontendEng.index', compact('data', 'cat', 'news', 'ePaper'));
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
