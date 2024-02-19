<div class="modal" id="add_hotel" style="display:none">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Hotel</h4>
                <button type="button" class="close" onclick="close_hotel_modal();" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
                <form action="{{ route('hotel.store') }}" method="post" enctype="multipart/form-data">
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
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Address <Picture></Picture>:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="address" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Reviews:</label>
                                <div class="input-group">
                                    <select class="form-control" name="review">
                                        <option>Select Reviews</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Description <Picture></Picture>:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="description" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="button" style="margin-top:30px" class="btn btn-danger" data-dismiss="modal"
                        onclick="close_hotel_modal();">Close</button>
                    <button type="submit" class="btn btn-success" style="float:right;margin-top:30px">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="update_hotel" style="display:none">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update Hotel</h4>
                <button type="button" class="close" onclick="close_modal();" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
                <form action="{{ route('hotel.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="input-group">
                            <input type="text" id="id_hotel_update" class="form-control" name="id"
                                style="display: none">
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Name:</label>
                                <div class="input-group">
                                    <input type="text" id="id_hotel_name_update" class="form-control" name="name"
                                        required>
                                </div>
                            </div>
                        </div>
                       
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Picture:</label><span class="special"> (*
                                    Image type jpg,jpeg,png)</span>
                                <div class="input-group">
                                    <input type="file" id="id_hotel_image_update" class="form-control" name="image"
                                        required>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Address <Picture></Picture>:</label>
                                <div class="input-group">
                                    <input type="text" id="id_hotel_address_update" class="form-control"
                                        name="address" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Reviews:</label>
                                <div class="input-group">
                                    <select class="form-control" id="id_hotel_review_update" 
                                    name="review">
                                        <option>Select Reviews</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Description <Picture></Picture>:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control"  id="id_hotel_description_update"
                                    name="description" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" style="margin-top:30px" class="btn btn-danger" data-dismiss="modal"
                        onclick="close_modal();">Close</button>
                    <button type="submit" class="btn btn-success"
                        style="float:right;margin-top:30px">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="view_hotel" style="display:none">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">View Hotel</h4>
                <button type="button" class="close" onclick="close_modal();" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Name:</label>
                            <div class="input-group">
                                <input type="text" id="view_hotel_name" class="form-control" name="name"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Address <Picture></Picture>:</label>
                            <div class="input-group">
                                <input type="text" id="view_hotel_address" class="form-control" name="address"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Description:</label>
                            <div class="input-group">
                                <input type="text" id="view_hotel_description" class="form-control" name="name"
                                    >
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Reviews:</label>
                            <div class="input-group">
                                <select class="form-control" id="view_hotel_review" name="review">
                                    <option>Select Reviews</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Profile Picture:</label>
                            <img src="" id="view_hotel_image" style="width:150px;height:150px;">
                        </div>
                    </div>
                </div>
                <button type="button" style="margin-top:30px" class="btn btn-danger" data-dismiss="modal"
                    onclick="close_modal();">Close</button>
            </div>
        </div>
    </div>
</div>
