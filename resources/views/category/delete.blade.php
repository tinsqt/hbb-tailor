<div class="modal fade" id="deleteModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body text-center">
                <img src="{{asset('images/thumbs-up.png')}}" class="img-responsive" style="float: left">
                <h3>Bạn có chắc muốn xóa?</h3>
                <div>
                    <form action="{{asset('category/'.$id)}}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="DELETE">
                        <div class="form-actions no-color">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                            <input type="submit" value="Xóa" class="btn btn-danger"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>