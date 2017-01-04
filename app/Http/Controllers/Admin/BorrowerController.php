<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Publisher;
use App\Models\Borrower;

class BorrowerController extends Controller
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
    public function index($status)
    {
        switch ($status) {
            case 'ongoing':
                $data['borrowers'] = Borrower::where('is_returned', 0)->orderBy('id', 'desc')->paginate(10);
                return view('admin.borrower.ongoing', $data);
            case 'returned':
                $data['borrowers'] = Borrower::where('is_returned', 1)->orderBy('id', 'desc')->paginate(10);
                return view('admin.borrower.returned', $data);
            default:
                abort(404);
        }
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
        $init = Borrower::find($id);
        $init->is_returned = true;

        $this->message('success', 'Sukses!', 'Buku '.$init->Book->judul_buku.' yang dipinjam oleh '.$init->student->user->name.' telah dikembalikan');

        $init->save();

        return redirect()->route('borrower.index', ['status'=>'ongoing']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($init = Borrower::find($id)) {
            $init->delete();
            $this->message('success', 'Sukses!', 'Peminjam '.$init->student->user->name.' berhasil dihapus');
            return redirect()->route('publisher.index');
        }

        $this->message('danger', 'Error!', '<b>"ID"</b> peminjam tidak ditemukan');

        return redirect()->route('borrower.index', ['status'=>'ongoing']);
    }

    public function search()
    {
        if(!empty($_REQUEST['c'])) {
            $data['results'] = Borrower::where('kode_pinjam', 'LIKE', '%'.$_REQUEST['c'].'%')->get();
            return view('admin.borrower.search', $data);
        }
    }
}
