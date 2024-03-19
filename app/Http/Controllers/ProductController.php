<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductGallery;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    public function index()
    {
        if (Request()->ajax()) {
            $result = Product::all();
            return DataTables::of($result)
                ->addColumn('action', function ($item) {
                    return '
                    <a href="' . route('product-galleries.index', base64_encode($item->id)) . '"class="btn btn-primary btn-sm rounded-pill"><i class="fas fa-images"></i></a>
                    <button type="button" class="btn btn-success btn-sm mx-2 mb-1 edit-product rounded-pill" data-toggle="modal" data-target="#editProduct" data-id="' . $item->id . '"><i class="fa fa-edit"></i></button>
                    <button type="button" class="btn btn-warning btn-sm rounded-pill" onclick="deleteProduct(' . $item->id . ')"><i class="fa fa-trash"></i></button>';
                })
                ->rawColumns(['action'])
                ->make();
        }
        return view('product.index');
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            if ($request['product_id'] == null) {
                $request['product_id'] = 0;
                $this->validate($request, [
                    'name' => 'required',
                    'description' => 'required',
                    'price' => 'required',
                    'stock' => 'required',
                    'status' => 'required'
                ]);
            }
            Product::updateOrCreate(
                ['id' => $request['product_id']],
                [
                    'name' => $request['name'],
                    'description' => $request['description'],
                    'price' => $request['price'],
                    'stock' => $request['stock'],
                    'status' => $request['status']
                ]
            );

            DB::commit();
            return response()->json([
                'status' => 'success',
                'message' => 'Product has been added'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }

    public function edit($id)
    {
        $id = base64_decode($id);
        $product = Product::find($id);
        return response()->json($product);
    }

    public function destroy($id)
    {
        $id = base64_decode($id);
        ProductGallery::where('product_id', $id)->delete();
        Product::find($id)->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Product has been deleted'
        ]);
    }
}
