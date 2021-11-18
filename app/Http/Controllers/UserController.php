<?php

namespace App\Http\Controllers;


use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Rules\MatchOldPassword;

class UserController extends Controller
{
    public function index()
    {
        // //penggunaan ASC atau DESC
        // $user = User::orderBy('id', 'ASC')->paginate(10);

        // ygdibwah untuk menyembunyikan user_role 0 untuk ditampilkan
        $user = User::where('user_role', !0)->paginate(10);
        return view('admin.user.index', compact('user'));

    }


    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:users|max:255|min:3|string',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'user_role' => 'required',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);


        User::create([
            'user_id' => Auth::id(),
            'user_role'=> $request->user_role,
            'name'=> $request->name,
            'email'=> $request->email,
            'password' => Hash::make($request['password']),
        ]);
        return redirect('user')->with('status', 'user berhasil disimpan');

        //ygdibawah untuk spesifick redirect ke view mana
        // return redirect()->route('admin.news.index')
        //                  ->with('success','News created successfully');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255|min:3|string',
            'user_role' => 'required',
        ]);

        $user_data = [
            'user_role' => $request->user_role,
            'name' => $request->name,
        ];

        $user = User::findOrFail($id);
        $user->update($user_data);
        return redirect('user')->with('status', 'user berhasil di update!');
    }


    public function destroy($id)
    {
        User::destroy($id);
        return redirect('user')->with('status', 'menghapus data berhasil!');
    }


    public function changePasswordForm()
    {
        return view('admin.user.changepassword');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|string',
            'password' => ['required', 'string', 'min:5', 'confirmed'],
        ]);
        if (!(Hash::check($request->current_password, Auth::user()->password))) {
            return back()->with('status2', 'Password anda tidak sama dengan sebelumnya!');
        }elseif (strcmp($request->current_password, $request->password) === 0) {
            return back()->with('status', 'Password anda tidak boleh sama dengan kata sandi baru!');
        }
        //cara update password cara ke 1
        // $user = Auth::user();
        // $user->password = Hash::make($request->password);
        // $user->save();

        //cara simple update password alias cara ke 2
        Auth::user()->update(['password'=> Hash::make($request->password)]);
        return back()->with('status', 'Password berhasil diubah!');
    }
}
