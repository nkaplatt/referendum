<?php
 /*
  * Logs a user into Facebook
  * Currently returns the user to the first page after login
  * 1st argument is login/logout URL
  * 2nd argument is where to redirect to after login
  *
  * If we get authorization errors, this is probably the cause:
  * http://stackoverflow.com/questions/25296979/facebook-api-4-0-how-to-avoid-this-authorization-code-has-expir
ed
  * http://stackoverflow.com/questions/24039756/facebook-this-authorization-code-has-been-used-typeoauthexcepti
on-code
  * Solution is to get the login status and the access token is provided in the response
  */
 // INCLUSION OF LIBRARY FILEs
       require_once( 'lib/Facebook/FacebookSession.php');
       require_once( 'lib/Facebook/FacebookRequest.php' );
       require_once( 'lib/Facebook/FacebookResponse.php' );
       require_once( 'lib/Facebook/FacebookSDKException.php' );
       require_once( 'lib/Facebook/FacebookRequestException.php' );
       require_once( 'lib/Facebook/FacebookRedirectLoginHelper.php');
       require_once( 'lib/Facebook/FacebookAuthorizationException.php' );
       require_once( 'lib/Facebook/GraphObject.php' );
       require_once( 'lib/Facebook/GraphUser.php' );
       require_once( 'lib/Facebook/GraphSessionInfo.php' );
       require_once( 'lib/Facebook/Entities/AccessToken.php');
       require_once( 'lib/Facebook/HttpClients/FacebookCurl.php' );
       require_once( 'lib/Facebook/HttpClients/FacebookHttpable.php');
       require_once( 'lib/Facebook/HttpClients/FacebookCurlHttpClient.php');
 // USE NAMESPACES
       use Facebook\FacebookSession;
       use Facebook\FacebookRedirectLoginHelper;
       use Facebook\FacebookRequest;
       use Facebook\FacebookResponse;
       use Facebook\FacebookSDKException;
       use Facebook\FacebookRequestException;
       use Facebook\FacebookAuthorizationException;
       use Facebook\GraphObject;
       use Facebook\GraphUser;
       use Facebook\GraphSessionInfo;
       use Facebook\FacebookHttpable;
       use Facebook\FacebookCurlHttpClient;
       use Facebook\FacebookCurl;

 function facebookLoginLogout( $abs_url, $abs_url_redirect ) {
     echo "Working...";
           //1.Stat Session
           session_start();
     //check if users want to logout
     if( isset($_REQUEST['logout'])) {
       unset($_SESSION['fb_token']);
     }

     //2.Use app id,secret and redirect url
     $myfile = fopen( "../id.txt", "r") or die("Unable to open file!");
     $myIP   = fopen( "../secret.txt", "r") or die("Unable to open file!");
     $app_id = fread($myfile,filesize("../id.txt"));
     $app_secret = fread($myIP,filesize("../secret.txt"));

     $app_id = trim($app_id);
     $app_secret = trim($app_secret);
     fclose($myfile);
     fclose($myIP);

           //3.Initialize application, create helper object and get fb sess
     FacebookSession::setDefaultApplication($app_id,$app_secret);
     $helper = new FacebookRedirectLoginHelper($abs_url);
     $sess = $helper->getSessionFromRedirect();

     //check if the seesion hasn't been created
     if(isset($_SESSION['fb_token'])) {
       $sess = new FacebookSession($_SESSION['fb_token']);
                                                               // <-- Could put a database access point here if already logged in
     }
     //logout URL
     $logout = $abs_url . '?logout=true';//&logout=true';

     //4. if fb sess exists echo name
           if(isset($sess)){                                              //If session exists:
       //store the token in the php session
                         $_SESSION['fb_token']=$sess->getToken();
       $appsecret_proof = hash_hmac('sha256', $_SESSION['fb_token'], $app_secret);                     //THIS SHOULD WORK damit
       //create request object,execute and capture response
       //$request = new FacebookRequest($sess,'GET','/me');
       $request = new FacebookRequest($sess,'GET','/me?fields=id,name,email', array("appsecret_proof" =>  $appsecret_proof));

       // from response get graph object
       $response = $request->execute();
       $graph = $response->getGraphObject(GraphUser::classname());
       // use graph object methods to get user details
       $name = $graph->getName();
       $id = $graph->getId();
       $image = 'https://graph.facebook.com/'.$id.'/picture?width=60';    //width arg is optional
       $email = $graph->getProperty('email');
       addEmailFBLogin($email, $abs_url_redirect);                                           // <-- DATABASE FUNCTION

       echo "hi $name <br>";
       echo "your email is $email <br><br>";
       echo "<img src='$image' /><br><br>";
       echo "<a href='".$logout."'><button>Logout</button></a>";

       //redirect_to('file:///Users/James/Desktop/los-template.webflowMay/get-started.html');

     } else {                                                           //Else echo login info:
         //echo $helper->getLoginUrl(array('email'));
         echo 'This is where it should work:         ';
         redirect_to($helper->getLoginUrl(array('email')));
                     echo '<a href='.$helper->getLoginUrl(array('email')).'>Login with facebook and pray a little bit more</a>';
     }
   }

 function redirect_to($new_location) {
         header("Location: " . $new_location);
         exit;
 }

   function addEmailFBLogin( $email_address, $abs_redirect_url ) {
   //WARNING: DOESN'T HANDLE DUPLICATE SESSION_IDs YET
     $email_address = $email_address . 'EU';
     $Session_ID = hash('sha256', $email_address);
     //$Session_ID = '1000';

     //Open Database connection
     $dbuser = "remoterootuser";

     //Contains IP + Password
     $myfile = fopen( "../lemons.txt", "r") or die("Unable to open file!");
     $myIP   = fopen( "../IP.txt", "r") or die("Unable to open file!");
     $dbpass = fread($myfile,filesize("../lemons.txt"));
     $dbhost = fread($myIP,filesize("../IP.txt"));

     fclose($myfile);
     fclose($myIP);

     $dbpass = trim($dbpass);
     $dbhost = trim($dbhost);

     $dbname = "test";
       $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
       // Test if connection occured
       if (mysqli_connect_errno()) {
               die("Database connection failed: " .
                               mysqli_connect_error() .
                               " (" . mysqli_connect_errno() . ")"
               );
       }
       $email_address = mysqli_real_escape_string($connection, $email_address);

       //2. Perform database query
     if (check_fbuser_exists($Session_ID, $connection)) {
       echo "Weclome back!";
       redirect_to($abs_redirect_url);                                                                        //URL REDIRECTION
       //redirect_to('http://localhost/apps/fblogin/fbloginDB.php');
     }
     else {
       $query  = "INSERT INTO User_tbl (MUser_ID, Email_Address) ";
       $query .= "VALUES ( '{$Session_ID}', '{$email_address}' );";
         $result = mysqli_query($connection, $query);

       redirect_to($abs_redirect_url);                                                                        //URL REDIRECTION

       if ($result) {
               // redirect_to("another_page.php");
               echo "Email Harvested :P ";
       }
       else {
               //$message = "Subject creation failed";
               die("Database query failed" . mysqli_error($connection));
       }
   }

   }

   function check_fbuser_exists($Session_ID, $connection) {
                       $query = "SELECT * ";
                 $query .= "FROM User_tbl ";
                 $query .= "WHERE MUser_ID = '$Session_ID'";
                 $query .= "LIMIT 1";
                 $email_set = mysqli_query($connection, $query);
                 confirm_query($email_set);
     if($Session_ID = mysqli_fetch_assoc($email_set)) {
       return true;
     } else {
       return false;
                 }
   }
       function confirm_query($result_set) {
               if (!$result_set) {
                       die("Database query failed.");
               }
 }
?>
