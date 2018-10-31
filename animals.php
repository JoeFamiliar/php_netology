<?php
$continents = [
    'Africa' => [
        'African elephant',
        'Hippo',
        'Giraffe',
        'Crocodile',
        'Spotted hyena',
        'Zebra',
        'Chimpanzee',
        'Python'
    ],
    'Eurasia' => [
        'Brown bear',
        'Wolf',
        'Fire fox',
        'Snow leopard',
        'Varan',
        'Big panda',
        'White rabbit'
    ],
    'America' => [
        'Castor canadensis',
        'Arctic Wolf',
        'American Elk',
        'Racoon',
        'Skunk',
        'Mississippiensis Alligator ',
        'Caribou'
    ]
];

 
$two_words_animals = [];
foreach($continents as $continent => $animals){
    foreach($animals as $animal){
    	if(strpos($animal, " ")){
    		$parts = explode(' ', $animal);
            if(count($parts) == 2){
                $two_words_animals[] = $animal;
                $first[] = $parts[0];
                $second[] = $parts[1];
            }
    	}
    }
}
shuffle($first);
shuffle($second);
 
$new_animals = [];
$result = '';
for($i = 0; $i < count($first); $i++){
    $new_animals[]= $first[$i] . ' ' . $second[$i];
    $result .= $first[$i] . ' ' . $second[$i]."<br> ";
}

?>
<html>
    <head>
    </head>
    <body>
        <h3>1. Исходный массив</h3>
            <pre>
                <?php var_dump($continents); ?>
            </pre>
        <h3>2. Животные из двух слов</h3>
                <?php echo implode(", ", $two_words_animals); ?>
        <h3>3. Новые животные</h3>
                <?php echo $result; ?>
    </body>
</html>