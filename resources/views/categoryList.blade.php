<a class="list-group-item active"
   onclick="categoryProcessing('*')">
    <span class="badge">{{$tasks_count}}</span>
    All
</a>
@foreach($categories as $category)
    <a class="list-group-item "
       onclick="categoryProcessing({{$category->id}})">
        <span class="badge">{{count($category->myTasks)}}</span>
        {{$category->name}}
    </a>
@endforeach