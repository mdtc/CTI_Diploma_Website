<?PHP
/**
 * Set the global time zone
 *   - for Brisbane Australia (GMT +10)
 */
date_default_timezone_set('Australia/Queensland');


/**
 * Global variables
 */

// Database instance variable
$db = null;
$displayName = "";


// Start the session
session_name("lpaecomms");
session_start();

isset($_SESSION["authUser"])?
  $authUser = $_SESSION["authUser"] :
  $authUser = "";
isset($_SESSION["isAdmin"])?
  $isAdmin = $_SESSION["isAdmin"] :
  $isAdmin = "";
isset($_SESSION["authClient"])?
    $authClient = $_SESSION["authClient"] :
    $authClient = "";



if(isset($authChk) == true) {
  if($authUser) {
    openDB();
    $query = "SELECT * FROM lpa_users WHERE lpa_user_ID = '$authUser' LIMIT 1";
    $result = $db->query($query);
    $row = $result->fetch_assoc();
    $displayName = $row['lpa_user_firstname']." ".$row['lpa_user_lastname'];
  } else {
    header("location: login.php");
  }
}



if(isset($adminChk) == true) {
	if(!$isAdmin)
	{
		header("location: index.php");
	}
}

if(isset($clientChk) == true) {
    if($authClient) {
        openDB();
        $query = "SELECT * FROM lpa_clients WHERE lpa_client_ID = '$authClient' LIMIT 1";
        $result = $db->query($query);
        $row = $result->fetch_assoc();
        $displayName = $row['lpa_client_firstname']." ".$row['lpa_client_lastname'];
    } else {
        header("location: CustomerLogin.php");
    }
}




/**
 * Connect to database Function
 * - Connect to the local MySQL database and create an instance
 */
function openDB() {
  global $db;
  if(!is_resource($db)) {
    /* Conection String eg.: mysqli("localhost", "lpaecomms", "letmein", "lpaecomms")
     *   - Replace the connection string tags below with your MySQL parameters
     */
    $db = new mysqli(
      "localhost",
      "ipa_ecomms",
      "server",
      "ipa_ecomms"
    );
    if ($db->connect_errno) {
      echo "Failed to connect to MySQL: (" .
        $db->connect_errno . ") " .
        $db->connect_error;
    }
  }
}

/**
 * Close connection to database Function
 * - Close a connection to the local MySQL database instance
 * @throws Exception
 */
function closeDB() {
  global $db;
  try {
    if(is_resource($db)) {
      $db->close();
    }
  } catch (Exception $e)
  {
    throw new Exception( 'Error closing database', 0, $e);
  }
}


/**
 * System Logout check
 *
 *  - Check if the logout button has been clicked, if so kill session.
 */
if(isset($_REQUEST['killses']) == "true") {
  $_SESSION = array();
  if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
      $params["path"], $params["domain"],
      $params["secure"], $params["httponly"]
    );
  }
  session_destroy();
}



/**
 *  Build the page header function
 */
function build_header() {
  global $displayName;

  include 'header.php';
}

function build_headerCostumer() {
  global $displayName;

  include 'headerCostumer.php';
}


/**
 * Build the Navigation block
 */
function build_navBlock() {
	isset($_SESSION["isAdmin"])?
		$isAdmin = $_SESSION["isAdmin"] :
		$isAdmin = "";
	?>

<div class="topnav">
  <a class="active" onclick="navMan('index.php')">MAIN MENU</a>
  <a onclick="navMan('index.php')">HOME</a>
  <a onclick="navMan('stock.php')">STOCK</a>
  <a onclick="navMan('sales.php')">SALES</a>
  <a onclick="navMan('mashup.php')">MASHUP</a>
  
  
  <?PHP
    if($isAdmin){
  ?>    
      <a onclick="navMan('users.php')">USERS</a>

  <?PHP } ?>

  <a onclick="navMan('CustomerLogin.php?killses=true')">COSTUMER PAGE</a>
  <a onclick="navMan('login.php?killses=true')">LOGOUT</a>

</div>


<!-- <div id="navBlock">
        <div id="navHeader">MAIN MENU</div>
      <div class="navItem" onclick="navMan('index.php')">HOME</div>
            <div class="navItem" onclick="navMan('stock.php')">STOCK</div>
            <div class="navItem" onclick="navMan('sales.php')">SALES</div>
            
	  <?PHP
      if($isAdmin) {
		?> 
		  <div class="menuSep"></div>
		  <div class="navTitle">Administration</div>
		  <div class="navItem" onclick="navMan('users.php')">USERS</div>

		<?PHP } ?>

        <div class="menuSep"></div>
        <div  class="navItem" onclick=" navMan('CustomerLogin.php?killses=true')">CUSTOMER PAGE</div>
        <div class="navItem" onclick="navMan('login.php?killses=true')">LOGOUT</div>

    </div> -->
  
<?PHP
}



