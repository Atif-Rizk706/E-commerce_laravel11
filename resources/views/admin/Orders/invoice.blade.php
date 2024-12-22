<!DOCTYPE html>
<html>
<head>
    <style>
    </style>
</head>
<body>
<center>
    <h3>Customer name : {{$order->name}}</h3>
    <h3>Customer address : {{$order->rec_address}}</h3>
    <h3> Phone : {{$order->rec_phone}}</h3>
    <h3>Product title : {{$order->products->title}}</h3>
    <h3>Price: {{$order->products->price}}</h3>
    <h3>Product image :
        <img src="{{asset('storage/'.$order->products->image)}}" alt="{{ $order->products->title }}" width="50">
    </h3>



</center>
</body>
</html>
