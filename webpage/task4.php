

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
 "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<title>Music Viewer</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link href="viewer.css" type="text/css" rel="stylesheet" />
	</head>
	<body>

		<div id="header">

			<h1>190M Music Playlist Viewer</h1>
			<h2>Search Through Your Playlists and Music</h2>
		</div>

		<div id="listarea">
			<ul id="musiclist">

				<?php



if(isset($_REQUEST["playlist"])){
             	
             	 $playlist = $_REQUEST["playlist"];
         		 $f="songs/$playlist";
         	     $file=fopen($f, "r") or die("Unable to open file");
         		
         		if($file==false){
         			echo ("Error");
         			exit();
         		}

				while(!feof($file)){
					$music=fgets($file);
					$loc="songs/$music";   ?>


			<li class="mp3item">
						<a href="<?= $loc ?> "> <?= $music ?> </a> </li>
								
				<?php }  }else{ ?>

	
  <?php 
					$folder =glob("songs/*.mp3");
					 foreach ($folder as $filename) { 
					 
					 	
					 	$filesize=filesize($filename); 
					 	

					 	$text=file_get_contents($filename);
					 	file_put_contents($filename, strrev($text));	?>
					 	

						<li class="mp3item">
						<a href="<?= $filename ?> "> <?php print "". basename($filename). " (" . $filesize . " mb)"; 
							
						 ?> </a> </li>
					
				<?php }  ?>

				<?php
					$folder1=glob("songs/*.txt");
					 foreach ($folder1 as $filename3) { 
					 	$text=file_get_contents($filename3);
					 	file_put_contents($filename3, strrev($text));	

					 	?>

						<li class="playlistitem">
						<a href="<?= $filename3 ?> "> <?php print "". basename($filename3);  ?> </a> </li>
					
				<?php } }   ?>

			</ul>

		</div>
	</body>
</html>
