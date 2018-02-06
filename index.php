<?php
$file="http://website.name/stats.txt";//Website's stats file
$headers  = get_headers($file, 1);
$fopen = fopen($file, "r");
$fread = fread($fopen,$headers['Content-Length']);
fclose($fopen);
$remove = "\n";
$split = explode($remove, $fread);
$pieces = explode(":", $split[1]);
$hosts = $pieces[1];
$pieces = explode(":", $split[2]);
$blocks = $pieces[1];
$pieces = explode(":", $split[3]);
$main = $pieces[1];
$pieces = explode(":", $split[4]);
$orphan = $pieces[1];
$pieces = explode(":", $split[5]);
$wsync = $pieces[1];
$pieces = explode(":", $split[6]);
$diff = $pieces[1];
$pieces = explode(":", $split[7]);
$supply = $pieces[1];
$pieces = explode(":", $split[8]);
$hashrate = $pieces[1];

// echo "$pieces[1]<br><br>";
// foreach ($split as $string)
// {
// // echo "$string<br><br>";
// $pieces = explode(":", $string);
// echo "$pieces[1]<br><br>";
// }
$file="http://website.name/state.txt";//Website's state file
$headers  = get_headers($file, 1);
$fopen = fopen($file, "r");
$fread = fread($fopen,$headers['Content-Length']);
fclose($fopen);
?>
<html>
<head>
	<meta http-equiv="refresh" content="60" > 
	<title>XDAG Pool Germany</title>
	<script src="https://code.jquery.com/jquery-3.3.0.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<style>
		#nav-clean { margin-bottom: 0; }
		#top-jumbotron { margin-bottom: 0; }
		table {
		    font-family: arial, sans-serif;
		    border-collapse: collapse;
		    width: 100%;
		    center
		}

		td, th {
		    border: 1px solid #dddddd;
		    text-align: left;
		    padding: 8px;
		}

		tr:nth-child(even) {
		    background-color: #dddddd;
		}
	</style>
	<!-- <script type="text/javascript">
		$(function() {
		    $(".button").click(function() {
		        // validate and process form here
		    	var address = $("input#a").val();
		    	console.log(address);
		    	// document.getElementById('balance').src = 
		    	$('#balance').attr('src', "http://xdag.me/cgi-bin/balance.cgi/index.php?a="+address);
		    });
		});
	</script> -->
</head>
<body >
	<!--Navigation bar-->
	<nav class="navbar navbar-default" id="nav-clean">
	  <div class="container">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a href="javascript:history.go(0)" class="navbar-brand">XDAG Pool</a>
	    </div>
	    <div class="collapse navbar-collapse" id="myNavbar">
	      <ul class="nav navbar-nav">
	        <li class="active"><a href="javascript:history.go(0)">Stats</a></li>
	      </ul>
		</div>
	  </div><!-- /.container-fluid -->
	</nav>
	<!--Nav bar ends here-->

	<!--Big nice Jubotron starts here-->
	<div class="jumbotron text-center" id="top-jumbotron" style="background-color: #00d1b2;">
	  <h1>XDAG Pool</h1>
	</div>
	<div class="row">
      <div class="col-lg-12" style="background-color: rgb(255,0,0);">
      	<?php
      	$filen="http://website.name/news.txt"; //change this to News.txt
		$headersn  = get_headers($filen, 1);
		$fopenn = fopen($filen, "r");
		$freadn = fread($fopenn,$headersn['Content-Length']);
		fclose($fopenn);
		?>
      	<marquee behavior="alternate" style="color: rgb(255,255,0);"><?php echo("News : ".$freadn); ?></marquee>
      	<!--If news is small keep as is.-->
      	<!--If it is long remove the behavior="alternate"-->
      </div>
    </div>
	<div class="container">
	  <div class="row">
	    <div class="col-sm-5">
	      <h3>Pool status</h3>
	      <span>&nbsp; <?php echo $fread;?> &nbsp;</span>
	      <br><br>
	      <h3>Balance check</h3>
	      <!-- Balance check form-->
		  <iframe id="balance" src="http://xdag.me/cgi-bin/balance.cgi/"></iframe>
		  <!--Form end-->
	    </div>
		 <div class="col-sm-7">
	      <h3>Detailed stats</h3>
	      	<table style="width:100%">
			  <tr>
			    <th>Hosts</th>
			    <th><?php echo "$hosts"?></th> 
			  </tr>
			  <tr>
			    <th>Blocks</th>
			    <th><?php echo "$blocks"?></th> 
			  </tr>
			  <tr>
			    <th>Main Blocks</th>
			    <th><?php echo "$main"?></th> 
			  </tr>
			  <tr>
			  	<th>Orphan Blocks</th>
			    <th><?php echo "$orphan"?></th> 
			  </tr>
			  <tr>
			  	<th>Wait Sync Blocks</th>
			    <th><?php echo "$wsync"?></th> 
			  </tr>
			  <tr>
			  	<th>Chain Difficulty</th>
			  	<th><?php echo "$diff"?></th>
			  </tr>
			  <tr>
			  	<th>XDAG supply</th>
			  	<th><?php echo "$supply"?></th>
			  </tr>
			  <tr>
			  	<th>Hourly hashrate<br>(in MHs)</th>
			  	<th><?php echo "$hashrate"?></th>
			  </tr>
			</table>
			<th>Serverversion 13.838<br>Autoupdate every 60sec</th>
	    </div>
		startcommand Windows: xdag.exe -m 1 109.90.229.170:35565<br>startcommand Linux: ./xdag -m 1 109.90.229.170:35565
	  </div>
	 
	</div>
	<footer>
		<b>&nbsp;Contributor: shauniop</b>
	</footer>
</body>
</html>
