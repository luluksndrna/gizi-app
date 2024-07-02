<html lang="en">
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Login User</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin" action="login.php" method="post">
      <h1 class="h3 mb-3 font-weight-normal">User</h1>
      <label for="inputusername" class="sr-only">Username</label>
      <input 
        type="username" id="inputusername"  name="username" class="form-control" placeholder="username" required autofocus>
      <label for="inputPassword" class="sr-only" >Password</label>
      <input type="password" id="inputpassword" name="password" class="form-control" placeholder="password" required>
      <div class="checkbox mb-3">
        <label>
          
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
      <p class="mt-5 mb-3 text-muted">&copy; Luluk-Informatika-UNRIYO</p>
    </form>
  </body>
</html>
