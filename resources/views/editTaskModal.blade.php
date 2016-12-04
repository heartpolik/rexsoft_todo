<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title">Edit Task</h4>
        </div>
        <div class="modal-body">
            <form>
                <div class="form-group">
                    <label>Task</label>
                    <input id="editTaskIdField"
                           value="{{$task->id}}"
                           hidden>
                    <input type="text"
                           class="form-control"
                           placeholder="Task"
                           id="editTaskNameField"
                           value="{{$task->name}}">
                </div>
                <div class="form-group">
                    <input type="checkbox"
                           value="1"
                           id="editTaskPriorityField"
                    @if($task->priority) checked @endif>
                    <label> Set high priority</label>

                </div>
                <div class="form-group">
                    <label>Category</label>
                    <select class="form-control"
                            id="editCategoriesOptionContainer"
                            name="category_id">
                        @include('categoryOptionsList',['categories'=>$categories])
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
                    onclick="updateTask({{$task->id}})">
                Save changes
            </button>
        </div>
    </div>
</div>
