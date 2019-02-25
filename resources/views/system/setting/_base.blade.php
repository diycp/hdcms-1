<div class="card">
    <div class="card-header">
        基本配置
    </div>
    <div class="card-body">
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-1 col-form-label text-right">
                后台标志
                <small class="text-secondary">(logo)</small>
            </label>
            <div class="col-sm-8">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="logo" value="{{$config['logo']??asset('images/logo.png')}}">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" onclick="uploadImage('logo')" type="button">选择图片</button>
                    </div>
                </div>
                <small class="text-muted">后台系统管理界面的标志</small>
                <div class="input-group">
                    <img src="{{$config['logo']??asset('images/logo.png')}}" class="img-thumbnail d-block"
                         id="logo-img" style="background: #dcdcdc;">
                </div>
            </div>
        </div>
    </div>
</div>