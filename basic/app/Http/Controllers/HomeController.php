<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function home()
    {
        $users = User::paginate(20);
        return view('welcome', compact('users'));
    }

    public function createUser()
    {
        return view("create");
    }

    public function saveUser(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:8',
        ]);
        // instansiasi variabel
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        if ($user->save()) {
            return redirect(url('/'))->with('success', 'Data Has Been Created');
        } else {
            return back()->with('error', 'Data Cannot Created');
        }
    }

    public function editUser($id)
    {
        $user = User::find($id);
        return view("edit", compact('user'));
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return redirect(url('/'));
    }
    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect(url('/'));
    }

    public function about()
    {
        return view("about");
    }
    public function contact()
    {
        return view("contact");
    }

    public function searchData(Request $request)
    {
        $query = $request->search;
        $users = User::orderBy('id', 'DESC')->where('name', 'LIKE', '%' . $query . '%')->paginate(2);
        return view('search', compact('users'));
    }

}
