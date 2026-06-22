<?php

namespace App\Http\Controllers;

use App\Models\AddsManage;
use Illuminate\Http\Request;

class AddsManageController extends Controller
{
    public function index()
    {
        $adds = AddsManage::orderBy('id', 'asc')->get();
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
                'adds_link' => $request->adds_link,
            ];
        if ($image) {
            $imgtext = 'adds' . time() . '.' . $image->getClientOriginalExtension();
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

        if (!$addsManage) {
            return redirect('adds/manage')->with('error', 'Data not found');
        }

        $data = [
            'adds_link' => $request->adds_link,
        ];

        $image = $request->addsImg;

        if (!empty($image)) {

            // new image name
            $imageImgName = "adds" . time() . '.' . $image->getClientOriginalExtension();

            // upload new image
            $image->move(public_path('upload'), $imageImgName);

            // old image path
            $oldImage = $addsManage->addsImg;
            $oldImagePath = public_path('upload/' . $oldImage);

            // safe delete old image
            if (!empty($oldImage) && file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }

            // update DB field
            $data['addsImg'] = $imageImgName;
        }

        // update record
        $addsManage->update($data);

        return redirect('adds/manage')->with('success', 'Updated successfully');
    }
    public function destroy(AddsManage $addsManage)
    {
        //
    }
}
