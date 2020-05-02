<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="favicon.ico">

  <title>Responsive Demo</title>

  <!-- Bootstrap core CSS -->
  <link href="ext-lib/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- JQuery core JavaScript -->
  <script src="ext-lib/jquery-3.2.1.min.js" type="text/javascript"></script>

  <!-- Bootstrap core JavaScript -->
  <script src="ext-lib/bootstrap-3.3.7-dist/js/bootstrap.min.js" type="text/javascript"></script>

  <!-- Custom styles -->
  <link href="css/style.css" rel="stylesheet">
</head>
<body>

<!-- Fixed navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
<!--      <a class="navbar-brand" href="#">LPA Demo</a>-->
      <img src="images/ic_lpa.png" class="logoImg">
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#contact">Contact</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li class="dropdown-header">Nav header</li>
            <li><a href="#">Separated link</a></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
    </div><!--/.nav-collapse -->
  </div>
</nav>

<!-- Begin page content -->
<div class="content">
<p>Main Content</p>
</div>

<footer class="footer">
  <div class="container text-white">
    <?php include 'footer.php';?>
  </div>
</footer>
</body>
</html>
