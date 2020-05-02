<?PHP
$clientChk = true;

  require('app-lib.php');

  isset($_REQUEST['a'])? $action = $_REQUEST['a'] : $action = "";
if(!$action) {
    isset($_POST['a'])? $action = $_POST['a'] : $action = "";
}
isset($_COOKIE['lpaecomms'])? $lpaCookie = $_COOKIE['lpaecomms'] : $lpaCookie = "";
isset($_COOKIE['price'])? $price = $_COOKIE['price'] : $price = ""; 
$mode = "insertRec";



 ?>
<?php
 build_headerCostumer($displayName);


  $date = date("is");
  $dateTime = date("Y-m-d G:i:s");
  echo date("D M d, Y G:i a");
  //$invNo = $row['lpa_client_ID'].$date;
  $usName = $row['lpa_client_username'];
  $usAddress = $row['lpa_client_address'];



  openDB();
    $query =
        "SELECT lpa_inv_no FROM lpa_invoices";
    $result = $db->query($query);
    $row_cnt = $result->num_rows;
    
    while ($row1 = $result->fetch_assoc()) { 
      echo $row1['lpa_inv_no'];
      if ($row_cnt < $row1['lpa_inv_no']){
        $invNum =$row1['lpa_inv_no']+1;
      } else {
        $invNum =$row_cnt+1;
      }
    }





    if($action == "insertRec") {

     openDB();
    $query =
        "INSERT INTO lpa_invoices (
         lpa_inv_date,
         lpa_inv_client_ID,
         lpa_inv_client_name,
         lpa_inv_client_address,
         lpa_inv_amount,
         lpa_inv_status
       ) VALUES (
         '$dateTime',
         '$usName',
         '$displayName',
         '$usAddress',
         '$price',
         'P'
       )
      ";
 
    $result = $db->query($query);
    if($db->error) {
        printf("Errormessage: %s\n", $db->error);
        exit;
    }
    


    if (isset($_SERVER['HTTP_COOKIE'])) {
      $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
      foreach($cookies as $cookie) {
          $parts = explode('=', $cookie);
          $name = trim($parts[0]);
          if ($name <> 'lpaecomms') {
          setcookie($name, '', time()-1000);
          setcookie($name, '', time()-1000, '/');}
      }
  }
  header("location: indexClient.php");
  }



 
  

 ?>
<div id="content" class="PageTitle" style="align: center; font-family: verdana; font-size: 400%" >
  <h2>Payment Successful  </h2> </div>
  <table>
  <form name="frmclient" id="frmclient" action="<?PHP echo $_SERVER['PHP_SELF']; ?>">
  <tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
  <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
  <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
  <td style="font-size: 100%; text-align: left" >Invoice Number: </td> 
  <td><?php echo $invNum; ?> </td></tr>

  <tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
  <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
  <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
  <td style="font-size: 100%; text-align: left" >Date: </td>
  <td><?php echo $dateTime; ?> </td></tr>

  <tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
  <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
  <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
  <td style="font-size: 100%; text-align: left" >UserName: </td>
  <td><?php echo $usName; ?> </td></tr>

  <tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
  <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
  <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
  <td style="font-size: 100%; text-align: left" >Customer Name: </td>
  <td><?php echo $displayName; ?> </td></tr>

  <tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
  <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
  <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
  <td style="font-size: 100%; text-align: left" >Customer Address: </td>
  <td><?php echo $usAddress; ?> </td></tr>

  <tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
  <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
  <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
  <td style="font-size: 100%; text-align: left" >Customer Phone: </td>
  <td><?php echo $row['lpa_client_phone']; ?> </td></tr>

  <tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
  <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
  <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
  <td style="font-size: 100%; text-align: left" >Total Payment:  </td>
  <td><?php echo $price; ?> $ </td></tr>

  <input name="a" id="a" value="<?PHP echo $mode; ?>" type="hidden">

  </form>
  
  <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
  <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
  <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>

  <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
  <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
  <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
  <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>

  <tr><td style="align: right" >  <button type="button" name="btnCon" id="btnCon">Confirm and Exit</button></td></tr>
  
 </table> 
  </div>
 
  <script>

$("#btnCon").click(function(){
            $("#frmclient").submit();
            alert("Thank You for your Preference!!");
        });
  </script>


<?PHP
build_footerClient();
?>