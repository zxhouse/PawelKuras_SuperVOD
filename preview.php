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
    <link href="css/bootstrap.css" rel="stylesheet">
	
	<link rel="stylesheet" type="text/css"href="http://github.com/downloads/lafeber/world-flags-sprite/flags32.css" />

    <!-- Custom CSS -->
    <style>
    body {
        padding-top: 70px;
        /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
    }
	
	.form-control-borderless {
    border: none;
}

.form-control-borderless:hover, .form-control-borderless:active, .form-control-borderless:focus {
    border: none;
    outline: none;
    box-shadow: none;
}

.break-word{
	word-break: break-word;
}

.lds-circle {
  display: inline-block;
  transform: translateZ(1px);
}
.lds-circle > div {
  display: inline-block;
  width: 51px;
  height: 51px;
  margin: 6px;
  border-radius: 50%;
  background: #cef;
  animation: lds-circle 2.4s cubic-bezier(0, 0.2, 0.8, 1) infinite;
}
@keyframes lds-circle {
  0%, 100% {
    animation-timing-function: cubic-bezier(0.5, 0, 1, 0.5);
  }
  0% {
    transform: rotateY(0deg);
  }
  50% {
    transform: rotateY(1800deg);
    animation-timing-function: cubic-bezier(0, 0.5, 0.5, 1);
  }
  100% {
    transform: rotateY(3600deg);
  }
}
    </style>
	
	
<script src="js/dropzone.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-md-12 col-lg-12 text-center">
                <center><img src = "img/logo.png"></center>
                <p class="lead">Add subtitles from OpenSubtitles or your own file to your favourite movies!</p>
            </div>
		</div>
		<br>
		<div class="row">	


<center>

<div id="player" class="" style="position: sticky"></div>

</center>
			
</div>
		
			<div class="row">
				<div class="col-md-12 col-lg-12 text-center">
			
					<br><br>
					<center>2018 Politechnika Rzeszowska</center>
					
					<br>
				</div>
			</div>
        <!-- /.row -->
		
		
    </div>
    <!-- /.container -->

    <!-- jQuery Version 1.11.1 -->
	
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.js"></script>

	
    
	

  <script src="https://content.jwplatform.com/libraries/CT43qidg.js"></script>
    <script>jwplayer.key='J84teycq';</script>
	
	<script>
	
	
	
	        const player = jwplayer('player').setup({
      		sources: [
				{file: "uploads/be7c27fc71f1fab745ef82c631b716e2.mp4", label:"SD&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;360p"},
				{file: "uploads/be7c27fc71f1fab745ef82c631b716e2.mp4", label:"HQ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;480p"},
				{file: "uploads/be7c27fc71f1fab745ef82c631b716e2.mp4", label:"HD&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;720p"},
				{file: "uploads/be7c27fc71f1fab745ef82c631b716e2.mp4", label:"FULL HD&nbsp;&nbsp;-&nbsp;&nbsp;1080p"},
				{file: "uploads/be7c27fc71f1fab745ef82c631b716e2.mp4", label:"2K&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;1440p"},
				{file: "uploads/be7c27fc71f1fab745ef82c631b716e2.mp4", label:"4K&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;2160p"},
					 ]
				,
			playbackRateControls: true,
			qualityLabels: {"2500":"FULL HD&nbsp;&nbsp;-&nbsp;&nbsp;1080p","1000":"SD&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;360p"}
        });

	</script>

</body>

</html>
