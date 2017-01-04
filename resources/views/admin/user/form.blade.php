    <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
        <label for="role" class="col-md-4 control-label">Peran</label>
        <div class="col-md-6">
            {!! Form::select('role', [0=>'Member', 1=>'Administrator'], null, ['class'=>'form-control', 'id'=>'role', 'placeholder'=>'Pilih peran user']) !!}

            @if ($errors->has('role'))
                <span class="help-block">
                    <strong>{{ $errors->first('role') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="name" class="col-md-4 control-label">Name</label>

        <div class="col-md-6">
            {!! Form::text('name', $user->name, ['class'=>'form-control', 'id'=>'name']) !!}

            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
        <label for="username" class="col-md-4 control-label">Username</label>

        <div class="col-md-6">
            {!! Form::text('username', $user->username, ['class'=>'form-control', 'id'=>'username', 'disabled']) !!}

            @if ($errors->has('username'))
                <span class="help-block">
                    <strong>{{ $errors->first('username') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('old_pass') ? ' has-error' : '' }}">
        <label for="old_pass" class="col-md-4 control-label">Password Lama</label>

        <div class="col-md-6">
            <input id="old_pass" type="password" class="form-control" name="old_pass" >

            @if ($errors->has('old_pass'))
                <span class="help-block">
                    <strong>{{ $errors->first('old_pass') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label for="password" class="col-md-4 control-label">Password</label>

        <div class="col-md-6">
            <input id="password" type="password" class="form-control" name="password" >

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group">
        <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

        <div class="col-md-6">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" >
        </div>
    </div>

    <div class="form-group{{ $errors->has('kelas') ? ' has-error' : '' }}">
        <label for="kelas" class="col-md-4 control-label">Kelas</label>

        <div class="col-md-6">
            {!! Form::select('kelas', [10=>'X',11=>'XI',12=>'XII'], null, ['class'=>'form-control', 'id'=>'kelas', 'placeholder'=>'Pilih kelas']) !!}

            @if ($errors->has('kelas'))
                <span class="help-block">
                    <strong>{{ $errors->first('kelas') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('telp') ? ' has-error' : '' }}">
        <label for="telp" class="col-md-4 control-label">No Telp</label>

        <div class="col-md-6">
            {!! Form::text('telp', null, ['class'=>'form-control', 'id'=>'telp']) !!}

            @if ($errors->has('telp'))
                <span class="help-block">
                    <strong>{{ $errors->first('telp') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
        <label for="alamat" class="col-md-4 control-label">Alamat</label>

        <div class="col-md-6">
            {!! Form::textarea('alamat', null, ['class'=>'form-control', 'rows'=>3, 'id'=>'alamat']) !!}

            @if ($errors->has('alamat'))
                <span class="help-block">
                    <strong>{{ $errors->first('alamat') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
                Tambahkan
            </button>
        </div>
    </div>
