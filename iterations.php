<?php
for ($i = 0; $i < 10; $i++) {
    echo $i;
}
echo "<br>";
$i = 0;
while ($i <= 20) {
    echo $i;
    $i++;
}
echo "<br>";
// do while
// foreach
$hex_colors = [
    'red' => "FF0000",
    'green' => "#00FF00",
    "blue" => "0000FF"
];
foreach ($hex_colors as $index => $hex_color) {
    echo "$index: $hex_color <br>";
}
