<!DOCTYPE html>
<html>
<head>
    @include('admin.css')
    <style>
        .product-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            border: 1px solid #ddd;
        }

        .product-table th, .product-table td {
            padding: 12px;
            text-align: center;

        }

        .product-table th {
            background-color: #f2f2f2;
        }

        .product-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .product-table tr:hover {
            background-color: #f1f1f1;
        }

        .product-table img {
            max-width: 50px;
            height: auto;
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
                <h1 class="h5 no-margin-bottom">All Products</h1>
            </div>
        </div>
        <div style="margin-left: 60px">
            <form method="get" action="{{url('admin/search_product')}}">
                @csrf
                <input type="search" name="search" style="height: 50px;width: 300px">
                <input type="submit" value="search" class="btn btn-secondary">
            </form>
        </div>
        <div class="container"  style="margin-left: 200px; align-content: center ;width: 76%">
            <table class="product-table">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Quantity</th>
                     <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->title }}</td>
                        <td>{{ Str::limit($product->description, 50) }}</td>
                        <td>
                            @if ($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}" width="50">
                            @else
                                No image
                            @endif
                        </td>
                        <td>${{ number_format($product->price, 2) }}</td>
                        <td>{{ ucfirst($product->category) }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>
                            <!-- Edit and Delete buttons (You can link these to actual actions later) -->
                            <a href="{{url('admin/edite_product',$product->id)}}">Edit</a>

                            <a class="btn btn-danger" onclick="confirmation(event)" href="{{url('admin/delete_product',$product->id)}}"> Delete</a>


                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div style="margin-left: 50%;align-content: center;margin-top: 70PX">
                {{$products->links()}}

            </div>
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
