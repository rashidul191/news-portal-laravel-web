<?php

namespace App\Http\Controllers;

use App\Models\AddsManage;
use Illuminate\Http\Request;

class AddsManageController extends Controller
{
    public function index()
    {
        $adds = AddsManage::orderBy('id','asc')->get();
        return view('admin.AddsManage.index', compact('adds'));
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $image = $request->addsImg;
        $data =
        [
            'adds_link'=>$request->adds_link,
        ];
        if ($image)
        {
            $imgtext = 'adds'. time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('upload/'), $imgtext);
            $data['addsImg'] = $imgtext;
        }
        AddsManage::create($data);
        return redirect()->back();
    }
    public function show(AddsManage $addsManage)
    {
        //
    }
    public function edit($id)
    {
        $addsManage = AddsManage::find($id);
        return view('admin.AddsManage.edit', compact('addsManage'));
    }
    public function update(Request $request, $id)
    {
        $addsManage = AddsManage::find($id);

        $image = $request->addsImg;
        $data =
        [
            'adds_link'=>$request->adds_link,
        ];
        if(!empty($image)){

            $imageImgName = "adds". time() . '.' .$image->getClientOriginalExtension();
            $image->move(public_path('upload'),$imageImgName);
            $oldimageLink = public_path('upload/'). $addsManage->addsImg;
            unlink($oldimageLink);
            $data['addsImg'] = $imageImgName;
        }
        $addsManage->update($data);
        return redirect('adds/manage');
    }
    public function destroy(AddsManage $addsManage)
    {
        //
    }
}
