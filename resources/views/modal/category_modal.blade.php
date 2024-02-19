<div class="modal" id="add_categories" style="display:none">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Category</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
                <form action="{{ route('categories.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label>Name:</label>
                                <div class="input-group">
                                    <input type="text" id="name" class="form-control" name="name">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="form-group">
                                <label>Note:</label>
                                <div class="input-group">
                                    <textarea id="note" class="form-control" name="note" rows="4" cols="50">
                                     
                                      </textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" style="margin-top:30px" class="btn btn-danger"
                        data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" style="float:right;margin-top:30px">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="update_categories" style="display:none">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Category</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
                <form action="{{ route('categories.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="input-group">
                            <input type="text" id="update_category_id" class="form-control" name="id"
                                style="display: none;">
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label>Name:</label>
                                <div class="input-group">
                                    <input type="text" id="update_category_name" class="form-control" name="name">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="form-group">
                                <label>Note:</label>
                                <div class="input-group">
                                    <textarea id="update_category_note" class="form-control" name="note" rows="4" cols="50">
                                     
                                      </textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" style="margin-top:30px" class="btn btn-danger"
                        data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" style="float:right;margin-top:30px">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal" id="show_categories" style="display:none">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title">Show Category</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>

          </div>
          <div class="modal-body">
              <form action="{{ route('categories.store') }}" method="post">
                  @csrf
                  <div class="row">
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label>Name:</label>
                            <div class="input-group">
                                <input type="text" disabled id="show_category_name" class="form-control" name="name">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-9">
                        <div class="form-group">
                            <label>Note:</label>
                            <div class="input-group">
                                <textarea disabled id="show_category_note" class="form-control" name="note" rows="4" cols="50">
                                   
                                  </textarea>
                            </div>
                        </div>
                    </div>
                </div>
        
              </form>
          </div>
      </div>
  </div>
</div>
