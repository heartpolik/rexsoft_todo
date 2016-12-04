<div id="create_task_modal"
     class="modal fade"
     tabindex="-1"
     role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button"
                        class="close"
                        data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Create New Task</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label>Task</label>
                        <input type="text"
                               class="form-control"
                               placeholder="Task"
                               id="taskNameField">
                    </div>
                    <div class="form-group">
                        <input type="checkbox"
                               name="priority"
                               value="1"
                               id="priorityField">
                        <label> Set high priority</label>
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control"
                                id="categoriesOptionContainer"
                                name="category_id">
                            {{-- @include('cateegoryOptionsList')--}}
                            {{--this stuff will be included with ajax--}}
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button"
                        class="btn btn-default"
                        data-dismiss="modal">
                    Close
                </button>
                <button type="button"
                        class="btn btn-primary"
                        data-dismiss="modal"
                        onclick="createTask()">
                    Save changes
                </button>
            </div>
        </div>
    </div>
</div>