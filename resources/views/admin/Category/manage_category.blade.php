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

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h1 class="h5 no-margin-bottom">Manage Category</h1>
            </div>
        </div>
        <div class="container"  style="margin-left: 200px; align-content: center">
            <table class="table" style="width: 60%; text-align: center;border: solid 1px;">
                <tr>
                    <th style="background-color: skyblue">Category name</th>
                    <th style="background-color: skyblue">Delete</th>
                    <th style="background-color: skyblue">Edite</th>

                </tr>
                @foreach($categories as $category)
                <tr>
                    <td style="border: solid 1px;">{{$category->category_name}}</td>
                    <td style="border: solid 1px;">
                        <a class="btn btn-danger" onclick="confirmation(event)" href="{{ route('admin.delete_category', $category->id) }}"> Delete</a>
                    </td>
                    <td style="border: solid 1px;">
                        <a class="btn btn-success" href="{{ route('admin.edite_category', $category->id) }}"> Update</a>
                    </td>

                </tr>
                @endforeach
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
