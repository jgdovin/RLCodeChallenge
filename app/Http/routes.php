<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

use GuzzleHttp\Client;

$app->get('/', function () use ($app) {
	return redirect("reviews");
});

$app->get('/reviews[/{noOfReviews}[/{offset}]]', ['as' => 'reviews', function ($noOfReviews=10, $offset=0) use ($app) {
	$apiKey = isset($_GET['apiKey']) ? $_GET['apiKey'] : env('API_KEY');
    $query = array(
    	'apiKey' => $apiKey,
    	'noOfReviews' => $noOfReviews,
    	'offset' => $offset,
    	'google' => 1,
    	'internal' => 1,
    	'yelp' => 1,
    	'threshold' => 1
    );
    $client = new Client();
    $request = $client->request('GET', 'http://test.localfeedbackloop.com/api', ['query' => $query]);
    // json_decode($request->getBody())
    return view('reviews', ['company' => json_decode($request->getBody())]);
}]);
