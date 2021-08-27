@foreach($products as $p)
{{"The name of the product is : ".$p->name.
    " , the ID of the product is : ".$p->id.
" And the price of it is : ".$p->price.
" . To edit press"}}
<a href ="/product/edit/{{$p->id}}">here</a>
" To delete press "
<a href="/product/delete/{{$p->id}}">here</a>
<br/>
@endforeach