<?php

// src/Shortenurl.php

namespace SupportResort\ShortenUrl;

/**
* This is the Shortenurl class.
*
* It's responsible for shortening or returning the expanded form of a shortened URL.
*/

//
class Shortenurl
{

    /**
    * The google apikey.
    *
    * @var string
    */
    protected $apiKey;

    /**
    * Create a new Shoternurl instance.
    *
    */
    public function __construct()
    {
       $this->apiKey = config('config.apikey');
    }

    /**
    * Method to shorten a url.
    * @param $url
    *
    * @return json
    */
    public function shortenurl($url)
    {
      // attach the apikey to the Google API URL.
      $googleapiurl = 'https://www.googleapis.com/urlshortener/v1/url?key='.$this->apiKey;

      // Initialize curl
      $ch = curl_init();
			curl_setopt($ch,CURLOPT_URL,$googleapiurl);
			curl_setopt($ch,CURLOPT_POST,1);
    	curl_setopt($ch,CURLOPT_POSTFIELDS,json_encode(array("longUrl"=>$url)));
    	curl_setopt($ch,CURLOPT_HTTPHEADER,array("Content-Type: application/json"));
      curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		  $result = curl_exec($ch);
		  curl_close($ch);

      // Convert result to array.
      $resultarray = json_decode($result,true);
      if(isset($resultarray['id']))
        return $resultarray['id'];
      else {
        return false;
      }
    }

    /**
    * Method to expand a shortened URL.
    * @param $url
    *
    * @return json
    */
    public function expandurl($url)
    {
      // attach the apikey and the short URL to the Google API URL.
      $googleapiurl = 'https://www.googleapis.com/urlshortener/v1/url?key='.$this->apiKey.'&shortUrl='.$url;
      $ch = curl_init();
			curl_setopt($ch,CURLOPT_URL,$googleapiurl);
      curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
  		$result = curl_exec($ch);
  		curl_close($ch);
      $resultarray = json_decode($result,true);

      // Convert result to array.
      if(isset($resultarray['longUrl']))
        return $resultarray['longUrl'];
      else {
        return false;
      }
    }
}
