<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Publisher;

class PublisherController extends Controller
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
        $data['publishers'] = Publisher::orderBy('nama', 'asc')->paginate(10);
        return view('admin.publisher.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.publisher.create');
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
            'nama' => 'required|min:5|max:100',
            'alamat' => 'required|min:10|max:255',
        ]);

        Publisher::create($request->all());

        $this->message('success', 'Sukses!', 'Selamat, penerbit baru telah berhasil ditambahkan');

        return redirect()->route('publisher.index');
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
        $data['publisher'] = Publisher::find($id);
        return view('admin.publisher.edit', $data);
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
            'nama' => 'required|min:5|max:100',
            'alamat' => 'required|min:10|max:255',
        ]);

        $init = Publisher::find($id);
        $init->update($request->all());

        $this->message('success', 'Sukses!', 'Update penerbit '.$init->nama.' berhasil disimpan');

        return redirect()->route('publisher.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($init = Publisher::find($id)) {

            if($init->books->count() > 0) {
                $this->message('warning', 'Error!', 'Penerbit '.$init->nama.' tidak bisa dihapus karena masih memiliki buku');

                return redirect()->route('publisher.index');
            }

            $init->delete();
            $this->message('success', 'Sukses!', 'Penerbit '.$init->nama.' berhasil dihapus');

            return redirect()->route('publisher.index');
        }

        $this->message('danger', 'Error!', '<b>"ID"</b> penerbit tidak ditemukan');

        return redirect()->route('publisher.index');
    }
}
