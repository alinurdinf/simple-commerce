<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductGallery;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Env;

class ProductGalleryController extends Controller
{
    public function index($id)
    {
        $id = base64_decode($id);
        $data = Product::find($id);
        if (Request()->ajax()) {
            $result = ProductGallery::where('product_id', $id)->get();
            return DataTables::of($result)
                ->addColumn('action', function ($item) {
                    return '<button type="button" class="btn btn-info btn-sm mx-2 mb-1 edit-sparepart" data-toggle="modal" data-target="#sparepartModify" data-id="' . $item->id . '"><i class="fa fa-edit"></i></button>
                    <button type="button" class="btn btn-danger btn-sm" onclick="deleteSparepart(' . $item->id . ')"><i class="fa fa-trash"></i></button>';
                })
                ->editColumn('url', function ($item) {
                    return '<img style="max-width: 50px;" src="' . $item->url . '"/>';
                })
                ->editColumn('is_featured', function ($item) {
                    return $item->is_featured ? 'Yes' : 'No';
                })
                ->rawColumns(['action', 'url'])
                ->make();
        }
        return view('product_gallery.index', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'url' => 'required|image',
        ]);

        $data = $request->all();
        $data['url'] = $request->file('url')->store('public/gallery');
        $data['is_featured'] = $request->is_featured ? true : false;
        ProductGallery::create($data);
        return redirect()->route('product-galleries.index', base64_encode($request->product_id));
    }
}
