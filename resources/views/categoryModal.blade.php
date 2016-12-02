<div id="create_category_modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Create New Category</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label>Category Name</label>
                        <input type="text"
                               required
                               name="name"
                               class="form-control"
                               placeholder="Enter name here Name"
                               id="categoryName">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    Close
                </button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="createCategory()">
                    Save changes
                </button>
            </div>
        </div>
    </div>
</div>