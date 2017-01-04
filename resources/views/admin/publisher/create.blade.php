@extends('layouts.app')

@section('title', 'Tambah Penerbit - ')

@section('content')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
           Tambah Penerbit
        </div>
        <div class="panel-body">
            {!! Form::open(['route'=>'publisher.store', 'method'=>'POST', 'class'=>'form-horizontal']) !!}
                @include('admin.publisher.form')
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
