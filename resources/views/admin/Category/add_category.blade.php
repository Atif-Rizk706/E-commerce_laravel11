<!DOCTYPE html>
<html>
<head>
    @include('admin.css')
</head>
<body>
@include('admin.header')
<div class="d-flex align-items-stretch">
    <!-- Sidebar Navigation-->
    @include('admin.sidbar')
    <!-- Sidebar Navigation end-->

    <!-- content  of the  page-->
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h1 class="h5 no-margin-bottom">Add Category</h1>
            </div>
        </div>
        <div class="container"  style="margin-left: 200px; align-content: center">
            <form action="{{route('admin.save_category')}}" method="post">
                @csrf
                <div class="align-content-md-center" >
                    <label> Category name</label>
                    <input type="text" name="category" style="width: 400px ; height:60px"  >
                    <input type="submit" class="btn-primary" value="Add Category">
                </div>
            </form>
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
