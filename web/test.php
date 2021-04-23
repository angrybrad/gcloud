<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


echo 'hi<br />';

// Create recursive dir iterator which skips dot folders
$dir = new RecursiveDirectoryIterator('/tmp/',
    FilesystemIterator::SKIP_DOTS);

// Flatten the recursive iterator, folders come before their files
$it  = new RecursiveIteratorIterator($dir,
    RecursiveIteratorIterator::SELF_FIRST);

// Maximum depth is 1 level deeper than the base folder
$it->setMaxDepth(1);

// Basic loop displaying different messages based on file or folder
foreach ($it as $fileinfo) {
    if ($fileinfo->isDir()) {
        printf("Folder - %s\n", $fileinfo->getFilename()).'<br/>';
    } elseif ($fileinfo->isFile()) {
        printf("File From %s - %s\n", $it->getSubPath(), $fileinfo->getFilename()).'<br/>';
    }
}

$contents = file_get_contents('/tmp/logs/web.log');
echo '<p>'.$contents.'</p>';