<!DOCTYPE html>
<html>

<head>
   @include('home.css')
    <style>
        .div_center{
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 30px;
        }
        .detail-box{
            padding: 10px;
        }
    </style>
</head>

<body>
<div class="hero_area">
    <!-- header section strats -->
      @include('home.header')
    <!-- end header section -->

</div>

<!-- product details  section -->


<!-- end shop section -->


<section class="shop_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Latest Products
            </h2>
        </div>
        <div class="row">
                <div class="col-sm-12 ">
                    <div class="box">
                        <a href="">
                            <div class="div_center">
                                <img width="400" height="300px" src="{{ asset('storage/' . $product->image) }}" alt="">
                            </div>
                            <div class="detail-box">
                                <h6>
                                    {{$product->title}}
                                </h6>
                                <h6>
                                    Price:
                                    <span>
                                 ${{$product->price}}
                                </span>
                                </h6>
                            </div>
                            <div class="detail-box">
                                <h6>Category : {{$product->category}}
                                </h6>
                                <h6>
                                    Quantity:
                                    <span>
                                 {{$product->quantity}}
                                </span>
                                </h6>
                            </div>
                            <div class="detail-box">
                                <p>{{$product->description}}</p>
                            </div>

                        </a>
                    </div>
                </div>
        </div>
    </div>
</section>


<!-- info section -->
@include('home.footer')

<!-- end info section -->


@include('home.script')

</body>

</html>
