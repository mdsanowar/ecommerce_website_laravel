<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use Brian2694\Toastr\Facades\Toastr;
use DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::latest()->get();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_name' => 'required|unique:categories',
            'category_description' => 'required',
        ]);
        $category = new Category();
        $category->category_name = $request->category_name;
        $category->slug = str_slug($request->category_name);
        $category->category_description = $request->category_description;
        $category->publication_status = $request->publication_status;
        $category->save();
        Toastr::success('Category Saved Successfully','Success');
        return redirect()->route('admin.category.index');

    }


    public function unactive_category($slug)
    {
        DB::table('categories')->where('slug', $slug)
                ->update(['publication_status' => 0]);
        Toastr::success('Category UnActive Successfully','Success');
        return redirect()->route('admin.category.index');
    }

    public function active_category($slug)
    {
        DB::table('categories')->where('slug', $slug)
                ->update(['publication_status' => 1]);
        Toastr::success('Category Active Successfully','Success');
        return redirect()->route('admin.category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit_category = Category::findorfail($id);
        return view('admin.category.edit',compact('edit_category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::findorfail($id);
        $category->category_name = $request->category_name;
        $category->category_description = $request->category_description;
        $category->publication_status = $request->publication_status;
        $category->save();
        Toastr::success('Category Update Successfully','Success');
        return redirect()->route('admin.category.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        Toastr::success('Category Delete Successfully','Success');
        return redirect()->route('admin.category.index');

    }
}
