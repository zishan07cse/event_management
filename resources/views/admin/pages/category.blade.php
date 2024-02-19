<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="{{ asset('js/jquery.min.js') }}"></script>

@extends('admin.layouts.master')
@section('title', 'Category')
@section('content')
    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 90px;
            height: 34px;
        }

        .switch input {
            display: none;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ca2222;
            -webkit-transition: .4s;
            transition: .4s;
            border-radius: 34px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
            border-radius: 50%;
        }

        input:checked+.slider {
            background-color: #2ab934;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(55px);
        }

        /*------ ADDED CSS ---------*/
        .slider:after {
            content: 'OFF';
            color: white;
            display: block;
            position: absolute;
            transform: translate(-50%, -50%);
            top: 50%;
            left: 50%;
            font-size: 10px;
            font-family: Verdana, sans-serif;
        }

        input:checked+.slider:after {
            content: 'ON';
        }

        /*--------- END --------*/
    </style>
    
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Category</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/manager/home">Home</a></li>
                            <li class="breadcrumb-item active">Category</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="col-sm-12">
            <ol class="float-sm-right">
                <button type="button" class="btn btn-block bg-gradient-primary" data-toggle="modal"
                    onclick="open_modal();"><i class="nav-icon fas fa fa-plus "></i> Add Category</button>
            </ol>

        </div>
        <div class="col-lg-3">
            @if (count($errors) > 0)
                <div class = "alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
        </div>
        <div class="content  table_style">
            <table class="table text-center table-bordered data-table" style="width: 100%;">
                <thead>
                    <tr>
                        <th style="width:10%">No</th>
                        <th style="width:15%">Name</th>
                        <th style="width:25%">Notes</th>
                        <th style="width:15%">Created</th>
                        <th style="width:10%">Status</th>
                        <th style="width:30%">Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>

@endsection
@include('modal.category_modal')

<script type="text/javascript">
    function open_modal() {
        document.getElementById("add_categories").style.display = "block";
        $("#add_categories").modal();
    }

    $(function() {
        var i = 1;
        var table = $('.data-table').DataTable({

            processing: true,
            serverSide: true,
            ajax: "{{ route('categories.index') }}",
            columns: [{
                    "render": function() {
                        return i++;
                    }
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'note',
                    name: 'note'
                },
                {
                    data: 'created_at',
                    name: 'created_at',
                    "render": function(data) {
                        if (data !== null) {
                            var javascriptDate = new Date(data);
                            javascriptDate = javascriptDate.getDate() + "/" + javascriptDate
                                .getMonth() + 1 + "/" +
                                javascriptDate.getFullYear();
                            return javascriptDate;
                        } else {
                            return "";
                        }
                    }
                },
                {
                    data: 'status',
                    name: 'status',
                    orderable: false,
                    searchable: false
                    /* render: function(data, type, full, meta) {
                        if (data == 0) {
                            return '<label class="switch"><input type="checkbox"  checked id="togBtn" name="switch" <div class="slider round"></span></div></label>';

                        } else {
                            return '<input type="checkbox" checked data-toggle="toggle" data-size="sm"> ';
                        }
                        //return data;
                        //return  data ? "active":"not active";
                    } */
                },


                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });

    });

    function show_category(categoty_id) {

        get_data('show', categoty_id);
    }

    function update_category(categoty_id) {

        get_data('update', categoty_id);
    }

    function get_data(type, categoty_id) {
        console.log(categoty_id);
        if (type == "show") {
            $("#show_categories").modal();
        } else {
            $("#update_categories").modal();
        }
        var url = '{{ URL::to('/') }}';


        url = url + '/caegories/' + categoty_id + "/edit";
        console.log(url);
        //return;
        $.ajax({
            type: 'GET',
            dataType: 'json',
            data: {
                id: categoty_id,
                _token: '{!! csrf_token() !!}'
            },
            url: url,
            success: function(data) {
                console.log(data);
                var id = data.id;
                var name = data.name;
                var note = data.note;
                if (type == "show") {
                    document.getElementById("show_category_name").value = name;
                    document.getElementById("show_category_note").value = id;
                } else {
                    document.getElementById("update_category_id").value = id;
                    document.getElementById("update_category_name").value = name;
                    document.getElementById("update_category_note").value = note;
                }

            }
        });
    }

    function delete_category(categoty_id) {
        console.log(categoty_id);
        $.ajax({
            url: "http://127.0.0.1:8003/admin/categories/destroy",
            type: "POST",
            dataType: 'json',
            data: {
                id: categoty_id,
                _method: 'DELETE',
                _token: '{!! csrf_token() !!}'
            },
            beforeSend: function() {},
            complete: function() {},
            success: function(data) {
                Swal.fire({
                    title: "Good job!",
                    text: data.success,
                    icon: "success",
                    showConfirmButton: false,
                    confirmButtonText: false
                });
                location.reload();
            },
            error: function() {

            }
        });
    }

    $(document).on('change', '.switch_status', function() {
        var status = $(this).prop('checked') == true ? 1 : 0;
        var id = $(this).attr('data-id');
         $.ajax({
            url: "{{ route('categories.change_status') }}",
            type: "POST",
            data: {
                id: id,
                status:status,
                _token: '{!! csrf_token() !!}'
            },
            success: function(data) {
                console.log(data);
                Swal.fire({
                    title: "Good job!",
                    text: data.success,
                    icon: "success",
                    showConfirmButton: false,
                    confirmButtonText: false
                });
                location.reload();
            },
            
            error: function(data) {
                console.log(data);
            }
        });  
    });
</script>

</html>
