<?php
switch ($_SERVER['REQUEST_METHOD']):
case 'GET': ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Cassid Fake Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="robots" contents="noindex, nofollow">
	<link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Fake CAS Login</h1>
<form method="post">
	<p><label>User: <input name="user" placeholder="fake user ID" required autofocus autocomplete="username" autocorrect="off"></label>
	<p><button>Fake Login</button>
</form>

<h2>Shortcuts</h2>

<form method="post"><input name="user" type="hidden" value="admin"><button>Login as Admin</button></form>
<form method="post"><input name="user" type="hidden" value="user1"><button>Login as User1</button></form>

</body>
</html>

<?php
	break;

case 'POST':

	$ticket = [
		'ticket' => "ST-" . http_build_query($_POST)
	];
	$query = http_build_query($ticket);

	$service_url = parse_url($_GET['service']);
	
	if (isset($service_url['query'])) {
		$service_url['query'] .= '&' . $query;
	} else {
		$service_url['query'] = $query;
	}

	
	//var_dump($service_url);

	header("Location: " . unparse_url($service_url), true, 303);
	//echo("Location: " . unparse_url($service_url));
	
break; endswitch;

// From http://php.net/manual/en/function.parse-url.php#106731
function unparse_url($parsed_url) { 
	$scheme   = isset($parsed_url['scheme']) ? $parsed_url['scheme'] . '://' : ''; 
	$host     = isset($parsed_url['host']) ? $parsed_url['host'] : ''; 
	$port     = isset($parsed_url['port']) ? ':' . $parsed_url['port'] : ''; 
	$user     = isset($parsed_url['user']) ? $parsed_url['user'] : ''; 
	$pass     = isset($parsed_url['pass']) ? ':' . $parsed_url['pass']  : ''; 
	$pass     = ($user || $pass) ? "$pass@" : ''; 
	$path     = isset($parsed_url['path']) ? $parsed_url['path'] : ''; 
	$query    = isset($parsed_url['query']) ? '?' . $parsed_url['query'] : ''; 
	$fragment = isset($parsed_url['fragment']) ? '#' . $parsed_url['fragment'] : ''; 
	return "$scheme$user$pass$host$port$path$query$fragment"; 
} 
