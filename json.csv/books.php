<?php

if (!empty($argv[1])) {
    
    $filename = "https://www.googleapis.com/books/v1/volumes?q=";
    $handle = fopen('books.csv', 'w+');

    if ($handle !== FALSE) 
    {
        $data = fgetcsv($handle, 1000, ",");
    }

    $search = $argv;

    if ($argc > 2) {
    	unset($search[0]);
    	$book = implode("%20", $search);
    } else {
    	$book = $search[1];
    }

    $contents = file_get_contents($filename.$book);
    $json = json_decode($contents, true);
    switch (json_last_error()) {
        case JSON_ERROR_NONE:
            echo ' - No errors';
        break;
        case JSON_ERROR_DEPTH:
            echo ' - Maximum stack depth exceeded';
        break;
        case JSON_ERROR_STATE_MISMATCH:
            echo ' - Underflow or the modes mismatch';
        break;
        case JSON_ERROR_CTRL_CHAR:
            echo ' - Unexpected control character found';
        break;
        case JSON_ERROR_SYNTAX:
            echo ' - Syntax error, malformed JSON';
        break;
        case JSON_ERROR_UTF8:
            echo ' - Malformed UTF-8 characters, possibly incorrectly encoded';
        break;
        default:
            echo ' - Unknown error';
        break;
    }
   
    foreach ($json['items'] as $searchRes) {
        if(is_array($searchRes['volumeInfo']['authors'])){
            if(count($searchRes['volumeInfo']['authors']) < 2) {
                $authors = $searchRes['volumeInfo']['authors'][0];
            } else {
                $authors = implode(', ', $searchRes['volumeInfo']['authors']);
            } 
        } else {
            $authors = $searchRes['volumeInfo']['authors'][0];
        }
    	$row = [$searchRes['id'], $searchRes['volumeInfo']['title'], $authors];
    	fputcsv($handle, $row);
    }
    fclose($handle);

} else {
    exit('Название книги не было передано');
}
?>