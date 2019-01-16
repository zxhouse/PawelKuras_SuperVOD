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


    <!-- Navigation -->

    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-md-12 col-lg-12 text-center">
                <center><img src = "img/logo.png"></center>
                <p class="lead">Add subtitles from OpenSubtitles or your own file to your favourite movies!</p>
            </div>
		</div>
		<br>
			
				<?php
					
					$search_phrase = $_GET["name"];
					$bad_characters = array(".", "_", "-");
					
					$cleaned_phrase = str_replace($bad_characters, " ", $search_phrase);
					//echo $cleaned_phrase;
					$result = "";
					
					do {
					$service_url = 'https://kgsearch.googleapis.com/v1/entities:search';
					$params = array(
						'query' => $cleaned_phrase,
						'limit' => 1,
						'indent' => TRUE,
						'key' => 'AIzaSyAzAB39Wf7xfhi-3L8ApXE_dsxMKsryALA');
						$url = $service_url . '?' . http_build_query($params);
						$ch = curl_init();

						curl_setopt($ch, CURLOPT_URL, $url);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
						$response = json_decode(curl_exec($ch), true);
						curl_close($ch);
						foreach($response['itemListElement'] as $element) {
								$result = $element['result']['name'];

						}
						
						$tmp_word_array = explode (" ", $cleaned_phrase);
						array_splice($tmp_word_array, -1);
						$cleaned_phrase = implode(" ", $tmp_word_array);
						//echo $cleaned_phrase;
						
						
					} while(($result === "") && $cleaned_phrase !== "");
					
					
					
					if($result !== ""){
					

						echo("<div id=\"GoogleApiResults\" class=\"row\">");
							echo("<div class=\"col-md-2 col-lg-2 text-center\"></div>");
							echo("<div class=\"col-md-8 col-lg-8 text-center\">");
								echo("<div class=\"panel panel-default\">");
									echo("<div class=\"panel-body\">");
				
										echo("<b>Is movie title which you uploaded:</b>");
										echo("<h4><b>");
										echo $result;
										echo("</b></h4>");
										echo("<div class=\"row\">");
											echo("<div class=\"col-md-4 col-lg-4 text-center\"></div>");
											echo("<div class=\"col-md-2 col-lg-2 text-center\">");
												echo("<center><button type=\"button\" class=\"btn btn-success\" onclick=\"ButtonYesFunction()\">Yes</button></center>");
											echo("</div>");
				
											echo("<div class=\"col-md-2 col-lg-2 text-center\">");
												echo("<center><button type=\"button\" class=\"btn btn-danger\" onclick=\"ButtonNoFunction()\">No</button></center>");
											echo("</div>");
										echo("</div>");
									echo("</div>");
								echo("</div>");
							echo("</div>");
							echo("<div class=\"col-md-2 col-lg-2 text-center\"></div>");
						echo("</div>");
				
				}
				
				$tmp_word_array_2 = explode (" ", $result);
				$result_for_api = implode("+", $tmp_word_array_2);
				?>
			
			
			
			
			
			<div id="MovieInfoPanel" style="display: none;" class="row">
				<div class="col-md-2 col-lg-2 text-center"></div>
				<div class="col-md-8 col-lg-8 text-center">
				
					<div class="panel panel-default">
						<div class="panel-body">
					
							<div class="row">
								<div class="col-md-4 col-lg-4 text-center">
					
									<img id="poster-img" src="folder.jpg"></img>
					
								</div>
								<div class="col-md-1 col-lg-1 text-center"></div>
								<div class="col-md-7 col-lg-7 text-left">
					
									<h1 id="Title">Title</h1>
									<h4 id="Year">Year<h4>
					
									<br>
					
									<div id="Plot">BoJack Horseman was the star of the hit TV show "Horsin' Around" in the '90s, now he's washed up, living in Hollywood, complaining about everything, and wearing colorful sweaters.</div>
					
					
								</div>
							</div>
							<div class="row text-center">
								<br><br>
								<h4 id="Released">22 Dec 2012</h4>
						
								<h4 id="Genre">Comedy</h4>
								<h4 id="Writer">Writer</h4>
								<h4 id="Actors">Actor</h4>
								<h4 id="Director">Director</h4>
								<h4 id="Language">Language</h4>
								<h4 id="imdbRating">imdbRating</h4>
					
								<br>
					
								<h5><i>Data came from OMDB.com database</i></h5>
					
							</div>

						</div>
					</div>
				</div>
				<div class="col-lg-2 text-center"></div>
			</div>
			
			<div class="row">
				<div class="col-md-4 col-lg-4 text-center"></div>
				<div class="col-md-4 col-lg-4 text-center">
					<center><button type="button" class="btn btn-info">Upload your own file with subtitles</button></center>
					<br>
					<h3><b>OR<b/></h3>
				</div>
				<div class="col-md-4 col-lg-4 text-center"></div>
			</div>
			
			<div class="row">
				<div class="col-md-2 col-lg-2 text-center"></div>
				<div class="col-md-8 col-lg-8 text-center">
					<br>
					<div class="panel panel-default">
						<div class="panel-body">
				
							<h3>Search subtitles on OpenSubtitles database:</h3>
							<br>
							<p>Language:</p>
							<form>
								<ul class="f32">
									<input type="radio" name="language_select" value="eng" checked><li class="flag gb"></li>&nbsp;
									<input type="radio" name="language_select" value="spa"><li class="flag es"></li>&nbsp;
									<input type="radio" name="language_select" value="pol"><li class="flag pl"></li>&nbsp;
									<input type="radio" name="language_select" value="jpn"><li class="flag jp"></li>&nbsp;
									<input type="radio" name="language_select" value="fra"><li class="flag fr"></li>&nbsp;
									<input type="radio" name="language_select" value="ger"><li class="flag de"></li>&nbsp;
									<input type="radio" name="language_select" value="ita"><li class="flag it"></li>&nbsp;
									<input type="radio" name="language_select" value="por"><li class="flag pt"></li>&nbsp;
									<input type="radio" name="language_select" value="swe"><li class="flag se"></li>&nbsp;
									<input type="radio" name="language_select" value="nor"><li class="flag no"></li>&nbsp;
									<input type="radio" name="language_select" value="fin"><li class="flag fi"></li>&nbsp;
									<input type="radio" name="language_select" value="ukr"><li class="flag ua"></li>&nbsp;
									<input type="radio" name="language_select" value="est"><li class="flag ee"></li>&nbsp;
									<input type="radio" name="language_select" value="rus"><li class="flag ru"></li>&nbsp;
									<input type="radio" name="language_select" value="cze"><li class="flag cz"></li>&nbsp;
									<input type="radio" name="language_select" value="slo"><li class="flag sk"></li>&nbsp;
									<input type="radio" name="language_select" value="chi"><li class="flag cn"></li>&nbsp;
									<input type="radio" name="language_select" value="kor"><li class="flag kr"></li>&nbsp;
									<input type="radio" name="language_select" value="hrv"><li class="flag hr"></li>&nbsp;
									<input type="radio" name="language_select" value="hun"><li class="flag hu"></li>&nbsp;
									<input type="radio" name="language_select" value="rom"><li class="flag ro"></li>&nbsp;
									<input type="radio" name="language_select" value="lit"><li class="flag lt"></li>&nbsp;
									<input type="radio" name="language_select" value="lav"><li class="flag lv"></li>&nbsp;
									<input type="radio" name="language_select" value="kaz"><li class="flag kz"></li>&nbsp;
									<input type="radio" name="language_select" value="dut"><li class="flag nl"></li>&nbsp;
									<input type="radio" name="language_select" value="gre"><li class="flag gr"></li>&nbsp;
						  
								</ul>
							</form>
		
							<br>
							<button type="button" class="btn btn-primary" id="sub_search_button" onClick="SearchSubtitlesButtonClick()">Search for subtitles</button>
							<div class="lds-circle" style="display:none" id="loading_circle"><div></div></div>
		
						</div>
					</div>
				</div>
				<div class="col-md-2 col-lg-2 text-center"></div>
			</div>
			
			<br><br><br>
			
			<div class="row">
				<div class="col-md-2 col-lg-2 text-center"></div>
				<div class="col-md-8 col-lg-8 text-center">
			
					<div class="panel panel-default">
						<div class="panel-body">
					
							<h4>Options</h4>
							<br>
							<div class="row">
								<div class="col-md-4 col-lg-4 text-right">
									Position of subtitles:
								</div>
								<div class="col-md-8 col-lg-8 text-left">
									<select class="form-control" id="exampleFormControlSelect1">
										<option>Above video</option>
										<option>Under video</option>
										<option>In center of video</option>
									</select>
								</div>
					
							</div>
							<br>
							<div class="row">
								<div class="col-md-4 col-lg-4 text-right">
									Charset:
								</div>
					
								<div class="col-md-8 col-lg-8 text-left">
									<select class="form-control" id="exampleFormControlSelect1">
										<option>Unicode (UTF-8)</option>
										<option>ISO 8859-1 (Central Europe</option>
										<option>In center of video</option>
									</select>
								</div>
					
							</div>
					
							<br>
							<div class="row">
								<div class="col-md-4 col-lg-4 text-right">
								Font:
								</div>
					
								<div class="col-md-8 col-lg-8 text-left">
									<select class="form-control" id="exampleFormControlSelect1">
										<option>Arial</option>
										<option>Tahoma</option>
										<option>Times New Roman</option>
									</select>
								</div>
					
							</div>
					
						</div>
					</div>
			
				</div>
				<div class="col-md-2 col-lg-2 text-center"></div>
			</div>
			
        
		
			<div class="row">
				<div class="col-md-12 col-lg-12 text-center">
					<center><button type="button" class="btn btn-primary">Add subtitles to movie!</button>&nbsp;&nbsp;<button type="button" class="btn btn-info">Preview video!</button></center>
			
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
    
	<script>
	
	function ButtonNoFunction(){
		
		$("#GoogleApiResults").remove();
		
	}
	
	function ButtonYesFunction(){
		
		
		var omdbAPIquery = "http://www.omdbapi.com/?t=" + "<?php echo $result_for_api; ?>" + "&apikey=2b7a41c3&plot=full";
		
		console.log(omdbAPIquery);
		
		var title_string = "";
		var year_string = "";
		var genre_string = "";
		var plot_string = "";
		var writer_string = "";
		var actors_string = "";
		var director_string = "";
		var language_string = "";
		var imdbRating_string = "";
		var released_string = "";
		
		
		var poster_url = "";
		
		
		$.getJSON( omdbAPIquery, function( data ) {
		$.each( data, function( key, val ) {

			if(key == "Title"){title_string = val;}
			if(key == "Year"){year_string = val;}
			if(key == "Genre"){genre_string = val;}
			if(key == "Plot"){plot_string = val;}
			if(key == "Writer"){writer_string = val;}
			if(key == "Released"){released_string = val;}
			if(key == "Actors"){actors_string = val;}
			if(key == "Director"){director_string = val;}
			if(key == "Language"){language_string = val;}
			if(key == "imdbRating"){imdbRating_string = val;}
			if(key == "Poster"){poster_url = val;}
		});
		
		Title.innerHTML = title_string;
		Year.innerHTML = year_string;
		Genre.innerHTML = "<b>Genre: </b>" + genre_string;
		Plot.innerHTML = plot_string;
		Writer.innerHTML = "<b>Writer: </b>" + writer_string;
		Actors.innerHTML = "<b>Actors: </b>" + actors_string;
		Director.innerHTML = "<b>Director: </b>" + director_string;
		Language.innerHTML = "<b>Language: </b>" + language_string;
		imdbRating.innerHTML = "<b>Rating on IMDb: </b>" + imdbRating_string;
		Released.innerHTML = "<b>Released: </b>" + released_string;
		
		$("#poster-img").attr("src",poster_url);
		
		$("#GoogleApiResults").remove();
		document.getElementById("MovieInfoPanel").style.display = "block";
		
		});
	}

	
	function SearchSubtitlesButtonClick() {
		
	$("#sub_search_button").remove();
	document.getElementById("loading_circle").style.display = "block";
	
	var selected_language = $("input[name=language_select]:checked").val();
	

	$.ajax({
	type: "POST",
	url: "sub_query.php",
	data: { token_id: "<?php echo $_GET["token"]; ?>", language: selected_language },
	success:function(data)
	{
	alert(data);// data is the return value from input.php
	}
	});

	;
		
	}

	
	
	</script>

</body>

</html>
