<?php
//error_reporting(E_ALL & ~E_NOTICE);
require __DIR__.'/vendor/autoload.php';

$client = Algolia\AlgoliaSearch\SearchClient::create(
    'key','token'
  );  // add Key Token
  
$index = $client->initIndex('index_name');  // add index name from algolia desktop

// Push Products to Algolia
$pushProducts = json_decode(file_get_contents(__DIR__.'/js/products.json'),true);

$res = $index->saveObjects($pushProducts);
$res->wait();

//Search the index 
$objects = $index->search('Panoramic'); 
print_r($objects);

?>