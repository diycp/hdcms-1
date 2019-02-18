@extends('layouts.admin')
@section('content')
    <div class="clearfix">
        <div class="input-group">
            <a href="{{route('site.create')}}" class="btn btn-success">
                <i class="fa fa-plus"></i> 添加网站
            </a>
        </div>
    </div>
    <br>
    @foreach($sites as $site)
        <div class="card mb-2">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        <span>套餐:</span>
                    </div>
                    <div class="col-6 text-right">
                        <a href="{{route('site.show',$site)}}" class="text-muted">
                            <strong><i class="fa fa-cog"></i> 管理站点</strong>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-xs-4 col-md-1 text-dark">
                        <i class="fa fa-rss fa-4x"></i>
                    </div>
                    <div class="col-xs-4 col-md-5 text-dark">
                        <h4 class="pt-3">
                            <a href="{{route('site.show',$site)}}" class="text-dark">{{$site['name']}}</a>
                        </h4>
                    </div>
                    <div class="col-xs-4 col-md-6 text-right">
                        {{--<a href="javascript:;" data-toggle="tooltip" data-placement="top" title="接入状态: 接入成功">--}}
                        {{--<i class="fa fa-check-circle fa-2x text-info"></i>--}}
                        {{--</a>--}}
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted">
                <div class="row">
                    <div class="col-md-6 small">
                        @if ($site->admin)
                            到期时间 : {{$site->admin['admin_end']->format('Y-m-d')}}&nbsp;&nbsp;&nbsp;
                            站长 : <a href="">{{$site->admin['name']}}</a>
                        @endif
                    </div>
                    <div class="col-md-6 text-right small">
                        <a href="{{route('site.access',$site)}}" class="text-muted">
                            <i class="fa fa-key"></i> 站点权限
                        </a>&nbsp;&nbsp;&nbsp;
                        <a href="?s=system/site/wechat&step=wechat&siteid=11" class="text-muted">
                            <i class="fa fa-comment-o"></i> 微信公众号
                        </a>&nbsp;&nbsp;&nbsp;
                        <a href="{{route('site.user',$site)}}" class="text-muted">
                            <i class="fa fa-user"></i> 操作员管理
                        </a>&nbsp;&nbsp;&nbsp;
                        <a href="{{route('site.edit',$site)}}" class="text-muted mt-3">
                            <i class="fa fa-pencil-square-o"></i> 编辑
                        </a>&nbsp;&nbsp;&nbsp;
                        <a href="javascript:void(0)" onclick="destroy(this)" class="text-muted">
                            <i class="fa fa-trash"></i> 删除
                        </a>
                        <form action="{{route('site.destroy',$site)}}" method="post">
                            @csrf @method('DELETE')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
@push('js')
    <script>
        function destroy(bt) {
            require(['hdjs'], function (hdjs) {
                hdjs.confirm('确定删除站点吗？', function () {
                    $(bt).next('form').submit();
                });
            })
        }
    </script>
@endpush