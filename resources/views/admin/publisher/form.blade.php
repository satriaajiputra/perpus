<div class="form-group">
    <label class="control-label col-sm-3">Nama Penerbit</label>
    <div class="col-sm-9">
        {!! Form::text('nama', null, ['class'=>'form-control']) !!}
    </div>
</div>
<div class="form-group">
    <label class="control-label col-sm-3">Alamat Penerbit</label>
    <div class="col-sm-9">
        {!! Form::textarea('alamat', null, ['class'=>'form-control', 'rows'=>3]) !!}
    </div>
</div>
<div class="form-group">
    <label class="control-label col-sm-3"></label>
    <div class="col-sm-9">
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</div>
