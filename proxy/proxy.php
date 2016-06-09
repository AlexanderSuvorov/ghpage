<?php
require_once __DIR__ . '/../lib/parser.php';

$response = parseMobileResponse(file_get_contents('php://input'));
header('Location: http://udid.mercdev.com/fetch/' . $response['UDID'], true, 301);