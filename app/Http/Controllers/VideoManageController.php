<?php

namespace App\Http\Controllers;

use App\Models\VideoManage;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class VideoManageController extends Controller
{
    public function index()
    {
        $videos = VideoManage::latest()->paginate(10);
        return view('admin.Video.index', compact('videos'));
    }
    public function create()
    {

    }
    public function store(Request $request)
    {
        $data =
            [
                'title' => $request->title,
                'embedCode' => $request->embedCode,
            ];
        VideoManage::create($data);
        Toastr::success('Vdieo Add successfully!');
        return redirect()->back();
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
                'title' => $request->title,
                'embedCode' => $request->embedCode,
            ];
        $videoManage->update($data);
        Toastr::success('Update successfully!');
        return redirect()->back();
    }
    public function destroy($id)
    {
        $video = VideoManage::find($id);
        $video->delete();
        Toastr::success('Delete successfully!');
        return redirect('video/manage');
    }
}
