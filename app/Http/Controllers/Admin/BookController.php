<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Publisher;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private function message($status = 'default', $title = '', $pesan = '')
    {
        \Session::flash('flash_message', [
            'status' => $status,
            'title' => $title,
            'pesan' => $pesan,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['books'] = Book::orderBy('judul_buku', 'asc')->paginate(10);
        return view('admin.book.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['publishers'] = Publisher::pluck('nama', 'id');
        return view('admin.book.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'publisher_id' => 'required|in:'.app('Publisher')->idValidate(),
            'judul_buku' => 'required|min:5|max:255',
            'kode_buku' => 'required|min:3|max:50|unique:books',
        ]);

        $init = Publisher::find($request->publisher_id);
        $init->books()->create($request->all());
        $this->message('success', 'Sukses!', 'Selamat, buku telah berhasil ditambahkan');

        return redirect()->route('book.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['book'] = Book::find($id);
        $data['publishers'] = Publisher::pluck('nama', 'id');
        return view('admin.book.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'publisher_id' => 'required|in:'.app('Publisher')->idValidate(),
            'judul_buku' => 'required|min:5|max:255',
            'kode_buku' => 'required|min:3|max:50',
        ]);

        $init = Book::find($id);
        $init->update($request->all());
        $this->message('success', 'Sukses!', 'Buku telah berhasil disimpan');

        return redirect()->route('book.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($init = Book::find($id)) {
            if($init->borrowers->count() > 0) {
                $this->message('warning', 'Error!', 'Buku '.$init->judul_buku.' masih ada yang meminjam, pastikan yang meminjam telah mengembalikan buku dan buku ini baru dapat dihapus');

                return redirect()->route('book.index');
            }
            $init->delete();
            $this->message('success', 'Sukses!', 'Buku '.$init->judul_buku.' berhasil dihapus');

            return redirect()->route('book.index');
        }

        $this->message('danger', 'Error!', '<b>"ID"</b> buku tidak ditemukan');

        return redirect()->route('book.index');
    }
}
