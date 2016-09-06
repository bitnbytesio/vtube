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

     <!-- Custom styles for this template -->
    <link href="css/admin.css" rel="stylesheet">


   

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body ng-controller="AppCtrl">

  <div class="app-container" ui-view>
    
  </div>


  <script src="{{ url('js/admin.js') }}"></script>
 <!-- <script src="{{ url('js/ui-bootstrap-tpls-2.0.2.min.js') }}"></script>
  

  <script src="{{ url('js/app.js') }}"></script>-->

     
  </body>
</html>
