<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use App\Tag;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $post = Post::paginate(10);
        return view('admin.post.index', compact('post'));
    }


    public function create()
    {
        $tag = Tag::all();
        $category = Category::all();
        return view('admin.post.create', compact('category', 'tag'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|unique:posts|max:255|min:3',
            'category_id' => 'required',
            'content' => 'required|min:5',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        // getClientOriginalName() berfungsi untuk mengambil nama gambar
        $new_gambar = time().'_'.uniqid().'.'.$request->gambar->extension();

        $karambia = Post::create([
            'user_id' => Auth::id(),
            'judul'=> $request->judul,
            'slug'=> Str::slug($request->judul),
            'category_id'=> $request->category_id,
            'content'=> $request->content,
            'gambar'=> 'public/uploads/posts/'.$new_gambar
        ]);

        // hubungkanKeTag adalah nama function di model post dan initag adalah name dari view post create
        // attach berfungsi untuk memasukkan data hubungkanKeTag kedalam array initag
        $karambia->hubungkanKeTag()->attach($request->initag);

        // move berfungsi memindahkan
        $request->gambar->move(public_path('uploads/posts'),$new_gambar);
        return redirect('post')->with('status', 'postingan data berhasil disimpan!');
    }


    public function show(Post $post)
    {
        //
    }


    public function edit(Post $post)
    {
        $Rtag = Tag::all();
       $Rcategory = Category::all();
        return view('admin.post.edit', compact('post', 'Rtag', 'Rcategory'));
    }


    public function update(Request $request, Post $post)
    {

        $request->validate([
            'judul' => 'required|max:255|min:3',
            'category_id' => 'required',
            'content' => 'required|min:5',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg'
            ]);

        $cacad = Post::findOrFail($post->id);
        if ($request->hasFile('gambar')) {

            $gambar = $request->gambar;
            $new_gambar = time().'_'.$request->gambar->getClientOriginalName();
            $gambar->move(public_path('uploads/posts'),$new_gambar);
            // $cacad = Post::find($post->id);
            // $cacad->gambar = $request->$new_gambar;
            // $cacad->update();
            $post_data = [
                'judul' => $request->judul,
                'slug' => Str::slug($request->judul),
                'category_id' =>  $request->category_id,
                'content' =>  $request->content,
                'gambar' => 'public/uploads/posts/'.$new_gambar
            ];
        }
        else{
            $post_data = [
                'judul' => $request->judul,
                'slug' => Str::slug($request->judul),
                'category_id' =>  $request->category_id,
                'content' =>  $request->content
            ];

        }

        $cacad->hubungkanKeTag()->sync($request->initag);
        $cacad->update($post_data);


        // hubungkanKeTag adalah nama function di model post dan initag adalah name dari view post create
        // sync berfungsi untuk update data hubungkanKeTag kedalam array initag

        return redirect('post')->with('status', 'postingan data berhasil diupdate!');
    }


    public function destroy(Post $post)
    {
        Post::destroy($post->id);
        return redirect('post')->with('status', 'menghapus data berhasil!');

        // //cara delete jika menggunakan controller biasa atau --resource
        // $category = Category::findorfail($id);
        // $category->delete();
    }

    public function softdelete()
    {
        $post = Post::onlyTrashed()->paginate(10);
        return view('admin.post.hapus', compact('post'));
    }

    public function restore($post)
    {
        $post = Post::withTrashed()->where('id', $post)->first();
        $post->restore();
        return redirect('post')->with('status', 'postingan data berhasil dikembalikan!');
    }

    public function kill($post)
    {
        $post = Post::withTrashed()->where('id', $post)->first();
        $post->forceDelete();
        return back()->with('status', 'postingan data berhasil didelete permanen!');
    }

}
