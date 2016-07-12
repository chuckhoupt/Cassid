<?php
// Cassid mini-router for use with PHP standalone server
if (php_sapi_name() == 'cli-server') {
	switch ($_SERVER["REQUEST_URI"]) {
		case "/": break;
		case "/login": include "login.php"; exit;
		case "/logout": include "logout.php"; exit;
		case "/serviceValidate": include "serviceValidate.php"; exit;
		default: return false; exit;
	}
}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Cassid Server - a fake CAS login service</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="apple-touch-icon" href="apple-touch-icon.png">
	<link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Cassid Server</h1>

<p>To use this service, configure your CAS client to use:</p>

<table>
	<thead>
		<tr><th>Parameter   </th> <th>Value                         </th></tr>
	</thead>
	<tbody>
		<tr><td>CAS Host    </td> <td><?= $_SERVER["SERVER_NAME"] ?></td></tr>
		<tr><td>CAS Context </td> <td><?= $_SERVER["REQUEST_URI"] ?></td></tr>
		<tr><td>CAS Port    </td> <td><?= $_SERVER["SERVER_PORT"] ?></td></tr>
	</tbody>
</table>

</body>
</html>