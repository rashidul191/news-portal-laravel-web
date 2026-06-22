<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::orderBy('id','desc')->paginate(10);
        return view('admin.NewsManage.index', compact('news'));
    }
    public function create()
    {
        $category = Category::orderBy('id','asc')->get();
        return view('admin.NewsManage.create', compact('category'));
    }
    public function store(Request $request)
    {
        // Retrieve post image
        $image = $request->postImage;
        $data = [
            'postTitle' => $request->postTitle,
            'postBody' => $request->postBody,
            'category' => $request->category,
            'featherPost' => $request->featherPost,
            'treandingPost' => $request->treandingPost,
            'views' => 0,
            'auther' => $request->auther,
            'tag' => $request->tag,
            'description' => $request->description,
            'postTitle_eng' => $request->postTitle_eng,
            'auther_eng' => $request->auther_eng,
            'postBody_eng' => $request->postBody_eng,
        ];

        // Handle image upload if exists
        if ($image) {
            $imgtext = 'postImg' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload/'), $imgtext);
            $data['postImage'] = $imgtext;
        }

        // Store data in the database
        News::create($data);

        // Success message
        Toastr::success('Added successfully!');
        return redirect('news/manage');
    }

    public function show(News $news)
    {
        //
    }
    public function edit($id)
    {
        $news = News::find($id);
        $category = Category::where('status', 0)->orderBy('id','desc')->get();
        return view('admin.NewsManage.edit', compact('news', 'category'));
    }
    public function update(Request $request, $id)
    {
        $news = News::find($id);
        $image = $request->postImage;
        $data =
        [
            'postTitle'=>$request->postTitle,
            'postBody'=>$request->postBody,
            'category'=>$request->category,
            'featherPost'=>$request->featherPost,
            'treandingPost'=>$request->treandingPost,
            'tag'=>$request->tag,
            'description'=>$request->description,
            'postTitle_eng'=>$request->postTitle_eng,
            'auther_eng'=>$request->auther_eng,
            'postBody_eng'=>$request->postBody_eng,
        ];
        if(!empty($image)){

            $imageImgName = "postImg". time() . '.' .$image->getClientOriginalExtension();
            $image->move(public_path('upload'),$imageImgName);
            $oldimageLink = public_path('upload/'). $news->postImage;
            unlink($oldimageLink);
            $data['postImage'] = $imageImgName;
        }

        $news->update($data);
        Toastr::success('Update successfully!');
        return redirect('news/manage');
    }
    public function destroy($id)
    {
        $news = News::find($id);
        $imageDB = $news->postImage;
        if($imageDB){
            unlink(public_path('upload/').$imageDB);
        }
        $news->delete();
        Toastr::success('Delete successfully!');
        return redirect('news/manage');
    }
}
