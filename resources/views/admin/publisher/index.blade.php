@extends('layouts.app')

@section('title', 'Penerbit - ')

@section('content')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
           Daftar Penerbit
           <a href="{{ route('publisher.create') }}" class="pull-right">Tambah Penerbit</a>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Penerbit</th>
                            <th>Alamat</th>
                            <th>Buku</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = ($publishers->currentPage() - 1) * $publishers->perPage() + 1; ?>
                        @foreach ($publishers as $row)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $row->nama }}</td>
                            <td>{{ $row->alamat }}</td>
                            <td>{{ $row->books->count() }}</td>
                            <td>
                                <a href="{{ route('publisher.edit', ['id'=>$row->id]) }}" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></a>
                                {!! Form::open(['url'=>route('publisher.destroy', ['id'=>$row->id]), 'method'=>'delete', 'style'=>'display:inline-block']) !!}
                                    <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {!! $publishers->render() !!}
        </div>
    </div>
</div>
@endsection