/**
 * Build the Navigation Client block
 */
function build_ClientnavBlock() {

    ?>

   <!-- <div id="navBlock">
        <div id="navHeader">MAIN MENU</div>
        <div class="navItem" onclick="navMan('indexClient.php')">HOME</div>
        <div class="navItem" onclick="navMan('mashup.php')">MASHUP</div>
        <div class="navItem" onclick="navMan('products.php')">PRODUCT CATALOG</div>
        <div class="navItem" onclick="navMan('Cart.php')">CART</div>

        <div class="menuSep"></div>
        <div class="navItem" onclick="navMan('login.php?killses=true')">USER PAGE</div>
        <div class="navItem" onclick="navMan('CustomerLogin.php?killses=true')">LOGOUT</div>

    </div> -->
	
	 <nav class="navbar navbar-default ">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
<!--      <a class="navbar-brand" href="#">LPA Demo</a>-->
      <img src="images/ic_lpa.png" onclick="navMan('indexClient.php')" class="logoImg pointer">
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
      <li><a onclick="navMan('indexClient.php')">HOME</a></li>
      <li ><a onclick="navMan('mashup.php')">MASHUP</a></li>
      <li ><a onclick="navMan('products.php')">PRODUCT CATALOG</a></li>
      <li ><a onclick="navMan('Cart.php')">CART</a></li>
      <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">USER MENU<span class="caret"></span></a>
          <ul class="dropdown-menu">
          <li ><a onclick="navMan('login.php?killses=true')">USER PAGE</a></li>
            <li ><a onclick="navMan('CustomerLogin.php?killses=true')">LOGOUT</a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
    </div><!--/.nav-collapse -->
  </div>
</nav>
 
    <?PHP
}



function goBack() { ?>
        <div class="navItem" onclick="navMan('CustomerLogin.php')">Back To Login</div>
        <?php

}



/**
 * Create an ID
 * - Create a unique id.
 *
 * @param string $prefix
 * @param int $length
 * @param int $strength
 * @return string
 */
function gen_ID($prefix='',$length=3, $strength=0) {
  $final_id='';
  for($i=0;$i< $length;$i++)
  {
    $final_id .= mt_rand(0,9);
  }
  if($strength == 1) {
    $final_id = mt_rand(100,999).$final_id;
  }
  if($strength == 2) {
    $final_id = mt_rand(10000,99999).$final_id;
  }
  if($strength == 4) {
    $final_id = mt_rand(1000000,9999999).$final_id;
  }
  return $prefix.$final_id;
}

/**
 *  Build the page footer function
 */
function build_footer() {
  include 'footer.php';
}

function build_footerClient(){
  include 'footerClient.php';
}

function logfile($result, $username )
{
    $log = date("F j, Y, g:i a") . PHP_EOL .
        "Attempt: " . ($result == true ? 'Login Successful' : 'Login Failed') . PHP_EOL .
        "User: " . $username . PHP_EOL .
        "-------------------------------------------------------------------------------" . PHP_EOL;
//Save string to log, use FILE_APPEND to append.
    file_put_contents('lpalog/log'. '.log', $log, FILE_APPEND);
}


function lpa_log($log_msg)
{
    $log_filename = "log";
    if (!file_exists($log_filename)) {
      mkdir($log_filename, 0777, true);
    }
    $log_file_data = $log_filename.'/lpalog.log';
    $log_msg = "LOG - IP address: " . $_SERVER['REMOTE_ADDR'] . ' - ' . PHP_EOL . date('d/m/Y H:i:s') . ": {$log_msg}" . PHP_EOL . "--------------------------" . PHP_EOL;
    file_put_contents($log_file_data, $log_msg . "\n", FILE_APPEND);
}

function better_crypt($input, $rounds = 10)
  {
    $salt = "";
    $salt_chars = array_merge(range('A','Z'), range('a','z'), range(0,9));
    for($i=0; $i < 22; $i++) {
      $salt .= $salt_chars[array_rand($salt_chars)];
    }
    return crypt($input, sprintf('$2y$%02d$', $rounds) . $salt);
  }

?>