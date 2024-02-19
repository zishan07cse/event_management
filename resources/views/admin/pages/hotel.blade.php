<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="{{ asset('js/jquery.min.js') }}"></script>
@extends('admin.layouts.master')
@section('title', 'Hotels')
@section('content')

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Venues</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/admin/home">Home</a></li>
                            <li class="breadcrumb-item active">Venues</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="col-sm-12">
            <ol class="float-sm-right">
                <button type="button" class="btn btn-block bg-gradient-primary" data-toggle="modal"
                    onclick="open_modal();"><i class="nav-icon fas fa fa-plus "></i> Add Hotel</button>
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
        <div class="content  table_style ">
            <table class="table text-center table-bordered data-table" style="width: 100%;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Picture</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Hotel Reviews</th>
                        <th>Hotel Description</th>
                        <th>Status</th>
                        <th  style="width: 25%">Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>

@endsection

@include('modal.hotel_modal')
<script type="text/javascript">
    function open_modal() {
        document.getElementById("add_hotel").style.display = "block";
       
    }
    function close_hotel_modal(){
        document.getElementById("add_hotel").style.display = "none";
    }
    $(function() {
        var i = 1;
        var table = $('.data-table').DataTable({

            processing: true,
            serverSide: true,
            ajax: "{{ route('hotel.index') }}",
            columns: [{
                    "render": function() {
                        return i++;
                    }
                },

                {
                    data: 'hotel_image',
                    name: 'hotel_image',
                    render: function(data, type, full, meta) {
                        console.log(data);
                        if (data == "") {
                            return "Image Not found";
                        } else {
                            var image = '{{ URL::to('/') }}' + '/hotel_image/' + data;
                            return '<img src="' + image +
                                '"  style="height:80px;width:100px;"/>';
                        }

                    }
                },

                {
                    data: 'hotel_name',
                    name: 'hotel_name'
                },
                {
                    data: 'hotel_address',
                    name: 'hotel_address'
                },
                {
                    data: 'hotel_review',
                    name: 'hotel_review',
                    render: function(data, type, full, meta) {
                        return '<span class="fa fa-star checked"></span>'.repeat(data);

                    }
                },
                {
                    data: 'hotel_description',
                    name: 'hotel_description'
                },
                {
                    data: 'status',
                    name: 'status',
                    // "fnDrawCallback": function( row ) {
                    //     $('#toggle-demo').bootstrapToggle();
   
                    render: function(data, type, full, meta) {
                        if (data == 1) {
                            var val = 'active';
                            return '<span style="color:red">' + val + '</span>';

                        } else {
                            var val = 'not active';
                            return '<span style="color:green">' + val + '</span>';
                        }
                        //return  data ? "active":"not active";
                    }

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

    function show_hotel(speaker_id) {

        get_data('show', speaker_id);
    }

    function update_hotel(hotel_id) {

        get_data('update',hotel_id);
    }

    function get_data(type,hotel_id) {
        //console.log(speaker_id);
        if (type == "show") {
            $("#view_hotel").modal();
        } else {
            $("#update_hotel").modal();
        }
        
        url = '{{ URL::to('/') }}' + '/admin/hotel/' + hotel_id + "/edit";
        //console.log(url);
        $.ajax({
            type: 'GET',
            dataType: 'json',
            data: {
                id: hotel_id,
                _token: '{!! csrf_token() !!}'
            },
            url: url,
            success: function(data) {
                //console.log(data);
              
                var id = data.id;
                var name = data.hotel_name;
                var address = data.hotel_address;
                var image = data.hotel_image;
                var rating = data.hotel_rating;
                var description = data.hotel_description;
                var review = data.hotel_review;
                console.log(description);
                if (type == "show") {
                    document.getElementById("view_hotel_name").value = name;
                    document.getElementById("view_hotel_address").value = address;
                    document.getElementById("view_hotel_description").value = description;
                    $("#view_hotel_review").val(review);
                    document.getElementById("view_hotel_image").src = '{{ URL::to('/') }}' + '/hotel_image/' +
                        image;
                } else {
                    document.getElementById("id_hotel_update").value = id;
                    document.getElementById("id_hotel_name_update").value = name;
                    document.getElementById("id_hotel_address_update").value = address;
                    document.getElementById("id_hotel_description_update").value = description;
                     $("#id_hotel_review_update").val(review);

                }

            }
        });
    }

    function delete_hotel(hotel_id) {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            delete_item(hotel_id);
           
        });

    }

    function delete_item(hotel_id) {
        $.ajax({
            url: '{{ URL::to('/') }}' + '/admin/hotel/' + 'destroy',
            type: "POST",
            dataType: 'json',
            data: {
                id: hotel_id,
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

    function close_modal() {
        document.getElementById("add_hotel").style.display = "none";
    }
</script>

</html>
