<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class BorrowerController extends Controller
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
        $data['borrowers'] = \Auth::user()->student->borrowers()->orderBy('id', 'desc')->paginate(10);
        return view('member.borrower.index', $data);
    }

    public function create()
    {
        return view('member.borrower.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'kode_buku' => 'required|in:'.app('Book')->code(),
            'tgl_kembali' => 'required|date_format:"Y-m-d"',
        ]);

        $id = \Auth::user()->student->id;
        $book = Book::where('kode_buku', $request->kode_buku)->first();
        $book->borrowers()->create([
            'student_id' => $id,
            'tgl_pinjam' => date('Y-m-d', strtotime(time())),
            'tgl_kembali' => $request->tgl_kembali,
            'kode_pinjam' => 'PERPUS-'.time(),
        ]);

        $this->message('success', 'Sukses!', 'Terimakasih telah meminjam buku '.$book->judul_buku);

        return redirect()->route('peminjam.index');
    }
}
