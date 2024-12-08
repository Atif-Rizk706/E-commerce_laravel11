<!DOCTYPE html>

<html>
<head>
    <title></title>
    <link rel="stylesheet" href="invitation.css">
</head>
<body class="">
  <h1> dashboard admin</h1>
  <form method="POST" action="{{ route('logout') }}">
      @csrf

     <button type="submit"> logout </button>
  </form>
</body>
</html>
