<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function add(){
        $categories = Category::get();
        return view('admin.categories.add', compact('categories'));
    }
    public function store(Request $request){
        $request->validate(
            [
                'name' => 'required',
                'slug' => 'required|alpha_dash|unique:categories',
            ],
            [
                'required' => ':attribute không được để trống',
                'alpha_dash' => ':attribute cần phải có dấu gạch -,_ và viết liền không dấu',
                'unique' => 'Danh mục đã tồn tại'
            ]
        );
        $cate = Category::create([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);
        return redirect()->back();
    }
    public function edit(){
        return "Chức năng sẽ sớm được cập nhật";
    }
    public function delete(){
        return  "Chức năng sẽ sớm được cập nhật";
    }
}
