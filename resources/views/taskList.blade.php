
@foreach($tasks as $task)
<li class="@if($task->checked) done @endif">
    <input type="checkbox"
           readonly
           @if($task->checked) checked @endif
           onclick="toggleTaskStatus({{$task->id}})">
    <span class="text">{{$task->name}}</span>
    <span class="label label-success label-@if($task->priority)danger @endif">{{$task->myCategory->name}}</span>
    <div class="tools">
        <i class="glyphicon glyphicon-pencil"
           onclick="editTask({{$task->id}})"></i>
        <i class="glyphicon glyphicon-remove-circle"
           onclick="deleteTask({{$task->id}})"></i>
    </div>
</li>
@endforeach