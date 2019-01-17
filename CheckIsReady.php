<?php

	$token_string = $_GET['token'];
	

	//if( strpos(file_get_contents("TokensWithError.txt"),$token_string) !== false) {
    //    echo "error";
    //}

    //else if( strpos(file_get_contents("ActuallyProcessedTokens.txt"),$token_string) === false) {
    //    echo "success";
    //}
	
		$search = $token_string;
		$file = file("TokensWithError.txt");
			foreach($file as $line) {
		$line = trim($line);
			if($line == $search) {
				echo "error";
				exit;
			}
			}
			
		$search = $token_string;
		$file = file("ActuallyProcessedTokens.txt");
			foreach($file as $line) {
		$line = trim($line);
			if($line == $search) {
				echo "stillproccess";
				exit;
			}
			
			}
		echo "success";

?>
