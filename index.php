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

<h1>Cassid Server</h1>

<p>To use this service, configure your CAS client to use:</p>

<table>
<tr><td>CAS Host</td><td><?= $_SERVER["SERVER_NAME"] ?></td></tr>
<tr><td>CAS Context</td><td><?= $_SERVER["REQUEST_URI"] ?></td></tr>
<tr><td>CAS Port</td><td><?= $_SERVER["SERVER_PORT"] ?></td></tr>
</table>
