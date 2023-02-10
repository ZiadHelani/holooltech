<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function showData()
    {
        $products = Products::get();
        return view('admin', compact('products'));
    }
    public function store(PostRequest $request)
    {
        if ($request->validated()) {
            $requestDecode = json_decode($request->date, true);
            $image_name = time() . '.' . $request->image->getClientOriginalExtension();
            $image_path = $request->file('image')->storeAs('pics', $image_name, 'public');
            $products = Products::insert([
                'title' => $request->title,
                'desc' => $request->desc,
                'price' => $request->price,
                'image' => $image_name,
            ]);
            return redirect()->back();
        } else {
            return response()->json(['alert' => 'error'], 404);
        }
    }
    public function deleteData(Request $request, $id)
    {
        $products = Products::where('id', '=', $id)->delete();
        return redirect()->back();
    }
    public function updateData(Request $request, $id)
    {
        $products = Products::where('id', '=', $id)->first(); // (first) without foreach in view
        return view('update', compact('products'));
        // $products = DB::table('products')
    }
    public function update(PostRequest $request, $id)
    {
        if ($request->validated()) {
            $requestDecode = json_decode($request->date, true);
            $image_name = time() . '.' . $request->image->getClientOriginalExtension();
            $image_path = $request->file('image')->storeAs('pics', $image_name, 'public');
            $products = Products::where('id', '=', $id)->update([
                'title' => $request->title,
                'desc' => $request->desc,
                'price' => $request->price,
                'image' => $image_name,
            ]);
            return redirect()->back();
        } else {
            return response()->json(['alert' => 'error', 404]);
        }
    }
}
