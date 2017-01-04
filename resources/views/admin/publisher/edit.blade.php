@extends('layouts.app')

@section('title', 'Edit Penerbit - ')

@section('content')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
           Edit Penerbit : {{ $publisher->nama }}
        </div>
        <div class="panel-body">
            {!! Form::model($publisher, ['url'=>route('publisher.update',['id'=>$publisher->id]), 'method'=>'PUT', 'class'=>'form-horizontal']) !!}
                @include('admin.publisher.form')
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
