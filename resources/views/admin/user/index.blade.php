@extends('layouts.app')

@section('title', 'Buku - ')

@section('content')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
           Daftar User
           <a href="{{ route('user.create') }}" class="pull-right">Tambah User</a>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Sebagai</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = ($users->currentPage() - 1) * $users->perPage() + 1; ?>
                        @foreach ($users as $row)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->username }}</td>
                            @if ($row->is_admin())
                            <td><span class="label label-primary">Administrator</span></td>
                            @endif
                            @if ($row->is_member())
                            <td><span class="label label-success">Member/Siswa</span></td>
                            @endif
                            <td>
                                <a href="{{ route('user.edit', ['id'=>$row->id]) }}" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></a>
                                {!! Form::open(['url'=>route('user.destroy', ['id'=>$row->id]), 'method'=>'delete', 'style'=>'display:inline-block']) !!}
                                    <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {!! $users->render() !!}
        </div>
    </div>
</div>
@endsection
