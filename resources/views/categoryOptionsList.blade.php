@if($categories)
@foreach($categories as $category)
<option value="{{$category->id}}">{{$category->name}}</option>
@endforeach
@endif
