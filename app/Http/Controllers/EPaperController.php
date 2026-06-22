<?php

namespace App\Http\Controllers;

use App\Models\EPaper;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class EPaperController extends Controller
{

    public function index()
    {
        $ePaper = EPaper::orderBy('id','desc')->get();
        return view('admin.Epaper.index', compact('ePaper'));
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $image = $request->image_name;
        $data =
        [
            'pageno'=>$request->pageno,
        ];
        if ($image)
        {
            $imgtext = 'eP'. time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('upload/'), $imgtext);
            $data['image_name'] = $imgtext;
        }
        EPaper::create($data);
        Toastr::success('Added successfully!');
        return redirect()->back();
    }
    public function show(EPaper $ePaper)
    {
        //
    }
    public function edit(EPaper $ePaper)
    {
        //
    }
    public function update(Request $request, EPaper $ePaper)
    {
        //
    }
    public function destroy($id)
    {
        $ePaper = EPaper::find($id);
        $imageDB = $ePaper->image_name;
        if($imageDB){
            unlink(public_path('upload/').$imageDB);
        }
        $ePaper->delete();
        Toastr::success('Delete successfully!');
        return redirect('epaper/manage');
    }
}
