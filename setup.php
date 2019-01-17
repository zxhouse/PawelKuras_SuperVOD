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
				<div class="col-md-2 col-lg-2 text-center"></div>
				<div class="col-md-8 col-lg-8 text-center">
					<br>
					<div class="panel panel-default">
						<div class="panel-body">
				
							<h3>Search and download subtitles on OpenSubtitles database:</h3>
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
							<button type="button" class="btn btn-primary"  id="sub_search_button" onClick="SearchSubtitlesButtonClick()">Search for subtitles</button>
								<div class="lds-circle" style="display:none" id="loading_circle"><div></div></div>
								
									<div class="clone-list">
										<div class="row" id="listofsubtitles" style="display:none">
								
											<div class="col-md-6 col-lg-6 text-center" id="NameOfSubtitle" >Name of Subtitle</div>
											<div class="col-md-2 col-lg-1 text-center" id="FormatOfSubtitle" >Format</div>
											<div class="col-md-2 col-lg-2 text-center" id="DurationOfSubtitle" >Length</div>
											<div class="col-md-2 col-lg-1 text-center" id="FPSOfSubtitle" >FPS</div>
											
											<div class="col-md-2 col-lg-2 text-center" id="DownloadZIP" >Download as ZIP</div>
								
										</div>
										
										<div class="row" id="listofsubtitles-clone" style="display:none;">
								
											<div class="col-md-6 col-lg-6 text-center NameOfSubtitle break-word"></div>
											<div class="col-md-2 col-lg-1 text-center FormatOfSubtitle"></div>
											<div class="col-md-2 col-lg-2 text-center DurationOfSubtitle"></div>
											<div class="col-md-2 col-lg-1 text-center FPSOfSubtitle"></div>
											<div class="col-md-2 col-lg-2 text-center DownloadZIP break-word"></div>
								
										</div>
									</div>
						</div>
					</div>
				</div>
				<div class="col-md-2 col-lg-2 text-center"></div>
			</div>
			
			
			<div class="row">
				<div class="col-md-4 col-lg-4 text-center"></div>
				<div class="col-md-4 col-lg-4 text-center">
					<center><input type="file" id="file"></center>
					<br>
					<center><button type="button" class="btn btn-info" onClick="UploadSubtitles()">Upload subtitle file</button></center>
				</div>
				<div class="col-md-4 col-lg-4 text-center"></div>
			</div>
			
			

			<br><br><br>
		
			<div class="row">
				<div class="col-md-12 col-lg-12 text-center">
					<center><button type="button" class="btn btn-primary"  onClick="AddSubtitlesClicked()">Add subtitles to movie!</button>
					&nbsp;&nbsp;<button type="button" class="btn btn-info" onClick="PreviewClicked()">Preview video!</button></center>
			
					<br><br>
					<center>2018 Politechnika Rzeszowska</center>
					
					<br>
				</div>
			</div>
        <!-- /.row -->
		
<div class="modal fade" id="modal_overbusy" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title" id="myModalLabel">Sorry, but our server is busy now...</h4>
			</div>
			<div class="modal-body">
				<h3><b>It looks like our server is quite busy now.</b></h3>
				</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-info" onClick="AddSubtitlesClicked()">Try again</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal_premiumusers" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title" id="myModalLabel">Not enough computing power for free users</h4>
			</div>
			<div class="modal-body">
				<h3><b>But we have some space if you give us a little penny</b></h3>
				<h2><b>Only $0,49 and your file will land on your hard drive!</b></h2>
				<button id="pay-button"></button><br><br>
				
				</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-info" onClick="AddSubtitlesClicked()">Try again</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
		
    </div>
    <!-- /.container -->

    <!-- jQuery Version 1.11.1 -->
	
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.js"></script>
	
	<script src="https://js.braintreegateway.com/web/3.25.0/js/client.min.js"></script>
	<script src="https://www.paypalobjects.com/api/checkout.js" data-version-4></script>
	<script src="https://js.braintreegateway.com/web/3.25.0/js/paypal-checkout.js"></script>
	
    
	
	<?php
	
	require __DIR__ . '/vendor/autoload.php';

$gateway = new Braintree_Gateway(array(
    'accessToken' => 'access_token$sandbox$j84ryg5y82hjbthq$344b45d99dea7f34ac5859ea04d14585',
));

	$clientToken = $gateway->clientToken()->generate();

   
