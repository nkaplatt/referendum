 <?php
  /*
   * Logs a user into Facebook
   * Currently returns the user to the first page after login
   * 1st argument is login/logout URL
   * 2nd argument is where to redirect to after login
   *
   * If we get authorization errors, this is probably the cause:
   * http://stackoverflow.com/questions/25296979/facebook-api-4-0-how-to-avoid-this-authorization-code-has-expired
   * http://stackoverflow.com/questions/24039756/facebook-this-authorization-code-has-been-used-typeoauthexception-code
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
	    $app_id = '971763709605827';
	    $app_secret = 'ec3ece13a426a0bc33578c1bfb9ed4c4';

	    //3.Initialize application, create helper object and get fb sess
      FacebookSession::setDefaultApplication($app_id,$app_secret);
      $helper = new FacebookRedirectLoginHelper($abs_url_redirect);
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
        addEmailFBLogin($email);                                           // <-- DATABASE FUNCTION

        echo "hi $name <br>";
        echo "your email is $email <br><br>";
        echo "<img src='$image' /><br><br>";
        echo "<a href='".$logout."'><button>Logout</button></a>";

      } else {                                                           //Else echo login info:
		      echo '<a href='.$helper->getLoginUrl(array('email')).'>Login with facebook and pray a little bit more</a>';
      }

    }

    function addEmailFBLogin( $email_address ) {
    //WARNING: DOESN'T HANDLE DUPLICATE SESSION_IDs YET
    
      $Session_ID = 23;                          //Not using indexing yet
      $First_Name = 'Limacon';
      $Last_Name = 'Bernoulli';
      $hashed_password = 'password123';

      //1. Create database connection
    	$dbhost = "localhost";
    	$dbuser = "root";
    	$dbpass = "Serious1sql";
    	$dbname = "EU_db";
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
    	$query  = "INSERT INTO User_tbl (Session_ID, Email_Address, First_Name,
                                       Last_Name, hashed_password) ";
      $query .= "VALUES ( {$Session_ID},
                          '{$email_address}',
                          '{$First_Name}',
                          '{$Last_Name}',
                          '{$hashed_password}') ; ";

    	$result = mysqli_query($connection, $query);
      /*if(mysql_num_rows($result) == 0) {
        echo "whoah, email already harvested ";
      }
      else {
        echo "email soon to be harvested ";
      }*/
    	if ($result) {
    		// redirect_to("another_page.php");
    		echo "Email Harvested :P ";
    	}
    	else {
    		//$message = "Subject creation failed";
    		die("Database query failed" . mysqli_error($connection));
    	}

    }

?>
