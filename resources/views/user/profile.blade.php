@extends("layouts.master")
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <ol class="breadcrumb ">
                    <li>
                        <a href="{{asset('')}}">
                            <i class="material-icons">home</i> Trang chủ
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <i class="material-icons">library_books</i> Người dùng
                        </a>
                    </li>
                    <li class="active">
                        <i class="material-icons">archive</i> Thông tin
                    </li>
                </ol>
            </div>
            <!-- Body Copy -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header jsdemo-notification-button">

                            <button type="button" data-toggle="tooltip" title="Cập nhật"
                                    class="btn bg-green btn-circle-lg waves-effect waves-circle waves-float pull-right"
                                    data-placement="left" data-placement-from="top" data-placement-align="right"
                                    data-animate-enter="animated lightSpeedIn" data-animate-exit="animated lightSpeedOut"
                                    data-color-name="bg-blue" style="margin-top: -15px;">
                                <i class="material-icons">save</i>

                            </button>
                            <h2>Thông tin cá nhân</h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <h2 class="card-inside-title">Email</h2>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="Email đăng nhập" />
                                        </div>
                                    </div>
                                    <h2 class="card-inside-title">Họ tên</h2>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="Họ tên" />
                                        </div>
                                    </div>

                                    <h2 class="card-inside-title">Mật khẩu
                                        <span style="color: blue;font-size: 10px">  (Nếu để trống, mật khẩu sẽ không thay đổi)</span></h2>
                                    <div class="form-group">
                                        <div class="input-group form-line">
                                            <input type="password" class="form-control" name="password" maxlength="255" minlength="6"
                                                   aria-required="true" aria-invalid="true" value="" id="inputMatKhau" placeholder="!@#$%^">
                                            <div class="input-group-btn">
                                                <button style="margin-right: 0px" type="button" id="btnShowHidden" class="btn bg-deep-orange waves-effect">Hiển thị</button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-sm-6">
                                    <h2 class="card-inside-title">Số điện thoại</h2>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="Số điện thoại" />
                                        </div>
                                    </div>
                                    <h2 class="card-inside-title">Địa chỉ</h2>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="Địa chỉ" />
                                        </div>
                                    </div>
                                    <h2 class="card-inside-title">Giới tính</h2>
                                    <select class="form-control show-tick">
                                        <option value="">-- Please select --</option>
                                        <option value="0" selected>Nam</option>
                                        <option value="1">Nữ</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Body Copy -->

        </div>
    </section>
    @endsection
@section('js')

    @endsection