<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Top_pros;
use App\Models\Mail;
use App\Models\Post;
use Illuminate\Http\Request;
use Arcanedev\SeoHelper\Entities\Analytics;


class ClientController extends Controller
{
    //
    public function index()
    {

        $categories = Category::select('id', 'name', 'slug')->get();
        $hot_posts = Post::select('id', 'title', 'img_post', 'slug')
            ->where('status', 'public')
            ->where('publish_at', '<=', time())
            ->orderBy('id', 'desc')
            ->limit(6)->get();

        $view_posts = Post::select('id', 'title', 'img_post', 'slug')
            ->where('status', 'public')
            ->where('publish_at', '<=', time())
            ->orderBy('view_count', 'desc')
            ->limit(4)->get();

        $posts = [];
        foreach ($categories as $val) {
            $posts[$val->id] = Post::select('id', 'title', 'desc_post', 'img_post', 'slug', 'cate_id')
                ->where('cate_id', $val->id)
                ->where('status', 'public')
                ->where('publish_at', '<=', time())
                ->orderBy('id', 'desc')
                ->limit(6)->get();
        };
        $this->seo()
        ->setTitle('Trang chủ')
        // ->setSiteName('My Company Name')
        ->setDescription('My awesome description')
        ->setKeywords(['công nghệ', 'review', 'sản phẩm', 'đánh giá']);
        return view('client.index', compact('categories', 'hot_posts', 'posts', 'view_posts'));
    }
    public function cate(Request $request)
    {
        $categories = Category::select('id', 'name', 'slug')->get();
        $hot_posts = Post::select('id', 'title', 'img_post', 'slug')
            ->where('status', 'public')
            ->where('publish_at', '<=', time())
            ->orderBy('id', 'desc')
            ->limit(6)->get();

        $view_posts = Post::select('id', 'title', 'img_post', 'slug')
            ->where('status', 'public')
            ->where('publish_at', '<=', time())
            ->orderBy('view_count', 'desc')
            ->limit(4)->get();
        $posts = Post::select('id', 'title', 'desc_post', 'img_post', 'slug', 'cate_id')
            ->where('cate_id', $request->id)
            ->where('status', 'public')
            ->where('publish_at', '<=', time())
            ->orderBy('id', 'desc')
            ->paginate(9);
        $current_page = Category::select('name')->where('id', $request->id)->get();
        return view('client.cate', compact('categories', 'posts', 'current_page', 'hot_posts', 'view_posts'));
    }
    public function detail(Request $request)
    {   
        $categories = Category::select('id', 'name', 'slug')->get();
        $post = Post::select('posts.title' ,'posts.desc_post', 'posts.content', 'posts.view_count', 'categories.id', 'categories.name', 'categories.slug')
            ->join('categories', 'categories.id', '=', 'posts.cate_id')
            ->where('posts.id', $request->id)
            ->where('posts.status', 'public')
            ->where('posts.publish_at', '<=', time())
            ->first();

            $post_news = Post::select('id', 'title', 'desc_post', 'img_post', 'slug')
            ->where('status', 'public')
            ->where('publish_at', '<=', time())
            ->orderBy('id', 'desc')
            ->limit(5)->get();

            $products = Top_pros::select('id', 'img_pro', 'name', 'current_price', 'old_price', 'link')
            ->where('status', 'public')
            ->orderBy('id', 'desc')
            ->limit(9)->get();
        // update view_count
        $post_view = Post::find($request->id);
        $post_view->view_count = $post_view->view_count + 1;
        $post_view->save();
        return view('client.detail', compact('categories', 'post', 'post_news', 'products'));
    }
    public function search(Request $request)
    {
        $categories = Category::select('id', 'name', 'slug')->get();
        $posts = Post::select('id', 'title', 'desc_post', 'img_post', 'slug', 'cate_id')
            ->where('title', 'LIKE', '%' . $request->search . '%')
            ->where('status', 'public')
            ->where('publish_at', '<=', time())
            ->orderBy('id', 'desc')
            ->paginate(9);
        return view('client.search', compact('categories', 'posts'));
    }
    public function mail(Request $request)
    {
        $request->validate(
            [
                'name_mail' => 'required|unique:mails'
            ],
            [
                'required' => ':attribute không được để trống',
                'unique' => ':attribute mail đã có trên hệ thống',
            ]

        );
        $mail = Mail::create([
            'name_mail' => $request->mail
        ]);
        return redirect()->back()->with('mail', 'Thêm thành công');
    }
}
