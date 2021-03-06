@include('home.header')
<body>
<div class="container">
    <!-- top-->
    <section class="ich-header">
        <!--navbar-->
        @include('home.nav')
    </section>
    <!--content-->

    <section class="content">
        <div class="paging-dome">
            <div class=" ich-mes room-mes">
                <div class="room-mes-box">
                    <h2>个人中心</h2>
                </div>
            </div>
        </div>
        <div class="bgo-content ">
            @include('home.member.aside')
                    <!-- sidebar menu end-->
            <div class="col-xs-8 mt55 member-content">
                <p><span>全部订单<i></i></span></p>
                <div class="form-group b-none">
                    <span>在线咨询：(86)(23) 6380 6666</span>
                </div>
                <div class="table">
                    <table>
                        <thead>
                        <th>订单编号</th>
                        <th>入住日期</th>
                        <th>退房日期</th>
                        <th>房间类型</th>
                        <th>数量</th>
                        <th>成人</th>
                        <th>儿童</th>
                        <th>金额</th>
                        <th>联系电话</th>
                        <th>订购时间</th>
                        </thead>
                        <tbody>
                        @foreach($orderList as $v)
                        <tr>
                            <td>{{$v->order}}</td>
                            <td>{{$v->get_time}}</td>
                            <td>{{$v->out_time}}</td>
                            <td>{{$v->roomOrder->type}}</td>
                            <td>{{$v->room_amount}}</td>
                            <td>{{$v->man_amount}}</td>
                            <td>{{$v->children_amount}}</td>
                            <td>{{$v->total_money}}</td>
                            <td>{{$v->phone}}</td>
                            <td>{{$v->created_at}}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

        <div class="clearfix"></div>
        <div class="line"></div>
    </section>
    <!-- footer-->
@include('home.footer')