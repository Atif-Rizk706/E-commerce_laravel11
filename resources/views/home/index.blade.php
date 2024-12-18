<!DOCTYPE html>
<html>

<head>
    @include('home.css')
</head>

<body>
<div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
    <!-- end header section -->
    <!-- slider section -->

    @include('home.sidebar')
    <!-- end slider section -->
</div>
<!-- end hero area -->

<!-- shop section -->

@include('home.product.product')
<!-- end shop section -->


<!-- contact section -->

@include('home.contact')
<br><br><br>

<!-- end contact section -->


<!-- info section -->
@include('home.footer')

<!-- end info section -->


@include('home.script')

</body>

</html>
