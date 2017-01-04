@extends('layouts.app')

@section('title', 'Peminjam - ')

@section('content')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
           Hasil Cari kode : {{ $kode }}
        </div>
        <div class="panel-body">
            <form action="{{ route('borrower.search') }}" class="form-search" method="get">
                <div class="input-group">
                  <input type="search" class="form-control" placeholder="Cari kode peminjam..." name="c">
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="submit">Go!</button>
                  </span>
                </div><!-- /input-group -->
            </form>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Buku</th>
                            <th>Oleh</th>
                            <th>Kelas</th>
                            <th>Dari</th>
                            <th>Sampai</th>
                            <th>Kode Pinjaman</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = ($borrowers->currentPage() - 1) * $borrowers->perPage() + 1; ?>
                        @foreach ($borrowers as $row)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $row->book->judul_buku }}</td>
                            <td>{{ $row->student->user->name }}</td>
                            <td>{{ $row->student->kelas }}</td>
                            <td>{{ date('d M Y', strtotime($row->tgl_pinjam)) }}</td>
                            <td>{{ date('d M Y', strtotime($row->tgl_kembali)) }}</td>
                            <td>{{ $row->kode_pinjam }}</td>
                            <td>
                                {!! Form::open(['url'=>route('borrower.update', ['id'=>$row->id]), 'method'=>'put', 'style'=>'display:inline-block']) !!}
                                    <button class="btn btn-primary btn-sm"><i class="fa fa-sign-in" title="Kembalikan"></i></button>
                                {!! Form::close() !!}
                                {!! Form::open(['url'=>route('borrower.destroy', ['id'=>$row->id]), 'method'=>'delete', 'style'=>'display:inline-block']) !!}
                                    <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {!! $borrowers->render() !!}
        </div>
    </div>
</div>
@endsection
