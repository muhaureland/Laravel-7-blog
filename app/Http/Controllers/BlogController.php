<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;

class BlogController extends Controller
{
    public function index(Post $post)
    {
        // $data = $post->orderBy('created_at', 'DESC')->paginate(4);
        //latest() menampilkan data terbaru
        //paginate(4) membatasi pagination dengan 4 data sbg contoh 4 data
        //inRandomOrder() menampilkan data secara acak
        //take(1) membatasi data, brapa yg akan ditampilkan, conto yg saya batasi adalah 1 data untuk ditampilkan
        //get() ambil dengan metode get jika tidak menggunakan pagination

        // $cacad = $post->whereDate('created_at', '=', date('Y-m-d'))->take(1)->get();

    	$data = $post->latest()->paginate(4);
    	$cacad = $post->inRandomOrder()->take(1)->get();

        $category_widget = Category::all();
        $tag_widget = Tag::all();
        return view('blog', compact('cacad','data','category_widget', 'tag_widget'));
    }

    public function isiBlog($slug)
    {
        $collection = Post::where('slug', $slug)->get();

        $category_widget = Category::all();
        $tag_widget = Tag::all();
        return view('blog.isipost', compact('collection','category_widget', 'tag_widget'));
    }

    public function listBlog(Post $post)
    {
        $collection = Post::latest()->paginate(5);

        $category_widget = Category::all();
        $tag_widget = Tag::all();
        return view('blog.listpost', compact('collection','category_widget', 'tag_widget'));
    }

    
}
