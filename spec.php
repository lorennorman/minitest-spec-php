<?php

$dir_iterator = new RecursiveDirectoryIterator("spec");
$iterator = new RecursiveIteratorIterator($dir_iterator, RecursiveIteratorIterator::SELF_FIRST);

foreach ($iterator as $file) {
	if ( preg_match("/\.php$/", $file) ) {
		echo `php $file`;
	}
}
