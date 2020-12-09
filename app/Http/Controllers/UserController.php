<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function userIndex()
    {
        $user = User::all();
        return view('user.user', compact('user'));
    }

    public function userStore(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'name' => 'required',
            'password' => 'required'
        ]);

        $data = [
            'email' => $request->email,
            'name' => $request->name,
            'password' => Hash::make($request->password)
        ];

        User::create($data);
        toast('Data berhasil di tambah', 'success');
        return redirect()->route('user.index');
    }

    public function userEdit($id)
    {
        $user =  User::findOrFail($id);
        return view('user.edit', compact('user'));
    }

    public function userUpdate(Request $request, $id)
    {
        $this->validate($request, [
            'email' => 'required',
            'name' => 'required'
        ]);

        if ($request->has('password')) {
            $data = [
                'email' => $request->email,
                'name' => $request->name,
                'password' =>  Hash::make($request->password)
            ];
        } else {
            $data = [
                'email' => $request->email,
                'name' => $request->name
            ];
        }

        User::findOrFail($id)->update($data);
        toast('Data berhasil di update', 'success');
        return redirect()->route('user.index');
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        toast('Data berhasil di delete', 'success');
        return redirect()->route('user.index');
    }
}
