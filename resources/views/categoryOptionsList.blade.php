<option value="null">None</option>
@if($categories)
@foreach($categories as $category)
<option value="{{$category->id}}">{{$category->name}}</option>
@endforeach
@endif
