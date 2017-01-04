<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    private function message($status = 'default', $title = '', $pesan = '')
    {
        \Session::flash('flash_message', [
            'status' => $status,
            'title' => $title,
            'pesan' => $pesan,
        ]);
    }

    public function index()
    {
        $data['users'] = User::orderBy('id', 'desc')->paginate(10);
        return view('admin.user.index', $data);
    }

    public function create()
    {
        $data['user'] = new User;
        return view('admin.user.create', $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, ['role'=>'required|in:0,1']);
        if($request->role == '0') {
            $this->validate($request, [
                'name' => 'required|max:255',
                'username' => 'required|min:6|max:16|unique:users',
                'password' => 'required|min:6|confirmed',
                'kelas' => 'required|in:10,11,12',
                'telp' => 'required|min:10|max:20',
                'alamat' => 'required|min:10|max:255',
            ]);

            $user = User::create([
                'name' => $request->name,
                'username' => $request->username,
                'password' => bcrypt($request->password),

            ]);
            $user->student()->create([
                'kelas' => $request->kelas,
                'telp' => $request->telp,
                'alamat' => $request->alamat,
            ]);

        }
        elseif( $request->role == '1') {
            $this->validate($request, [
                'name' => 'required|max:255',
                'username' => 'required|min:6|max:16|unique:users',
                'password' => 'required|min:6|confirmed',
            ]);

            User::create([
                'name' => $request->name,
                'username' => $request->username,
                'password' => bcrypt($request->password),
                'is_admin' => true,
                'is_member' => false,
            ]);
        }

        $this->message('success', 'Sukses!', 'User baru telah ditambahkan');

        return redirect()->route('user.index');
    }

    public function edit($id)
    {
        $data['user'] = User::find($id);
        return view('admin.user.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, ['role'=>'required|in:0,1']);
        $user = User::find($id);

        if($request->role == 0) {
            $this->validate($request, [
                'name' => 'required|max:255',
                'old_pass' => 'min:6',
                'password' => 'min:6|confirmed',
                'kelas' => 'required|in:10,11,12',
                'telp' => 'required|min:10|max:20',
                'alamat' => 'required|min:10|max:255',
            ]);

            $user->update([
                'name' => $request->name,
                'is_admin' => false,
                'is_member' => true,
            ]);
            $user->student()->update([
                'kelas' => $request->kelas,
                'telp' => $request->telp,
                'alamat' => $request->alamat,
            ]);
        }
        elseif( $request->role == 1) {
            $this->validate($request, [
                'name' => 'required|max:255',
                'old_pass' => 'min:6',
                'password' => 'min:6|confirmed',
            ]);

            $user->update([
                'name' => $request->name,
                'is_admin' => true,
                'is_member' => false,
            ]);

            $user->student()->delete();
        }

        if(!empty($request->password)) {
            if(password_verify($request->password, $user->password)) {
                $user->password = bcrypt($request->password);
                $user->save();
            } else {
                $this->message('warning', 'Error!', 'Password lama yang dimasukan salah');

                return redirect()->back();
            }
        }

        $this->message('success', 'Sukses!', 'User telah berhasil disimpan');

        return redirect()->route('user.index');
    }

    public function destroy($id)
    {
        if($init = User::find($id)) {
            $init->delete();
            $this->message('success', 'Sukses!', 'User '.$init->name.' berhasil dihapus');

            return redirect()->route('user.index');
        }

        $this->message('danger', 'Error!', '<b>"ID"</b> user tidak ditemukan');

        return redirect()->route('user.index');
    }
}
