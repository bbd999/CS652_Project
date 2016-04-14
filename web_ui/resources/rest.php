<?php
/* About Put
 * You can pass regular query string or json or anything else
 * just make sure that you encode your fields and specify the
 * correct headers Content-Type and possibly Content-Length.
 * -- Currently json not working.
 */
function put($url, $fields, $headers)
{
  $ch = curl_init($url);  //initialize and set url
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT"); //set as put request
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $fields); //set fields, ensure they are properly encoded
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); // set headers pass encoding here and tokens.
  $response = curl_exec($ch); // save the response
  curl_close ($ch);
  return $response;
}
/* About Get
 * pass the url, url parameters, headers,
 * if using userpwd pass a value to userPW
 */
function get($url, $headers=array(), $userPW=0, $params=array())
{
  $paramLength = count($params);
  // only set params if there are some else url is fine
  if ($paramLength > 0)
  {
    $url = $url.'?'.http_build_query($params,'','&');
  }
  //echo $url . "<br/>";
  $ch = curl_init();
  // set the url
  curl_setopt($ch, CURLOPT_URL, $url);
  // set http method
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
  if ($userPW <> 0)
  {
    curl_setopt($ch, CURLOPT_USERPWD, User_Creds::PingUser . ":" . User_Creds::PingPass);
  }
  $headerLength = count($headers);
  if ($headerLength > 0)
  {
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  }
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
  //get response
  $response = curl_exec($ch);
  curl_close($ch);
  return $response;
}
/* About Post
 *
 */
function post($url, $headers, $fields)
{
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $fields); //set fields, ensure they are properly encoded
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); // set headers pass encoding here and tokens.
  curl_setopt($ch, CURLOPT_POST, true);
  $response = curl_exec($ch);
  curl_close($ch);
  return $response;
}
?>