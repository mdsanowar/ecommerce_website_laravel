<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Slider;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Brian2694\Toastr\Facades\Toastr;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::latest()->get();
        return view('admin.slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
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
            'slider_title' => 'required',
            'slider_subtitle' => 'required',
            'slider_description' => 'required',
            'slider_image' => 'required',
            'publication_status' => 'required',
        ]);

        $image = $request->file('slider_image');
        $slug = str_slug($request->slider_title);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            // Check if Category Dir exists
            if (!Storage::disk('public')->exists('slider'))
            {
                Storage::disk('public')->makeDirectory('slider');
            }
            // Resize image for category and upload
            $PostImage = Image::make($image)->resize(1600,1066)->stream();
            Storage::disk('public')->put('slider/'.$imageName,$PostImage);
        }
        else
        {
            $imageName = 'default.png';
        }

        $slider = new Slider();
        $slider->slider_title = $request->slider_title;
        $slider->slider_subtitle = $request->slider_subtitle;
        $slider->slider_description = $request->slider_description;
        $slider->slug = $slug;
        $slider->slider_image = $imageName;
        $slider->publication_status = $request->publication_status;
        $slider->save();

        Toastr::success('Slider Saved Successfully :)','Success');
        return redirect()->route('admin.slider.index');
    }



    public function unactive_slider($slug)
    {
        DB::table('sliders')->where('slug', $slug)
                ->update(['publication_status' => 0]);
        Toastr::success('Slider Unactive Successfully :)','Success');
        return redirect()->route('admin.slider.index');
    }

    public function active_slider($slug)
    {
        DB::table('sliders')->where('slug', $slug)
                ->update(['publication_status' => 1]);
        Toastr::success('Slider Active Successfully :)','Success');
        return redirect()->route('admin.slider.index');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        if (Storage::disk('public')->exists('slider/'.$slider->slider_image)) {
            Storage::disk('public')->delete('slider/'.$slider->slider_image);
        }
        
        $slider->delete();
        Toastr::success('Slider Delete Successfully','Success');
        return redirect()->route('admin.slider.index');
    }
}
