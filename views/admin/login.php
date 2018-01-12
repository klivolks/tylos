<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Admin Panel</title>
<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="/css/materialize.min.css"  media="screen,projection"/>
<link rel="stylesheet" type="text/css" href="/css/admin.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body class="grey lighten-4" style="height: auto !important">
	<div class="login-wrap">
		<div class="login-logo">
			<img src="/img/logo.png" class="responsive-img">
		</div>
		<div class="row grey darken-4">
			<h3 class="white-text center" style="padding-top: 20px !important;">Admin Panel</h3>
			<form method="post" action="/admin/authenticate/">
				<div class="s12">
					<div class="input-field col s12 white-text">
						<i class="material-icons prefix">account_circle</i>
						<input id="icon_prefix_1" type="text" class="validate" name="username" autocomplete="off" required>
						<label for="icon_prefix_1">Phone/Email/Username</label>
					</div>
					<div class="input-field col s12 white-text">
						<i class="material-icons prefix">fingerprint</i>
						<input id="icon_prefix_2" type="password" class="validate" name="password" required>
						<label for="icon_prefix_2">Password</label>
					</div>
					<div class="input-field col s12 center-align" style="height:50px;">
						<button type="submit" class="btn btn-flat blue validate white-text">LOGIN NOW</button>
					</div>
				</div>
			</form>
		</div>
		<div class="footer-copyright center-align black-text">
			&copy; 2018 | All rights reserved
		</div>
	</div>
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="/js/materialize.min.js"></script>
	<script type="text/javascript" src="/js/admin.js"></script>
</body>
</html>