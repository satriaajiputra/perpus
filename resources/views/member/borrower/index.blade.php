@extends('layouts.app')

@section('title', 'Peminjam')

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">Daftar Buku</div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul Buku</th>
                                <th>Pada</th>
                                <th>Dikembalikan</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = ($borrowers->currentPage() - 1) * $borrowers->perPage() +1 ?>
                            @foreach ($borrowers as $row)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $row->book->judul_buku }}</td>
                                <td>{{ $row->tgl_pinjam }}</td>
                                <td>{{ $row->tgl_kembali }}</td>
                                <td>{{ $row->is_returned == 1 ? 'Dikembalikan' : 'Belum Dikembalikan' }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {!! $borrowers->render() !!}
            </div>
        </div>
    </div>
@stop
