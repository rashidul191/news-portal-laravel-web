<?php

namespace App\Http\Controllers;

use App\Models\EnglishNews;
use App\Models\Category;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class EnglishNewsController extends Controller
{
    public function index()
    {
        $news = EnglishNews::orderBy('id', 'desc')->paginate(10);
        return view('admin.NewsManageEnglish.index', compact('news'));
    }
    public function create()
    {
        $category = Category::orderBy('id', 'asc')->get();
        return view('admin.NewsManageEnglish.create', compact('category'));
    }
    public function store(Request $request)
    {
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
        ];

        // Handle image upload if exists
        if ($image) {
            $imgtext = 'epostImg' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload/'), $imgtext);
            $data['postImage'] = $imgtext;
        }

        // Store data in the database
        EnglishNews::create($data);

        // Success message
        Toastr::success('Added successfully!');
        return redirect('english_news_manage');
    }
    public function show(EnglishNews $englishNews)
    {
        //
    }
    public function edit($id)
    {
        $news = EnglishNews::find($id);
        $category = Category::where('status', 0)->orderBy('id', 'desc')->get();
        return view('admin.NewsManageEnglish.edit', compact('news', 'category'));
    }
    public function update(Request $request, $id)
    {
        $news = EnglishNews::find($id);

        if (!$news) {
            Toastr::error('News not found!');
            return redirect('english_news_manage');
        }

        $data = [
            'postTitle' => $request->postTitle,
            'postBody' => $request->postBody,
            'category' => $request->category,
            'featherPost' => $request->featherPost,
            'treandingPost' => $request->treandingPost,
            'tag' => $request->tag,
            'description' => $request->description,
        ];

        $image = $request->postImage;

        if (!empty($image)) {

            // new image name
            $imageImgName = "epostImg" . time() . '.' . $image->getClientOriginalExtension();

            // upload new image
            $image->move(public_path('upload'), $imageImgName);

            // old image path
            $oldImage = $news->postImage;
            $oldImagePath = public_path('upload/' . $oldImage);

            // ✅ SAFE unlink (no error)
            if (!empty($oldImage) && file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }

            $data['postImage'] = $imageImgName;
        }

        $news->update($data);

        Toastr::success('Update successfully!');
        return redirect('english_news_manage');
    }
    public function destroy($id)
    {
        $news = EnglishNews::find($id);
        $imageDB = $news->postImage;
        if ($imageDB) {
            unlink(public_path('upload/') . $imageDB);
        }
        $news->delete();
        Toastr::success('Delete successfully!');
        return redirect('english_news_manage');
    }
}
