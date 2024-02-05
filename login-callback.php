<?php

require_once 'src/Facebook/autoload.php';

$fb = new Facebook\Facebook([
  'app_id' => '943566510716363',
  'app_secret' => '1663d2d299a757af03b5f04023737645',
  'default_graph_version' => 'v14.0',
]);

$helper = $fb->getRedirectLoginHelper();

try {
  $accessToken = $helper->getAccessToken();
} catch (Facebook\Exception\ResponseException $e) {
  // Handle error
} catch (Facebook\Exception\SDKException $e) {
  // Handle error
}

if (isset($accessToken)) {
  $fb->setDefaultAccessToken($accessToken);

  try {
    $response = $fb->get('/me?fields=email');
    $user = $response->getGraphUser();
    $email = $user->getEmail();

    // Use the email for further processing or user registration

    // Redirect the user to the desired page after successful login
    header('Location: http://localhost/Mysteria/public/home/home.php');
    exit();
  } catch (Facebook\Exception\FacebookResponseException $e) {
    // Handle error
  } catch (Facebook\Exception\FacebookSDKException $e) {
    // Handle error
  }
}

// Redirect the user to the login page with an error message
header('Location: http://localhost/Mysteria/shared/signup.php?error=1');
exit();