<?php
header('Content-Type: text/html; charset=utf-8');
$Animals = [
    'Europe' => [
        'Alauda arvensis',
        'Anser cinereus',
        'Canis vulpes',
        'Cyprinidae',
        'Hirundo rustica',
        'Anser',
        'Sus scrofa ferus'
    ],
    'Africa' => [
        'Giraffa camelopardalis',
        'Gorilla',
        'Connochaetes gnou'
     ],
    'North America' => [
        'Mammuthus columbi',
        'Vultur cinereus'
    ],
    'Australia' => [
        'Sarcophilus harrisii',
        'Macropus'
    ],
    'Asia' => [
        'Ursus arctos',
        'Tigris regulis'
    ],
];
echo '<h2>Исходный массив:</h2>';
echo '<pre>';
print_r($Animals);

$TwoWordAnimals = [];

foreach ($Animals as $continent => $animaltypes) {
    foreach ($animaltypes as $animaltype) {
        If (substr_count($animaltype, ' ') ==  1) {
            $TwoWordAnimals[$continent][]= $animaltype;
            }
    }
}    
echo PHP_EOL;
echo '<h2>Массив только из двух слов:</h2>';
echo '<pre>';
print_r($TwoWordAnimals);

$AnimalsPart1 = [];
$AnimalsPart2 = [];

foreach ($TwoWordAnimals as $continent => $animaltypes) {
    foreach ($animaltypes as $animaltype) {
        $pieces = explode(" ", $animaltype);
        $AnimalsPart1[$continent][] = $pieces[0];
        $AnimalsPart2[] = $pieces[1];
    }
}    

shuffle($AnimalsPart2);

$NewAnimals = [];
$i=0;
foreach ($AnimalsPart1 as $continent => $animaltypes) {
    foreach ($animaltypes as $animaltype) {
        $NewAnimals[$continent][] = $animaltype . " " . $AnimalsPart2[$i++];
    }
}

echo PHP_EOL;
echo '<h2>Массив новый:</h2>';
echo '<pre>';
print_r($NewAnimals);

echo PHP_EOL;
echo '<h2>Массив форматированный, с запятыми:</h2>';
foreach ($NewAnimals as $continent => $animaltypes) {
    echo "<h2>$continent</h2>";
    echo (implode (", ", $animaltypes));
}
?>
