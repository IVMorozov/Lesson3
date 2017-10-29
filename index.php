<?php
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

foreach ($TwoWordAnimals as $continent => $animaltypes) {
    foreach ($animaltypes as $animaltype) {
        $SpacePos=strpos($animaltype, " ", 0);
        $AnimalsPart1[$continent][] = substr($animaltype, 0, $SpacePos);
        $AnimalsPart2[] = substr($animaltype, $SpacePos+1,  strlen ($animaltype)-$SpacePos+1);
    }
}    

shuffle($AnimalsPart2);

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

foreach ($NewAnimals as $continent => $animaltypes) {
    echo "<h2>$continent</h2>";
    $RowNum = count($NewAnimals[$continent]);
    for ($i = 0; $i < $RowNum-1; $i++) {
         echo $NewAnimals[$continent][$i] . ', ';
    }
        echo $NewAnimals[$continent][$i];
}
?>
