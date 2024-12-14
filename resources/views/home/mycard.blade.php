<!DOCTYPE html>
<html>

<head>
   @include('home.css')
    <style>
        .container_tap {
            width: 80%;
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Table styles */
        .container_tap table {
            width: 100%;
            border-collapse: collapse;
        }

        .container_tap th, td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
        }

        .container_tap th {
            background-color: #7aa1f5;
            color: white;
        }

        .container_tap td img {
            max-width: 100px;
            height: auto;
            display: block;
            margin: 0 auto;
        }
    </style>
</head>

<body>
<div class="hero_area">
    <!-- header section strats -->
      @include('home.header')
    <!-- end header section -->

</div>
<!-- end hero area -->
<?php
$totalPrice=0;
 ?>

<div class="container_tap">
    <span style="font-size: 20px">
       My Card
    </span>


    <table>
        <thead>
        <tr>
            <th>Product Title</th>
            <th>Price</th>
            <th>Image</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cart as $carts)
        <tr>
            <td>{{{$carts->products->title}}}</td>
            <td>{{{$carts->products->price}}}</td>
            <td><img src="{{ asset('storage/' . $carts->products->image) }}" alt="Product 1"></td>
        </tr>
            <?php
                $totalPrice=$totalPrice+$carts->products->price
                ?>
        @endforeach
        </tbody>
    </table>

</div>
<div style="margin: auto;text-align: center;font-size: 30px">
    Total price of the cart is : {{$totalPrice}}

</div>









<!-- info section -->
@include('home.footer')

<!-- end info section -->


@include('home.script')

</body>

</html>
