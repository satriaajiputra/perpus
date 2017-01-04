<div class="form-group">
    <label class="control-label col-sm-3">Nama Penerbit</label>
    <div class="col-sm-9">
        {!! Form::select('publisher_id', $publishers,null, ['class'=>'form-control', 'placeholder'=>'Pilih nama penerbit']) !!}
    </div>
</div>
<div class="form-group">
    <label class="control-label col-sm-3">Judul Buku</label>
    <div class="col-sm-9">
        {!! Form::text('judul_buku', null, ['class'=>'form-control']) !!}
    </div>
</div>
<div class="form-group">
    <label class="control-label col-sm-3">Kode Buku</label>
    <div class="col-sm-9">
        {!! Form::text('kode_buku', null, ['class'=>'form-control']) !!}
    </div>
</div>
<div class="form-group">
    <label class="control-label col-sm-3"></label>
    <div class="col-sm-9">
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</div>
