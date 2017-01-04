@extends('layouts.app')

@section('title', 'Peminjam')

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">Daftar Buku</div>
            <div class="panel-body">
                {!! Form::open(['route'=>'peminjam.store', 'method'=>'post',  'class'=>'form-horizontal']) !!}
                    <div class="form-group">
                        <label class="control-label col-sm-3">Kode Buku</label>
                        <div class="col-sm-9">
                            {!! Form::text('kode_buku', null, ['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Dipinjam Sampai</label>
                        <div class="col-sm-9">
                            {!! Form::date('tgl_kembali', null, ['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Dipinjam Sampai</label>
                        <div class="col-sm-9">
                            <button class="btn btn-primary">Pinjam</button>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop
