@include('admin.header')
@include('admin.nav')

        <!-- Content Start -->
<div class="container-fluid" id="content_box">
    <div class="row">

        <div class="col-xs-2" id="nav_left">
            <div id="side-wigVw4RU" class="list-group">
                <a class="list-group-item list-group-item-title">餐饮管理</a>
                <a href="/admin/food/index" class="list-group-item active"><i class="fa fa-list fa-fw"></i>餐饮列表</a>
            </div>
        </div>
        <div class="col-xs-10">
            <ol class="breadcrumb">
                <li>餐饮管理</li>
                <li class="active">餐饮列表</li>
            </ol>
            <a href="/admin/food/add" class="btn btn-primary" style="float: right"><i class="fa fa-plus fa-lg"></i>
                添加餐饮</a>

            <table class="table table-hover">
                <thead>
                <tr>
                    <th style="width: 60px;">ID</th>
                    <th style="width: 100px;">名称</th>
                    <th style="width: 80px;">类型</th>
                    <th style="width: 80px;">价格</th>
                    <th style="width: 80px;">供应时间</th>
                    <th style="width: 120px;">缩略图</th>
                    <th style="width: 80px;">更新时间</th>
                    <th style="width: 200px;">操作</th>
                </tr>
                </thead>
                <tbody>
                @forelse($food as $v)
                    <tr>
                        <td>{{ $v->id }}</td>
                        <td>{{ $v->name }}</td>
                        <td>{{ $v->type }}</td>
                        <td>{{ $v->price }}</td>
                        <td>{{ $v->supply_time }}</td>
                        <td><img height="100px" src="{{ $v->img }}" /></td>
                        <td>{{ $v->updated_at }}</td>
                        <td>
                            <a href="javascript:void(0)" onclick="deletes({{$v->id}})"> 删除</a>
                            <a href="{{ url('admin/food/'.$v->id.'/edit') }}" class="edit"> 修改</a>
                        </td>
                    </tr>
                @empty
                    <p>没有类容</p>
                @endforelse
                </tbody>
            </table>
            <div class="text-center">
                {!! $food->links() !!}
            </div>
        </div>

    </div>
</div>
<!-- Content End -->
<!-- footer -->
@include('admin.footer')
<script type="text/javascript">
    function deletes(id){
        if(confirm('确定删除！')){
            window.location.href= id+'/delete';
        }
    }
</script>