?>

	
	<script>
	

	var is_subtitle_file_uploaded = false;
	
	function ButtonNoFunction(){
		
		$("#GoogleApiResults").remove();
		
	}
	
	function ButtonYesFunction(){
		
		
		var omdbAPIquery = "http://www.omdbapi.com/?t=" + "<?php echo $result_for_api; ?>" + "&apikey=2b7a41c3&plot=full";
		
		console.log(omdbAPIquery);
		
		
		$.getJSON( omdbAPIquery, function( data ) {
		$.each( data, function( key, val ) {

			if(key == "Title"){Title.innerHTML = val;}
			if(key == "Year"){Year.innerHTML = val;}
			if(key == "Genre"){Genre.innerHTML = "<b>Genre: </b>" + val;}
			if(key == "Plot"){Plot.innerHTML = val;}
			if(key == "Writer"){Writer.innerHTML = "<b>Writer: </b>" + val;}
			if(key == "Released"){Released.innerHTML = "<b>Released: </b>" + val;}
			if(key == "Actors"){Actors.innerHTML = "<b>Actors: </b>" + val;}
			if(key == "Director"){Director.innerHTML = "<b>Director: </b>" + val;}
			if(key == "Language"){Language.innerHTML = "<b>Language: </b>" + val;}
			if(key == "imdbRating"){imdbRating.innerHTML = "<b>Rating on IMDb: </b>" + val;}
			if(key == "Poster"){$("#poster-img").attr("src",val);}
		});
		
		
		$("#GoogleApiResults").remove();
		document.getElementById("MovieInfoPanel").style.display = "block";
		
		});
	}

	
	function SearchSubtitlesButtonClick() {
		
	$("#sub_search_button").remove();
	document.getElementById("loading_circle").style.display = "block";
	
	var selected_language = $("input[name=language_select]:checked").val();
	
	

	var clone = $('#listofsubtitles-clone').clone();
	clone.removeAttr('style');
	$('#listofsubtitles-clone').remove();
	
	$.ajax({
	type: "POST",
	url: "sub_query.php",
	data: { token_id: "<?php echo $_GET["token"]; ?>", language: selected_language },
	success:function(data)
	{
		$("#loading_circle").remove();
		
		var json = JSON.parse(data);
		
		$('#listofsubtitles').removeAttr('style');
		
		console.log(json.data);
		
		$.each(json.data, function (key, val)
		{
			var el = clone.clone();
			
			el.find('.NameOfSubtitle').html(val.SubFileName);
			el.find('.FormatOfSubtitle').html(val.SubFormat);
			el.find('.DurationOfSubtitle').html(val.SubLastTS);
			el.find('.FPSOfSubtitle').html(val.MovieFPS);
			el.find('.DownloadZIP').html('<a target=\"_blank\" href=\"'+ val.ZipDownloadLink + '\">' + 'Link' + '</a>');
			
			$('.clone-list').append(el);
		});
		
		document.getElementById("listofsubtitles").style.display = "block";
	}
	
	});
	
	}
	
	
	function UploadSubtitles(){
		
		var formData = new FormData();
		formData.append('file', $('#file')[0].files[0]);
		
		var token_id = "<?php echo $_GET["token"]; ?>"
		
		
		formData.append('token', token_id);
		

		$.ajax({
       url : 'uploadsubtitles.php',
       type : 'POST',
       data : formData,
       processData: false,  // tell jQuery not to process the data
       contentType: false,  // tell jQuery not to set contentType
       success : function(data) {
           console.log(data);
           alert(data);
		   is_subtitle_file_uploaded = true;
       }
});
		
		
	}
	
	
var success_href = "renderfile.php?token=" + "<?php echo $_GET["token"]; ?>";

var myToken = <?=json_encode($clientToken)?>;
console.log(myToken);

	paypal.Button.render({
  braintree: braintree,
  client: {
    sandbox: myToken
  },
  env: 'sandbox', // or 'sandbox'
  commit: false,
   payment: function (data, actions) {
    return actions.braintree.create({
      flow: 'checkout', // Required
      amount: 0.99, // Required
      currency: 'USD', // Required
      enableShippingAddress: true,
      shippingAddressEditable: true,
      shippingAddressOverride: {
        recipientName: '',
        line1: '',
        line2: '',
        city: '',
        countryCode: '',
        postalCode: '',
        state: '',
        phone: ''
      }
    });
  },
   onAuthorize: function(data, actions) {
            console.log('authorize');
            console.log(data);
            console.log(actions);
			window.location.href = success_href;
           // return actions.payment.execute().then(function(res) {
             //   console.log(res);
              //  console.log('The payment was completed!');
            //});
        },
	 onCancel: function(data) {
            console.log('cancel');
            console.log(data);
            console.log('The payment was cancelled!');
        },	
  // Other configuration
}, '#pay-button');
	
	
	function PreviewClicked(){
		
		var preview_href = "renderfile_preview.php?token=" + "<?php echo $_GET["token"]; ?>";
		window.location.href = preview_href;
	}
	
	
	function AddSubtitlesClicked() {
	
	if(is_subtitle_file_uploaded != true) { alert("Add file with subtitles first!"); }
	else {
	
	
	$.ajax({
       url : 'CheckNumberOfInstances.php',
       success : function(data) {
           if(data < 15){ window.location.href = success_href; }
		   else if(data < 30){ $("#modal_premiumusers").modal() }
		   else if(data >=30){ $("#modal_overbusy").modal()	}
		   
	}});
		
	}	
		
	}

	</script>

</body>

</html>
