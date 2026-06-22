<?php

namespace App\Http\Controllers;

use App\Models\BasicInfo;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class BasicInfoController extends Controller
{
    public function index()
    {
        $basicInfo = BasicInfo::first();
        return view('admin.basicInfo.index', compact('basicInfo'));
    }

    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }

    public function show(BasicInfo $basicInfo)
    {
        //
    }

    public function edit($id)
    {
        $basicInfo = BasicInfo::find($id);
        return view('admin.basicInfo.edit', compact('basicInfo'));
    }

    public function update(Request $request, $id)
    {
        $basicInfo = BasicInfo::find($id);

        $logo = $request->logo;
        $favicon = $request->fav_icon;
        $footerlogo = $request->footerLogo;

        $data =
            [
                'name' => $request->name,
                'email' => $request->email,
                'phone_no' => $request->phone_no,
                'fb_link' => $request->fb_link,
                'whatsapp' => $request->whatsapp,
                'instraLink' => $request->instraLink,
                'youTubeLink' => $request->youTubeLink,
                'google' => $request->google,
                'address' => $request->address,
                'twitter' => $request->twitter,
                'chiefAdviser' => $request->chiefAdviser,
                'editor' => $request->editor,
                'adviserEditor' => $request->adviserEditor,
                'copyright' => $request->copyright,
            ];

        if (!empty($favicon)) {

            $faviconImgName = "fav" . time() . '.' . $favicon->getClientOriginalExtension();
            $favicon->move(public_path('upload'), $faviconImgName);

            $oldFavIconLink = public_path('upload/') . $basicInfo->fav_icon;

            if (!empty($basicInfo->fav_icon) && file_exists($oldFavIconLink)) {
                unlink($oldFavIconLink);
            }

            $data['fav_icon'] = $faviconImgName;
        }

        if (!empty($logo)) {

            $logoImgName = "logo" . time() . '.' . $logo->getClientOriginalExtension();
            $logo->move(public_path('upload'), $logoImgName);

            $oldLogoLink = public_path('upload/') . $basicInfo->logo;

            if (!empty($basicInfo->logo) && file_exists($oldLogoLink)) {
                unlink($oldLogoLink);
            }

            $data['logo'] = $logoImgName;
        }

        if (!empty($footerlogo)) {

            $footerlogoImgName = "flogo" . time() . '.' . $footerlogo->getClientOriginalExtension();
            $footerlogo->move(public_path('upload'), $footerlogoImgName);

            $oldfooterlogoLink = public_path('upload/') . $basicInfo->footerLogo;

            if (!empty($basicInfo->footerLogo) && file_exists($oldfooterlogoLink)) {
                unlink($oldfooterlogoLink);
            }

            $data['footerLogo'] = $footerlogoImgName;
        }

        $basicInfo->update($data);

        Toastr::success('Update successfully!');
        return redirect('basic/info');
    }
    public function destroy(BasicInfo $basicInfo)
    {
        //
    }
}
