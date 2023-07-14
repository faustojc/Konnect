<?php
function components($dir = APPPATH . 'helpers/components/')
{
    // Create a stack to keep track of the directories to process
    $stack = array(realpath($dir));

    // Process the directories in the stack
    while (!empty($stack)) {
        // Pop the next directory from the stack
        $dir = array_pop($stack);

        // Check if the directory exists
        if (!is_dir($dir)) {
            continue;
        }

        // Get all the files and directories in the specified directory
        $files = scandir($dir);

        // Iterate over the files and directories
        foreach ($files as $file) {
            // Skip the '.' and '..' directories
            if ($file === '.' || $file === '..') {
                continue;
            }

            // Get the real path of the current file or directory
            $path = realpath($dir . '/' . $file);

            // Check if the current item is a directory
            if (is_dir($path)) {
                // Add the subdirectory to the stack
                $stack[] = $path;
            } else {
                // Load the current file
                require_once $path;
            }
        }
    }
}
