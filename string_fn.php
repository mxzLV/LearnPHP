<?php
$full_name = "Vuong Sy Hanh";
$length = strlen($full_name);
$rev = strrev($full_name);
$lower = strtolower($full_name);
$upper = strtoupper($full_name);
echo $full_name, "<br>";
echo $rev, "<br>";
//find and replace
echo str_replace(' ', ',', $full_name), "<br>";
// str_starts_with()
// str_ends_with()
echo "<h1> html string </h1><br>";
echo htmlspecialchars("<h1>html string </h1>"), "<br>";
