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
    		$two_words_animals[] = $animal;
    		$parts = explode(' ', $name);
		    $first[] = $parts[0];
		    $second[] = $parts[1];
    	}
    }
}
shuffle($first);
shuffle($second);
 
$new_animals = [];
 
for($i = 0; $i < count($first); $i++){
    $final_result[]= $first[$i] . ' ' . $senond[$i];  
}
 
var_dump($final_result);
?>