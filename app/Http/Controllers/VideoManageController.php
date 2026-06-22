<?php

namespace App\Http\Controllers;

use App\Models\VideoManage;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class VideoManageController extends Controller
{
    public function index()
    {
        $video = VideoManage::where('id',1)->first();
        return view('admin.Video.index', compact('video'));
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }
    public function show(VideoManage $videoManage)
    {
        //
    }
    public function edit(VideoManage $videoManage)
    {
        //
    }
    public function update(Request $request, $id)
    {
        $videoManage = VideoManage::find($id);
    //    return $dd = $request->embedCode;
        // $code = substr($dd, 38, 61);

        $data =
        [
            'title'=>$request->title,
            'embedCode'=>$request->embedCode,
        ];
        $videoManage->update($data);
        Toastr::success('Update successfully!');
        return redirect()->back();
    }
    public function destroy(VideoManage $videoManage)
    {
        //
    }
}
