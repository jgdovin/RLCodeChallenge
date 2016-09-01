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

$app->get('/reviews[/{page}[/{noOfReviews}]]', ['as' => 'reviews', function ($page=1, $noOfReviews=10) use ($app) {
	$apiKey = isset($_GET['apiKey']) ? $_GET['apiKey'] : env('API_KEY');
	$offset = ($page - 1) * $noOfReviews;
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
    $response = json_decode($request->getBody());
    //api is returning invalid total_reviews vs how many reviews
    //are actually there, so this is a temporary work around
    //send user to page 1 if no results show on current page
    if(isset($response->responseCode) && $response->responseCode == 1) {
    	return redirect("reviews");
    }
    $paging = new stdClass();
    $paging->total_reviews = $response->business_info->total_rating->total_no_of_reviews;
    $paging->total_pages = ceil($paging->total_reviews / $noOfReviews);
    $paging->current_page = $page;
    return view('reviews', ['paging' => $paging, 'company' => json_decode($request->getBody())]);
}]);
