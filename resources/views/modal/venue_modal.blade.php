<div class="modal" id="add_venue" style="display:none">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Venue</h4>
                <button type="button" class="close" onclick="close_venue_modal();" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
                <form action="{{ route('venues.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Name:</label>
                                <div class="input-group">
                                    <input type="text" id="name" class="form-control" name="name" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Picture:</label><span class="special"> (*
                                    Image type jpg,jpeg,png)</span>
                                <div class="input-group">
                                    <input type="file" id="mobile" class="form-control" name="image" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Address <Picture></Picture>:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="address" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="button" style="margin-top:30px" class="btn btn-danger" data-dismiss="modal"
                        onclick="close_venue_modal();">Close</button>
                    <button type="submit" class="btn btn-success" style="float:right;margin-top:30px">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="update_venue" style="display:none">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update Venue</h4>
                <button type="button" class="close" onclick="close_modal();" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
                <form action="{{ route('venues.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="input-group">
                            <input type="text" id="id_venue_update" class="form-control" name="id" 
                            style="display: none">
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Name:</label>
                                <div class="input-group">
                                    <input type="text" id="id_venue_name_update" class="form-control" name="name" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Address <Picture></Picture>:</label>
                                <div class="input-group">
                                    <input type="text" id="id_venue_address_update" class="form-control" name="address" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Picture:</label><span class="special"> (*
                                    Image type jpg,jpeg,png)</span>
                                <div class="input-group">
                                    <input type="file" id="id_image_uodate" 
                                    class="form-control" name="image" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" style="margin-top:30px" class="btn btn-danger" data-dismiss="modal"
                        onclick="close_modal();">Close</button>
                    <button type="submit" class="btn btn-success" style="float:right;margin-top:30px">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="view_venue" style="display:none">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">View Venue</h4>
                <button type="button" class="close" onclick="close_modal();" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Name:</label>
                            <div class="input-group">
                                <input type="text" id="view_venue_name" class="form-control" name="name"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Address <Picture></Picture>:</label>
                            <div class="input-group">
                                <input type="text" id="view_venue_address" class="form-control" name="address"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Profile Picture:</label>
                            <img src="" id="view_venue_image" style="width:150px;height:150px;">
                        </div>
                    </div>
                </div>


                <button type="button" style="margin-top:30px" class="btn btn-danger" data-dismiss="modal"
                    onclick="close_modal();">Close</button>
            </div>
        </div>
    </div>
</div>
