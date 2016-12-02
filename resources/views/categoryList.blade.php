<a class="list-group-item category-list-item"
   id="category-item-0"
   onclick="showCategorizedTasks(0)">
    <span class="badge">{{$tasks_count}}</span>
    All
</a>
@foreach($categories as $category)
    <a class="list-group-item category-list-item"
       onclick="showCategorizedTasks({{$category->id}})"
       id="category-item-{{$category->id}}">
        <span class="badge">{{count($category->myTasks)}}</span>
        <i class="glyphicon glyphicon-remove-circle"
           onclick="deleteCategory({{$category->id}})">
            </i>
        {{$category->name}}
    </a>

@endforeach