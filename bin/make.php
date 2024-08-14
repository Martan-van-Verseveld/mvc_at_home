<?php



function create_file(string $name, string $type)
{
	$files = __DIR__ . '/files/';
	$new_fp = dirname(__DIR__) . "/src/" . ucfirst($type) . "s/" . ucfirst($name) . ucfirst($type) . ".php";

	if (file_exists($new_fp)) {
		throw new Exception("File already exists");
	} else {
		$contents = file_get_contents($files . ucfirst($type) . ".php");
		file_put_contents($new_fp, str_replace("__CLASS__NAME__", ucfirst($name), $contents));
	}
}


if (count($argv) > 1) {
	switch(strtolower($argv[1]))
	{
		case 'controller':
			create_file($argv[2], $argv[1]);
			break;

		default:
			break;
	}
}
