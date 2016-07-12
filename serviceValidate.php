<?php

// decode user id and other info from ticket

$info = substr($_GET['ticket'], 3);
parse_str($info, $attributes);
?><cas:serviceResponse xmlns:cas='http://www.yale.edu/tp/cas'>
	<cas:authenticationSuccess>
<? foreach ($attributes as $key => $value): ?>
		<cas:<?= $key ?>><?= $value ?></cas:<?= $key ?>>
<? endforeach; ?>
	</cas:authenticationSuccess>
</cas:serviceResponse>
