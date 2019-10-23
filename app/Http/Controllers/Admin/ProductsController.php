<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Brian2694\Toastr\Facades\Toastr;
use DB;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->get();
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');
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
            'product_name' => 'required',
            'product_short_description' => 'required',
            'product_long_description' => 'required',
            'product_size' => 'required',
            'product_price' => 'required',
            'product_color' => 'required',
            'product_image' => 'required',
        ]);

        $image = $request->file('product_image');
        $slug = str_slug($request->product_name);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            // Check if Category Dir exists
            if (!Storage::disk('public')->exists('product'))
            {
                Storage::disk('public')->makeDirectory('product');
            }
            // Resize image for category and upload
            $PostImage = Image::make($image)->resize(500,500)->stream();
            Storage::disk('public')->put('product/'.$imageName,$PostImage);

        }
        else
        {
            $imageName = 'default.png';
        }

        $product = new Product();
        $product->product_name = $request->product_name;
        $product->category_id = $request->category_id;
        $product->manufacture_id = $request->manufacture_id;
        $product->slug = $slug;
        $product->product_image = $imageName;
        $product->product_short_description = $request->product_short_description;
        $product->product_long_description = $request->product_long_description;
        $product->product_size = $request->product_size;
        $product->product_price = $request->product_price;
        $product->product_color = $request->product_color;
        $product->publication_status = $request->publication_status;
        $product->save();
        $product->categories()->attach($request->categories);
        // $post->manufactures()->attach($request->manufactures);

        Toastr::success('Product Saved Successfully :)','Success');
        return redirect()->route('admin.product.index');
    }



    public function unactive_product($slug)
    {
        DB::table('products')->where('slug', $slug)
                ->update(['publication_status' => 0]);
        Toastr::success('Product Unactive Successfully :)','Success');
        return redirect()->route('admin.product.index');   
    }

    public function active_product($slug)
    {
        DB::table('products')->where('slug', $slug)
                ->update(['publication_status' => 1]);
        Toastr::success('Product Active Successfully :)','Success');
        return redirect()->route('admin.product.index');   
    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show_product = Product::find($id);
        return view('admin.product.show',compact('show_product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit_product = Product::find($id);
        return view('admin.product.edit', compact('edit_product'));
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
        $validatedData = $request->validate([
            'product_image' => 'required',
        ]);
        $image = $request->file('product_image');
        $slug = str_slug($request->product_name);
        $product = Product::findorfail($id);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            // Check if Category Dir exists
            if (!Storage::disk('public')->exists('product'))
            {
                Storage::disk('public')->makeDirectory('product');
            }

            // Delete old category image
            if (Storage::disk('public')->exists('product/'.$product->image))
            {
                Storage::disk('public')->delete('product/'.$product->image);
            }

            // Resize image for category and upload
            $ProductImage = Image::make($image)->resize(500,500)->stream();
            Storage::disk('public')->put('product/'.$imageName,$ProductImage);

        }
        else
        {
            $imageName = 'default.png';
        }

        
        $product->product_name = $request->product_name;
        $product->category_id = $request->category_id;
        $product->manufacture_id = $request->manufacture_id;
        $product->slug = $slug;
        $product->product_image = $imageName;
        $product->product_short_description = $request->product_short_description;
        $product->product_long_description = $request->product_long_description;
        $product->product_size = $request->product_size;
        $product->product_price = $request->product_price;
        $product->product_color = $request->product_color;
        $product->publication_status = $request->publication_status;
        $product->save();

        $product->categories()->attach($request->categories);
        $product->manufactures()->attach($request->manufactures);

        Toastr::success('Product Update Successfully :)','Success');
        return redirect()->route('admin.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if (Storage::disk('public')->exists('product/'.$product->product_image)) {
            Storage::disk('public')->delete('product/'.$product->product_image);
        }

        $product->delete();
        Toastr::success('Product Delete Successfully','Success');
        return redirect()->route('admin.product.index');
    }
}
