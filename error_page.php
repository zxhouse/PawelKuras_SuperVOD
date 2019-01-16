<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add Subtitles - easiest way to watch movies with subtitles</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	
	  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
    body {
        padding-top: 70px;
        /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
    }
    </style>

</head>

<body>


    <!-- Navigation -->

    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12 text-center">
                <center><img src = "img/logo.png"></center>
                <p class="lead">Add subtitles from OpenSubtitles or your own file to your favourite movies!</p>
				<br><br>
				<h2>Error!</h2><br>
				<?php
				
				if($_GET["err"] === "sizefile")
					echo ("<h3>Uploaded file is bigger than 2GB. Please upload smaller file</h3>");
`				if($_GET["err"] === "partial")
					echo ("<h3>Something went wrong with the upload, and file was only partial uploaded. Please try again.</h3>");
				if($_GET["err"] === "nofile")
					echo ("<h3>Something went wrong with the upload, no file was uploaded. Please try again.</h3>");
				if($_GET["err"] === "server")
					echo ("<h3>Something went wrong with the server. Please try again.</h3>");
				if($_GET["err"] === "extension")
					echo ("<h3>File have a wrong extension. Please try again.</h3>");
				?>
				<br>
				
            </div>
        </div>
        <!-- /.row -->
<br>
    <!-- /.container -->

    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  
  <script>
  
  $('.file_upload').file_upload();
  
  </script>

</body>

</html>
