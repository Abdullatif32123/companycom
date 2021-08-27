<form method= "post" action="{{route('add')}}">
@csrf 
Enter the name of the product : 
<input type= "text" name="name"/>
<br/>
@error("name")
{{$message}}
@enderror
<br/>
enter the price of the product 
<input type="text" name="price"/>
<br/>
@error("price")
{{$message}}
@enderror
<br/>
<input type="submit" value="Add the product"/>
<br/>
</form>