@extends('layouts.app')

@section('title', 'Buku - ')

@section('content')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
           Daftar Buku
           <a href="{{ route('book.create') }}" class="pull-right">Tambah Buku</a>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Buku</th>
                            <th>Penerbit</th>
                            <th>Kode Buku</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = ($books->currentPage() - 1) * $books->perPage() + 1; ?>
                        @foreach ($books as $row)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $row->judul_buku }}</td>
                            <td>{{ $row->publisher->nama }}</td>
                            <td>{{ $row->kode_buku }}</td>
                            <td>
                                <a href="{{ route('book.edit', ['id'=>$row->id]) }}" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></a>
                                {!! Form::open(['url'=>route('book.destroy', ['id'=>$row->id]), 'method'=>'delete', 'style'=>'display:inline-block']) !!}
                                    <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {!! $books->render() !!}
        </div>
    </div>
</div>
@endsection
