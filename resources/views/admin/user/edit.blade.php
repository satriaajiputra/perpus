@extends('layouts.app')

@section('title', 'Edit Penerbit - ')

@section('content')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
           Edit Buku : {{ $user->name }}
        </div>
        <div class="panel-body">
            {!! Form::model($user->student, ['url'=>route('user.update',['id'=>$user->id]), 'method'=>'PUT', 'class'=>'form-horizontal']) !!}
                @include('admin.user.form')
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection

@section('footer-scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $('#role').on('change', function() {
            if($(this).val() == '1') {
                $('#kelas').parents('.form-group').slideUp();
                $('#telp').parents('.form-group').slideUp();
                $('#alamat').parents('.form-group').slideUp();
            } else {
                $('#kelas').parents('.form-group').slideDown();
                $('#telp').parents('.form-group').slideDown();
                $('#alamat').parents('.form-group').slideDown();
            }
        });
    });
</script>
@stop
