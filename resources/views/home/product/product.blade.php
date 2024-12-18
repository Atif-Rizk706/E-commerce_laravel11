<section class="shop_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Latest Products
            </h2>
        </div>
        <div class="row">
            @foreach($products as $product)
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="box">
                    <a href="">
                        <div class="img-box">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="">
                        </div>
                        <div class="detail-box">
                            <h6>
                                {{$product->title}}
                            </h6>
                            <h6>
                                Price
                                <span>
                                 ${{$product->price}}
                                </span>
                            </h6>
                        </div>
                        <div style="padding: 15px">
                            <a class="btn btn-danger" href="{{url('product_details',$product->id)}}"> Details</a>
                            <a class="btn btn-primary" href="{{url('add_card',$product->id)}}">Add to Card</a>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
