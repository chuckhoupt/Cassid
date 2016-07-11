<?php
header('Content-Type: text/plain');
exec('git fetch --all ; git checkout --force origin/master 2>&1', $output, $status);
if ($status != 0) http_response_code(500);
echo implode("\n", $output);
echo "\n";
