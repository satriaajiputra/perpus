@extends('layouts.app')

@section('title', 'Tambah Penerbit - ')

@section('content')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
           Tambah Buku
        </div>
        <div class="panel-body">
            {!! Form::open(['route'=>'book.store', 'method'=>'POST', 'class'=>'form-horizontal']) !!}
                @include('admin.book.form')
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
