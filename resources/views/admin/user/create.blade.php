@extends('layouts.app')

@section('title', 'Tambah Penerbit - ')

@section('content')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
           Tambah Buku
        </div>
        <div class="panel-body">
            {!! Form::open(['route'=>'user.store', 'method'=>'POST', 'class'=>'form-horizontal']) !!}
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
