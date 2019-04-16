<?php
  require_once "../fb/config.php";
  require_once "../data/database.php";
  $db = new MySQLconnectionTool("localhost","root","","nmcr");
  try{
    $accessToken = $helper->getAccessToken();
  } catch(\Facebook\Exceptions\FacebookResponseException $e) {
      echo 'Błąd Graph! : ' . $e->getMessage();
      exit();
  } catch(\Facebook\Exceptions\FacebookSDKException $e) {
      echo 'Błąd Facebook SDK! : ' . $e->getMessage();
      exit();
  }
  if(!$accessToken) {
    header("Location:../page/login.php");
    exit();
  }
  $oAuth2Client = $fb->getOAuth2Client();

  if (! $accessToken->isLongLived()) {
    try {
    $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
    } catch (Facebook\Exceptions\FacebookSDKException $e) {
      echo "<p>Błąd oAuth2! : " . $e->getMessage() . "</p>\n\n";
      exit;
    }
  }
  $response = $fb->get("me?fields=id,first_name,email,birthday,picture.type(large)",$accessToken);
  $data = $response->getDecodedBody();

  $count = $db->count($data['id']);
  if($count == 0){
    $query =  "INSERT INTO `users` (`FB-ID`,`imie`,`mail`,`bday`,`url`) VALUES".
              "('".$data['id']."','".$data['first_name']."','".$data['email'].
              "','".$data['birthday']."','".$data['picture']['data']['url']."')";
    $db->question($query);
    $newUser = $db->selectFBUSER($data['id']);
  }
  $_SESSION['fb_access_token'] = (string) $accessToken;
  if(isset($_SESSION['fb_access_token'])) {
    $user = $db->selectFBUSER($data['id']);
    $_SESSION['nmcrUSER_ID'] = $user['ID'];
    header('Location: ../page/app.php');
  }
  else header('Location: ../page/login.php');
?>
