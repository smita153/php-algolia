<?php
error_reporting(E_ALL & ~E_NOTICE);
require __DIR__.'/vendor/autoload.php';
$client = Algolia\AlgoliaSearch\SearchClient::create(
    'Application ID','Admin API Key'
  );  // Add App ID and key from dashboard
  
$index = $client->initIndex('YOUR_INDEX_NAME'); // Add your index
$index->setSettings(array(
  "searchableAttributes" => [
    "name","brand","categories","unordered(description)"
  ],
  "customRanking" => ["desc(popularity)"]

));

?>