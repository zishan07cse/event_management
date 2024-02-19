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
                        <th>Reviews</th>
                        <th>Status</th>
                        <th  style="width: 30%">Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>

@endsection

@include('modal.venue_modal')
<script type="text/javascript">
    function open_modal() {
        document.getElementById("add_venue").style.display = "block";
       
    }
    function close_venue_modal(){
        document.getElementById("add_venue").style.display = "none";
    }
    $(function() {
        var i = 1;
        var table = $('.data-table').DataTable({

            processing: true,
            serverSide: true,
            ajax: "{{ route('venues.index') }}",
            columns: [{
                    "render": function() {
                        return i++;
                    }
                },

                {
                    data: 'venue_image',
                    name: 'venue_image',
                    render: function(data, type, full, meta) {
                        if (data == "") {
                            return "Image Not found";
                        } else {
                            var image = '{{ URL::to('/') }}' + '/venue_images/' + data;
                            return '<img src="' + image +
                                '"  style="height:80px;width:100px;"/>';
                        }

                    }
                },

                {
                    data: 'venue_name',
                    name: 'venue_name'
                },
                {
                    data: 'venue_address',
                    name: 'venue_address'
                },
                {
                    data: 'status',
                    name: 'status',
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

    function show_venue(speaker_id) {

        get_data('show', speaker_id);
    }

    function update_venue(venue_id) {

        get_data('update', venue_id);
    }

    function get_data(type, venue_id) {
        //console.log(speaker_id);
        if (type == "show") {
            $("#view_venue").modal();
        } else {
            $("#update_venue").modal();
        }
        
        url = '{{ URL::to('/') }}' + '/admin/venues/' + venue_id + "/edit";
        console.log(url);
        $.ajax({
            type: 'GET',
            dataType: 'json',
            data: {
                id: venue_id,
                _token: '{!! csrf_token() !!}'
            },
            url: url,
            success: function(data) {
                console.log(data);
              
                var id = data.id;
                var name = data.venue_name;
                var address = data.venue_address;
                var image = data.venue_image;
                console.log(name+address+image);
                if (type == "show") {
                    document.getElementById("view_venue_name").value = name;
                    document.getElementById("view_venue_address").value = address;
                    document.getElementById("view_venue_image").src = '{{ URL::to('/') }}' + '/venue_images/' +
                        image;
                } else {
                    document.getElementById("id_venue_update").value = id;
                    document.getElementById("id_venue_name_update").value = name;
                    document.getElementById("id_venue_address_update").value = address;
                    document.getElementById("id_image_update").value = image;

                }

            }
        });
    }

    function delete_venue(venue_id) {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            delete_item(venue_id);
           
        });

    }

    function delete_item(venue_id) {
        $.ajax({
            url: '{{ URL::to('/') }}' + '/admin/venues/' + 'destroy',
            type: "POST",
            dataType: 'json',
            data: {
                id: venue_id,
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
        document.getElementById("add_speaker").style.display = "none";
        console.log('clicked');

    }
</script>

</html>
