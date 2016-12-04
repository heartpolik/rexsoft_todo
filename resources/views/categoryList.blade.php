<a class="list-group-item category-list-item"
   id="category-item-0"
   onclick="showCategorizedTasks(0)">
    <span class="badge">{{$tasks_count}}</span>
    All
</a>
<div id="field"
     data-field-id="{{count($categories)}}" ></div>
@foreach($categories as $category)
    <a class="list-group-item category-list-item"
       onclick="showCategorizedTasks({{$category->id}})"
       id="category-item-{{$category->id}}">
        <span class="badge">{{count($category->myTasks)}}</span>
        {{$category->name}}
        <div class="col-xs-1 tools" style="z-index: 100">
            <i class="glyphicon glyphicon-remove-circle"
               onclick="deleteCategory({{$category->id}})">
            </i>
        </div>
    </a>
@endforeach