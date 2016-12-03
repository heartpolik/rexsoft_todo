<input type="text"
       hidden value="{{count($categories)}}"
       id="categoriesQuantity">
@if($categories)
@foreach($categories as $category)
<option value="{{$category->id}}">{{$category->name}}</option>
@endforeach
@endif
