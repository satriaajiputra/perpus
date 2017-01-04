@extends('layouts.app')

@section('title', 'Edit Penerbit - ')

@section('content')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
           Edit Buku : {{ $book->judul_buku }}
        </div>
        <div class="panel-body">
            {!! Form::model($book, ['url'=>route('book.update',['id'=>$book->id]), 'method'=>'PUT', 'class'=>'form-horizontal']) !!}
                @include('admin.book.form')
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
