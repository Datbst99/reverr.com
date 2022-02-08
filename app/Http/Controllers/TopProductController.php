<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Top_pros;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
class TopProductController extends Controller
{
    //
    public function index(){
        $products = Top_pros::orderBy('id', 'desc')->paginate(5);

        return view('admin.topProduct.show', compact('products'));
    }

    public function add(){
        $categories = Category::select('id', 'name')->get();
        return view('admin.topProduct.add', compact('categories'));
    }
    public function store(Request $request){
        $request->validate(
            [
                'name' => 'required',
                'current_price' => 'required|numeric',
                'old_price' => 'required|numeric',
                'link_product' => 'required',
                'status' => 'required',
                'cate' => 'required'
            ],
            [
                'required' => ':attribute không để trống',
                'numeric' => ':attribute chỉ nhập dạng số',
            ],
            [
                'name' => 'Tên sản phẩm',
                'current_price' => 'Giá mới',
                'old_price' => 'Giá cũ',
                'link_product' => 'Link sản phẩm',
                'status' => 'Trạng thái sản phẩm',
                'cate' => 'Danh mục sản phẩm'
            ]
        );
        // Tester phải xóa sớm
        $img = '/uploads/files/apple-watch-series-5.jpg';
        $product = Top_pros::create([
            'img_pro' => $img,
            'name' => $request->name,
            'current_price' => $request->current_price,
            'old_price' => $request->old_price,
            'link' => $request->link_product,
            'status' => $request->status,
            'cate_id' => $request->cate
        ]);
        return redirect()->back()->with('product', 'Sản phẩm được thêm thành công');
    }
    public function edit(){
        return "sẽ hoàn thiện sớm";
    }

    public function delete($id){
        $pro = Top_pros::find($id)->delete();
        return redirect()->back()->with('product', 'Xóa sản phẩm thành công');
    }
}
