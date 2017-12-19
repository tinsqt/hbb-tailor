@extends('layouts.master')
@section('content')
    <section class="content">
        <div class="container-fluid">

            <div class="block-header">

                <div class="row clearfix pull-left">
                    <ol class="breadcrumb ">
                        <li>
                            <a href="javascript:void(0);">
                                <i class="material-icons">home</i> Home
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <i class="material-icons">library_books</i> Library
                            </a>
                        </li>
                        <li class="active">
                            <i class="material-icons">archive</i> Data
                        </li>
                    </ol>
                </div>
                <h2 class="pull-right">
                    DANH SÁCH
                </h2>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header jsdemo-notification-button">
                            <a href="{{asset('')}}" type="button" data-toggle="tooltip" title="Trở về trang chủ"
                               data-placement="right"
                               class="btn bg-red btn-circle-lg waves-effect waves-circle waves-float">

                                <i class="material-icons">home</i>

                            </a>
                            <button type="button" data-toggle="tooltip" title="Thêm mới"
                                    class="btn bg-teal btn-circle-lg waves-effect waves-circle waves-float pull-right"
                                    data-placement="left" data-placement-from="top" data-placement-align="right"
                                    data-animate-enter="animated lightSpeedIn"
                                    data-animate-exit="animated lightSpeedOut"
                                    data-color-name="bg-blue">
                                <i class="material-icons">add_box</i>
                            </button>

                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Avatar</th>
                                        <th>Tên loại (vi)</th>
                                        <th>Tên loại (en)</th>
                                        <th>Trạng thái</th>
                                        {{--<th>Age</th>--}}
                                        {{--<th>Start date</th>--}}
                                        {{--<th>Trạng thái</th>--}}
                                        <th style="width: 15%">...</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Avatar</th>
                                        <th>Tên loại (vi)</th>
                                        <th>Tên loại (en)</th>
                                        <th>Trạng thái</th>
                                        {{--<th>Age</th>--}}
                                        {{--<th>Start date</th>--}}
                                        {{--<th style="width: 10%">Trạng thái</th>--}}
                                        <th style="width: 15%">...</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach($list as $item)
                                        <tr>
                                            <td style="text-align: left; vertical-align: middle">{{$loop->iteration}}</td>
                                            <td style="text-align: left; vertical-align: middle">
                                                <img src="{{asset('images/category/'.$item->avatar)}}"
                                                     style="width: 75px">
                                            </td>
                                            <td style="text-align: left; vertical-align: middle">
                                                {{tomtat($item->get_language(1)->name,40)}}
                                            </td>
                                            <td style="text-align: left; vertical-align: middle">
                                                {{tomtat($item->get_language(2)->name,40)}}
                                            </td>
                                            <td style="text-align: left; vertical-align: middle">
                                                <div class="switch">
                                                    <label>
                                                        <input type="checkbox" @if($item->status) checked @endif>
                                                        <span class="lever switch-col-red"></span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td class="text-center" style="vertical-align: middle">

                                                <input type="hidden" name="_method">
                                                <div class="btn-group js-sweetalert">
                                                    <a type="button" class="btn btn-warning waves-effect"
                                                       title="Cập nhật"
                                                       data-placement="top" data-toggle="tooltip">
                                                        <i class="material-icons">create</i>
                                                    </a>
                                                    @if($loop->count > 2)
                                                        {{--<form method="post" action="{{asset('category/'.$item->id)}}">--}}
                                                            {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
                                                            <a href="{{asset('delete-category/'.$item->id)}}"
                                                               class="button btn btn-danger waves-effect deletelink"
                                                               data-id="{{$item->id}}" data-toggle="tooltip"
                                                               data-placement="top" title="Xóa">
                                                                {{--<button type="submit" class="btn btn-danger waves-effect" title="Xóa"--}}
                                                                {{--data-toggle="tooltip" data-placement="top" data-type="with-custom-icon">--}}
                                                                <i class="material-icons">delete_forever</i>
                                                            </a>
                                                            {{--</button>--}}
                                                        {{--</form>--}}
                                                        {{--<a href="{{asset('category/'.$item->id)}}"--}}
                                                           {{--class="btn btn-xs btn-danger deletelink"><span--}}
                                                                    {{--class="glyphicon glyphicon-trash"></span> Delete</a>--}}

                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->

        </div>
    </section>
@endsection
@section('js')
    <script>
        $('.deletelink').click(function (e) {
            var a_href = $(this).attr('href');
            e.preventDefault();
            $.ajax({
                url: a_href,
                type: 'GET',
                contentType: 'application/json; charset=utf-8',
                success: function (data) {
                    $('.body-content').prepend(data);
                    $('#deleteModal').modal('show');
                }
            });
        })
    </script>
    {{--<script>--}}
        {{--$(document).on('click', '.button', function (e) {--}}
            {{--e.preventDefault();--}}
            {{--var id = $(this).data('id');--}}
            {{--swal({--}}
                    {{--title: "Bạn chắc chắn muốn xóa?",--}}
                    {{--type: "error",--}}
                    {{--confirmButtonClass: "btn-danger",--}}
                    {{--confirmButtonText: "Đồng ý!",--}}
                    {{--cancelButtonText: "Đóng!",--}}
                    {{--showCancelButton: true,--}}
                {{--},--}}
                {{--function () {--}}
                    {{--$.ajax({--}}
                        {{--type: "POST",--}}
                        {{--url: "{{url('category/'.$item->id)}}",--}}
                        {{--data: {id: id},--}}
                        {{--success: function (data) {--}}
                            {{--//--}}
                        {{--}--}}
                    {{--});--}}
                {{--});--}}
        {{--});--}}
    {{--</script>--}}
@endsection