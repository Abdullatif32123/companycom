<form method= "post" action="{{route('edit',$product->id)}}">
@csrf 
Enter the name of the product : 
<input type= "text" name="name" value="{{$product->name}}"/>
<br/>
@error("name")
{{$message}}
@enderror
<br/>
enter the price of the product 
<input type="text" name="price"  value="{{$product->price}}"/>
<br/>
@error("price")
{{$message}}
@enderror
<br/>
<input type="submit" value="Edit the product"/>
<br/>
</form>