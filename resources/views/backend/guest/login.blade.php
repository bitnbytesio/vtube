<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Signin Template for Bootstrap</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> 

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

   
    <!-- Custom styles for this template -->
    <link href="css/admin.css" rel="stylesheet">


   

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>


    <div class="container-fluid">

    <div class="vertical-center-row">
      
      <div class="login-container">

        <form class="login-form">
          <h1>Login to your account</h1>
          <label for="inputEmail" class="sr-only">Username or Email</label>
          <input type="text" id="inputEmail" class="form-control" placeholder="Username or Email" required autofocus>
          <label for="inputPassword" class="sr-only">Password</label>
          <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
          <div class="checkbox">
            <label>
              <input type="checkbox" value="remember-me"> Remember me
            </label>
          </div>
          <button class="btn btn-primary btn-block" type="submit">Sign in</button>
        </form>

        <div class="login-help">
            <a href="#/forgot-password">Forgot Password</a>
        </div>

      </div> <!-- login container -->

      
      </div>

    </div> <!-- /container -->


    <!-- loading bar -->
    <div class="loading-bar-container">
      <div class="loading-bar">
      <div class="bar"></div>
      </div>
    </div>

   
  </body>
</html>
