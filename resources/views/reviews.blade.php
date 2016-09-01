<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="icon" href="../../favicon.ico">
      <title>Reviews</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="/starbox.css">
      <link rel="stylesheet" type="text/css" href="/styles/app.css">
   </head>
   <body>
      <div id="field" data-company=""></div>
      <div class="container">
      <div class="header clearfix">
         <h3 class="text-muted">Reputation Loop Project</h3>
      </div>
      <div class="row marketing">
         <div class="jumbotron">
            <div class="row marketing">
               <div class="col-lg-6">
                  <h2>{{$company->business_info->business_name}}</h2>
               </div>
               <div class="col-lg-6">
                  <h4>Rating</h4>
                  <div class="starbox"> </div>
                  <div class="rating-value"><span id="actualRating">{{$company->business_info->total_rating->total_avg_rating}}</span>/5</div>
               </div>
            </div>
            <div class="row marketing">
               <div class="col-lg-6">
                  <h4>Address</h4>
                  <p>{!!$company->business_info->business_address!!}</p>
               </div>
               <div class="col-lg-6">
                  <h4>Phone</h4>
                  <p>{{$company->business_info->business_phone}}</p>
               </div>
            </div>
            <div class="row marketing">
               <div class="col-lg-6">
                  <p><a href="{{$company->business_info->external_url}}" target="_blank">External Url</a></p>
               </div>
               <div class="col-lg-6">
                  <p><a href="{{$company->business_info->external_page_url}}" target="_blank">External Page Url</a></p>
               </div>
            </div>
         </div>
      </div>
      <div class="row">
         @foreach($company->reviews as $review)
	         <div class="col-lg-15 review-boxes">
	            <p><a href="{{$review->customer_url}}" target="_blank">{{$review->customer_name}} {{$review->customer_last_name}}</a></p>
	            <p><span class="date">{{$review->date_of_submission}}</span></p>
	            <p class="description">{{$review->description}}</p>
	         </div>
         @endforeach
         <nav aria-label="...">
            <ul class="pagination">
               <li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">Previous</span></a></li>
               <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
               <li class="disabled"><a href="#" aria-label="Next"><span aria-hidden="true">Next</span></a></li>
            </ul>
         </nav>
      </div>
      <!-- /container -->
      <script type="text/javascript">
      	var totalReviews = {{$company->business_info->total_rating->total_no_of_reviews}};
      </script>
      <script   src="https://code.jquery.com/jquery-3.1.0.min.js"   integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s="   crossorigin="anonymous"></script>
      <script src="scripts/fetch.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
      <script src="/scripts/starbox.js"></script>
      <script src="/scripts/main.js"></script> 
   </body>
</html>