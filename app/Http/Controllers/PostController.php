<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    //
    public function index(){
        $posts = Post::select('posts.id', 'posts.title', 'posts.img_post', 'posts.publish_at', 'posts.status', 'users.username', 'categories.name')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->join('categories', 'posts.cate_id', '=', 'categories.id' )
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('admin.posts.show', compact('posts'));
    }

    public function add(){
        $categories = Category::select('id', 'name')->get();
        return view('admin.posts.add', compact('categories'));
    }
    public function store(Request $request){
        $request->validate(
            [
                'title' => 'required|max:1000',
                'slug' => 'required|alpha_dash',
                'seo_desc' => 'required',
                'desc' => 'required',
                'img_post' => 'required',
                'content_post' => 'required',
                'cate' => 'required',
                'status' => 'required',
            ],
            [
                'required' => ':attribute không được để trống',
                'max' => '"attribute không nhập quá 1000 ký tự',
                'alpha_dash' => ':attribute ký tự nhập phải viết liền không dấu và có dấu -, _',
            ],
            [
                'title' => 'Tiêu đề bài viết',
                'desc' => 'Mô tả bài viết',
                'seo_desc' => 'Seo nội dung',
                'img_post' => 'Ảnh bìa bài viết',
                'content_post' => 'Nội dung bài viết',
                'cate' => 'Danh mục bài viết',
                'status' => 'Trạng thái bài viết',
            ]
        );
        $publish_at = strtotime($request->date."".$request->time);
        $post = Post::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'desc_post' => $request->desc,
            'seo_desc' => $request->seo_desc,
            'img_post' => $request->img_post,
            'content' => makeContent($request->content_post),
            'status' => $request->status,
            'publish_at' => $publish_at,
            'user_id' => auth()->user()->id,
            'cate_id' => $request->cate,
        ]);

        return redirect()->back()->with('alert', $request->title);

    }
    public function edit($id){
        $categories = Category::select('id', 'name')->get();
        $post= Post::query()->where('id', $id)->first();
//        echo "<pre>";
//        print_r($post->title);
        return view('admin.posts.edit', compact('categories', 'post'));
    }

    public function delete($id){
        $post = Post::find($id)->delete();
        return redirect()->back()->with('delete', 'Xóa bài viết ' .$id. ' thành công');
    }
}
