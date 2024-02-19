<div class="modal" id="add_speaker" style="display:none">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Speaker</h4>
                <button type="button" class="close" onclick="close_modal();" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
                <form action="{{ route('speakers.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Name:</label>
                                <div class="input-group">
                                    <input type="text" id="name" class="form-control" name="name" 
                                    required>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Email:</label>
                                <div class="input-group">
                                    <input type="email" id="email" class="form-control" name="email"
                                    required>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Picture:</label><span class="special"> (* 
                                    Image type jpg,jpeg,png)</span>
                                <div class="input-group">
                                    <input type="file" id="mobile" 
                                    class="form-control" name="image" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Mobile:</label>
                                <div class="input-group">
                                    <input type="mobile" id="mobile" 
                                    class="form-control" name="mobile"
                                    required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Address <Picture></Picture>:</label>
                                <div class="input-group">
                                    <input type="text" id="id_address" 
                                    class="form-control" name="address" required>
                                </div>
                            </div>
                        </div>
                    </div>   
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Short Bio:</label>
                                <div class="input-group">
                                    <textarea id="description" required class="form-control" name="description" rows="4" 
                                    cols="50">
                                     
                                      </textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" style="margin-top:30px" class="btn btn-danger"
                        data-dismiss="modal" onclick="close_modal();">Close</button>
                    <button type="submit" class="btn btn-success" style="float:right;margin-top:30px">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="update_speaker" style="display:none">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update Speaker</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body"> 
                <form action="{{ route('speakers.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" id="id_update" class="form-control" name="id" 
                                style="display: none">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Name:</label>
                                <div class="input-group">
                                    <input type="text" id="id_name_update" class="form-control" name="name" 
                                    required>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Email:</label>
                                <div class="input-group">
                                    <input type="email" id="id_email_update" class="form-control" name="email"
                                    required>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Mobile:</label>
                                <div class="input-group">
                                    <input type="text" id="id_mobile_update" class="form-control" name="mobile">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Address <Picture></Picture>:</label>
                                <div class="input-group">
                                    <input type="text" id="id_address_update" class="form-control" name="address">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Picture:</label><span class="special"> (* 
                                    Image type jpg,jpeg,png)</span>
                                <div class="input-group">
                                    <input type="file" id="id_image_update" class="form-control" name="image">
                                </div>
                               
                            </div>
                        </div>
                       
                    </div>
                    {{-- <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Short Bio:</label>
                                <div class="input-group">
                                    <textarea id="id_description_update" class="form-control" name="description" rows="4" 
                                    cols="50">
                                     
                                      </textarea>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <button type="button" style="margin-top:30px" class="btn btn-danger"
                        data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" style="float:right;margin-top:30px">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="view_speaker" style="display:none">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">View Speaker</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
                
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Name:</label>
                                <div class="input-group">
                                    <input type="text" id="view_name" class="form-control" name="name" 
                                    disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Email:</label>
                                <div class="input-group">
                                    <input type="email" id="view_email" class="form-control" name="email"
                                    disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Mobile:</label>
                                <div class="input-group">
                                    <input type="text" id="view_mobile" class="form-control" disabled name="mobile">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Address <Picture></Picture>:</label>
                                <div class="input-group">
                                    <input type="text" id="view_address" disabled class="form-control" name="address">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Profile Picture:</label>
                                 <img src="" id="view_image" style="width:150px;height:150px;">
                               
                            </div>
                        </div>
                        
                    </div>
                    {{-- <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Short Bio:</label>
                                <div class="input-group">
                                    <textarea id="description_view" class="form-control" name="description" rows="4" 
                                    cols="50">
                                     
                                      </textarea>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <button type="button" style="margin-top:30px" class="btn btn-danger"
                        data-dismiss="modal">Close</button>
                   
               
            </div>
        </div>
    </div>
</div>
