<?php
$num_aleatorio = [rand(1, 100), rand(1, 100), rand(1, 100), rand(1, 100), rand(1, 100)];
for ($i = 0; $i < count ($num_aleatorio); $i++) {
    for ($h = 0; $h < count ($num_aleatorio); $h++) {
        if ($num_aleatorio[$i] < $num_aleatorio[$h]) {
            $temp = $num_aleatorio[$i];
            $num_aleatorio[$i] = $num_aleatorio[$h];
            $num_aleatorio[$h] = $temp;
        }
    }
}

foreach ($num_aleatorio as $numero) {
    echo "$numero\n";
}

?>