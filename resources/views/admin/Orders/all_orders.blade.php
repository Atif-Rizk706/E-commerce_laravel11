<!DOCTYPE html>
<html>
<head>
    @include('admin.css')
    <style>
        .product-table {
            width: 80%;
            border-collapse: collapse;
            margin-top: 20px;
            border: 1px solid #ddd;
        }

        .product-table th, .product-table td {
            padding: 12px;
            text-align: center;
            border: 1px solid #0e0e0e;


        }

        .product-table th {
            background-color: #5ad6f8;
        }





        .product-table img {
            width: 120px!important;

        }

        button {
            color: white;
            border: none;
            cursor: pointer;
            display: inline;
        }

        button:hover {
            background-color: darkred;
        }
    </style>
</head>
<body>
@include('admin.header')
<div class="d-flex align-items-stretch">
    <!-- Sidebar Navigation-->
    @include('admin.sidbar')
    <!-- Sidebar Navigation end-->

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h1 class="h5 no-margin-bottom">All Orders</h1>
            </div>
        </div>
        <div class="container"  style="margin-left: 200px; align-content: center ;width: 76%">
            <table class="product-table">
                <thead>
                <tr>
                    <th>Customer name</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Product title</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Change Status</th>

                </tr>
                </thead>
                <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->name }}</td>
                        <td>{{$order->rec_address}}</td>
                        <td>{{$order->rec_phone }}</td>
                        <td>{{$order->products->title }}</td>
                        <td>{{$order->products->price }}</td>

                        <td>
                            @if ($order->products->image)
                                <img src="{{ asset('storage/' . $order->products->image) }}" alt="{{ $order->products->title }}" width="50">
                            @else
                                No image
                            @endif
                        </td>
                        <td>{{$order->status }}</td>
                        <td style="display: flex ">

                            <a  style="padding: 5px" class="btn btn-secondary" href="{{route('admin.onWayStatus',$order->id)}}">On the way</a>
                            <a style="padding: 5px" class="btn btn-success" href="{{route('admin.deliveredStatus',$order->id)}}">Delivered</a>

                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <footer class="footer">
            <div class="footer__block block no-margin-bottom">
                <div class="container-fluid text-center">
                    <!-- Please do not remove the backlink to us unless you support us at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
                    <p class="no-margin-bottom">2018 &copy; Your company. Download From <a target="_blank" href="https://templateshub.net">Templates Hub</a>.</p>
                </div>
            </div>
        </footer>
    </div>

</div>
<!-- JavaScript files-->
@include('admin.script')
</body>
</html>
