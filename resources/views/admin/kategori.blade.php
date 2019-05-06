@extends('admin')
@section('body')
@include('message')
<div class="panel-body">
    <button type="button" style="background: #2196f3; color: #e3f2fd;" class="btn btn-default add-modal">Add a Kategori</button>
    <hr>
    <table class="table table-striped table-bordered table-hover" id="postTable" style="visibility: hidden;">
        <thead>
            <tr>
                <th valign="middle">ID</th>
                <th>Nama Kategori</th>
                <th>Actions</th>
            </tr>
            {{ csrf_field() }}
        </thead>
        <tbody>
            @foreach($kategoris as $kategori)
            <tr class="item{{$kategori->id}}">
                <td>{{$kategori->id}}</td>
                <td>{{$kategori->nama_kategori}}</td>
                <td>
                    <button class="edit-modal btn btn-info" data-id="{{$kategori->id}}" data-kategori="{{$kategori->nama_kategori}}">
                        <span class="glyphicon glyphicon-edit"></span> Edit</button>
                    <button class="delete-modal btn btn-danger" data-id="{{$kategori->id}}" data-kategori="{{$kategori->nama_kategori}}">
                        <span class="glyphicon glyphicon-trash"></span> Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div><!-- /.panel-body -->

<!-- Modal form to add a post -->
<div id="addModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" enctype="multipart/form-data" role="form" method="post" action="kategori">
                    @csrf
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="kategori">Nama Kategori:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="kategori" autofocus>
                            <p class="errorKategori text-center alert alert-danger hidden"></p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success add">
                            <span id="" class='glyphicon glyphicon-check'></span> Add Kategori
                        </button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'></span> Close
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal form to edit a form -->
<div id="editModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="id">ID:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id_edit" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="kategori">Nama Kategori:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="kategori_edit" autofocus>
                            <p class="errorKategori text-center alert alert-danger hidden"></p>
                        </div>
                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary edit" data-dismiss="modal">
                        <span class='glyphicon glyphicon-check'></span> Edit
                    </button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">
                        <span class='glyphicon glyphicon-remove'></span> Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal form to delete a form -->
<div id="deleteModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <h3 class="text-center">Are you sure you want to delete the following post?</h3>
                <br />
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="id">ID:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id_delete" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="kategori">Nama Kategori:</label>
                        <div class="col-sm-10">
                            <input type="name" class="form-control" id="kategori_delete" disabled>
                        </div>
                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger delete" data-dismiss="modal">
                        <span id="" class='glyphicon glyphicon-trash'></span> Delete
                    </button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">
                        <span class='glyphicon glyphicon-remove'></span> Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('js')
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>

<!-- Bootstrap JavaScript -->
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.1/js/bootstrap.min.js"></script>

<!-- toastr notifications -->
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<!-- icheck checkboxes -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>

<!-- Delay table load until everything else is loaded -->
<script>
    $(window).load(function() {
        $('#postTable').removeAttr('style');
    })
</script>

<!-- AJAX CRUD operations -->
<script type="text/javascript">
    // add a new post
    $(document).on('click', '.add-modal', function() {
        $('.modal-title').text('Add');
        $('#addModal').modal('show');
    });


    // Edit a post
    $(document).on('click', '.edit-modal', function() {
        $('.modal-title').text('Edit');
        $('#id_edit').val($(this).data('id'));
        $('#kategori_edit').val($(this).data('kategori'));
        id = $('#id_edit').val();
        $('#editModal').modal('show');
    });
    $('.modal-footer').on('click', '.edit', function() {
        $.ajax({
            type: 'PUT',
            url: 'kategori/' + id,
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $("#id_edit").val(),
                'kategori': $('#kategori_edit').val()
            },
            success: function(data) {
                $('.errorKategori').addClass('hidden');
                if ((data.errors)) {
                    setTimeout(function() {
                        $('#editModal').modal('show');
                        toastr.error('Validation error!', 'Error Alert', {
                            timeOut: 5000
                        });
                    }, 500);

                    if (data.errors.kategori) {
                        $('.errorKategori').removeClass('hidden');
                        $('.errorKategori').text(data.errors.kategori);
                    }
                } else {
                    toastr.success('Successfully updated Post!', 'Success Alert', {
                        timeOut: 5000
                    });
                    $('.item' + data.id).replaceWith("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.nama_kategori + "</td><td><button class='edit-modal btn btn-info' data-id='" + data.id + "' data-kategori='" + data.nama_kategori + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-kategori='" + data.nama_kategori + "'><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
                }
            }
        });
    });

    // delete a post
    $(document).on('click', '.delete-modal', function() {
        $('.modal-title').text('Delete');
        $('#id_delete').val($(this).data('id'));
        $('#kategori_delete').val($(this).data('kategori'));
        $('#deleteModal').modal('show');
        id = $('#id_delete').val();
    });
    $('.modal-footer').on('click', '.delete', function() {
        $.ajax({
            type: 'DELETE',
            url: 'kategori/' + id,
            data: {
                '_token': $('input[name=_token]').val(),
            },
            success: function(data) {
                toastr.success('Successfully deleted Post!', 'Success Alert', {
                    timeOut: 5000
                });
                $('.item' + data['id']).remove();
            }
        });
    });
</script>
@stop