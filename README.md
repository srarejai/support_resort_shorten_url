Details of package for Shortening or Expanding shortened URLs using Google URL shortening service.

This project is just for demo and review purposes and it is not yet a published package in packagist. Hence it cannot be downloaded and used in Laravel projects. For using this package you have to register for Google url service and get your free API Key which has to be stored in the appropriate config file.

Usage:

Execute the command:

   composer require SupportResort/Shorten_URL

Include class on top using following line:

  use SupportResort\\ShortenUrl\\Shortenurl;

Add following line to providers array in app.php:

  SupportResort\\ShortenUrl\\ShortenurlServiceProvider::class

Code:

$shortenurl = new Shortenurl();

$result = $shortenurl->shortenurl($url) // To shorten the url.

if($result === false){

  // Failure

}
else {

  // Success

}

$result = $shortenurl->expand($url) // to expand a url shortened by google services

if($result === false){

  // Failure

}
else {

  // Success

}

Results will be in array format or boolean for failure.
