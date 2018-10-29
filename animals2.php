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
        'Alligator mississippiensis',
        'Caribou'
    ]
];
 
$name_two_words = [];
foreach($continents as $continent => $animals){
    foreach($animals as $animal){
        $all_animals= [];
        $anim = explode(' ', $animal);
        $all_animals[]=$anim;
     
        foreach($all_animals as $k){
            if(count($k) === 2){
                $comma_separated = implode(",", $k);
                $str = str_replace(',', ' ', $comma_separated);
                $name_two_words[]=$str;
            }
        }
    }
}
 
echo '<pre>';
var_dump($name_two_words);
echo '<pre>';
 
foreach($name_two_words as $name){
    $parts = explode(' ', $name);
    $first[] = $parts[0];
    $second[] = $parts[1];
}
/*
echo '<pre>';
var_dump($first);
var_dump($second);
echo '<pre>';
*/
$random_first_word = [];
 
while (count($random_first_word) < count($name_two_words)){
   $proverka = $first[rand(0, count($name_two_words)-1)];
    if (!in_array($proverka, $random_first_word)) {
        array_push($random_first_word, $proverka);
    }
}
 
//var_dump($random_first_word);
 
$random_second_word = [];
 
while (count($random_second_word) < count($name_two_words)){
    $proverka = $second[rand(0, count($name_two_words)-1)];
    if (!in_array($proverka, $random_second_word)) {
        array_push($random_second_word, $proverka);
    }
}
 
//var_dump($random_second_word );
 
$final_result = [];
 
for($i = 0; $i < count($name_two_words); $i++){
    $final_result[]= $random_first_word[$i] . ' ' . $random_second_word[$i];  
}
 
var_dump($final_result);