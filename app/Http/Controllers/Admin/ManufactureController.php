<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Manufacture;
use Brian2694\Toastr\Facades\Toastr;
use DB;
class ManufactureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manufactures = Manufacture::latest()->get();
        return view('admin.manufacture.index', compact('manufactures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.manufacture.create');
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
            'manufacture_name' => 'required|unique:manufactures',
            'manufactures_description' => 'required',
        ]);
        $manufacture = new Manufacture();
        $manufacture->manufacture_name = $request->manufacture_name;
        $manufacture->slug = str_slug($request->manufacture_name);
        $manufacture->manufactures_description = $request->manufactures_description;
        $manufacture->publication_status = $request->publication_status;
        $manufacture->save();
        Toastr::success('Manufacture Saved Successfully','Success');
        return redirect()->route('admin.manufacture.index');
    }


/*================UnActive Manufacture===============*/
    public function unactive_manufacture($slug)
    {
        DB::table('manufactures')->where('slug', $slug)
                ->update(['publication_status' => 0]);
        Toastr::success('Manufacture UnActive Successfully','Success');
        return redirect()->route('admin.manufacture.index');
    }

/*==============Active Manufacture===============*/

    public function active_manufacture($slug)
    {
        DB::table('manufactures')->where('slug', $slug)
                ->update(['publication_status' => 1]);
        Toastr::success('Manufacture Active Successfully','Success');
        return redirect()->route('admin.manufacture.index');
    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit_manufactures = Manufacture::findorfail($id);
        return view('admin.manufacture.edit', compact('edit_manufactures'));
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
        $manufacture = Manufacture::findorfail($id);
        $manufacture->manufacture_name = $request->manufacture_name;
        $manufacture->manufactures_description = $request->manufactures_description;
        $manufacture->publication_status = $request->publication_status;
        $manufacture->save();
        Toastr::success('Manufacture Updated Successfully','Success');
        return redirect()->route('admin.manufacture.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $manufacture = Manufacture::find($id);
        $manufacture->delete();
        Toastr::success('Manufacture Delete Successfully','Success');
        return redirect()->route('admin.manufacture.index');
    }
}
