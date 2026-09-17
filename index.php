<?php
// Normalize the request URI by removing query strings
 $request_uri = strtok($_SERVER['REQUEST_URI'], '?');
$project = '/';
// Check if the URL is the root of the project
if ($request_uri == $project || $request_uri == $project.'index.php'){
    // Include the signin.php file when the root URL is accessed
    include 'login.php';
} else {
    // Load other pages based on the request
    // Additional routing logic can go here if needed
    
}
?>
