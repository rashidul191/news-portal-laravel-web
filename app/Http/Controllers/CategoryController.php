<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::orderBy('serial', 'asc')->get();
        return view('admin.category.index', compact('category'));
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $data =
            [
                'name' => $request->name,
                'name_eng' => $request->name_eng,
                'serial' => $request->serial,
                'status' => $request->status,
            ];
        Category::create($data);
        Toastr::success('Added successfully!');
        return redirect()->back();
    }
    public function show(Category $category)
    {
        //
    }
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $data =
            [
                'name' => $request->name,
                'name_eng' => $request->name_eng,
                'serial' => $request->serial,
                'status' => $request->status,
            ];
        $category->update($data);
        Toastr::success('Update successfully!');
        return redirect('category');
    }
    public function destroy(Category $category)
    {
        //
    }
}
