<?PHP
$clientChk = true;
require('app-lib.php');
isset($_POST['a'])? $action = $_POST['a'] : $action = "";
$msg = null;


build_headerCostumer($displayName);

build_ClientnavBlock();

?>

<div><?php echo $displayName; ?></div>






<div id="content">
    <div class="sectionHeader">Check Out</div>

      <table borde="0px">
          <form name="frmclientReg" id="frmclientReg" method="post" action="<?PHP echo $_SERVER['PHP_SELF']; ?>">
             <tr> <div name="txtclientID" id="txtclientID" style="width: 100px;" >Client ID : <?PHP echo $row['lpa_client_ID']; ?></div>
          </tr>


              <tr>
              <td>
                  <div>First Name:
                      <td  style="width: 300px"> <?PHP echo $row['lpa_client_firstname']; ?>
                      </td>
                  </div>
              </td>
          </tr>

          <tr>
              <td>
                  <div>Last Name:
                  <td  style="width: 300px"> <?PHP echo $row['lpa_client_lastname']; ?>
                      </td>
                  </div>
              </td>
          </tr>

          <tr>
              <td>
                  <div>Address:
                  <td  style="width: 300px"> <?PHP echo $row['lpa_client_address']; ?>
                  </div>
              </td>
          </tr>
    <tr>
        <td>
            <div>Phone Number:
            <td  style="width: 300px"> <?PHP echo $row['lpa_client_phone']; ?>
        </td>
        </div>
        </td>
    </tr>
 
    <tr>
        <td>
            <div>Number of Items: <?php isset($_COOKIE['totalItems'])? $totalItem = $_COOKIE['totalItems'] : $totalItem = ""; ?>
        <td  style="width: 300px"> <?PHP echo $totalItem; ?>
        </td>
        </div>
        </td>
    </tr>
 
    <tr>
        <td>
            <div>Total Amount: <?php isset($_COOKIE['price'])? $price = $_COOKIE['price'] : $price = ""; ?>
            <td  style="width: 300px"> <?PHP echo $price; ?>    $
        </td>
        </div>
        </td>
    </tr> 

<tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr> <tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr> <tr><td></td></tr><tr><td></td></tr>
    <tr>
    <div><td style="width: 300px">Payment Method</td></div>
    <td style="width: 300px"><input name="txtStatus" id="txtStockStatusActive" type="radio" value="a">
          <label for="txtStockStatusActive">MasterCard</label>
          <img src="images/master.png" alt="Mastercard" width="60" height="45"> 
          <input name="txtStatus" id="txtStockStatusInactive" type="radio" value="i">
          <label for="txtStockStatusInactive">Visa</label>
          <img src="images/visa.png" alt="Visa" width="60" height="45">
          <tr><td></td></tr> <tr><td></td></tr><tr><td></td></tr>
          <tr>
          <td></td>
          <td style="width: 300px">
          <input name="txtStatus" id="txtStockStatusActive" type="radio" value="a">
          <label for="txtStockStatusActive">Direct Debit</label>
          <img src="images/debit.jfif" alt="DirectDebit" width="50" height="45">
          <input name="txtStatus" id="txtStockStatusActive" type="radio" value="a">
          <label for="txtStockStatusActive">Paypal</label>
          <img src="images/paypal.png" alt="Paypal" width="60" height="45"></td></tr>
      </div>
    </tr>
    <tr>
              <td>
                  <div>Card Number:
                      <td><input style="width: 200px">
                      </td>
                  </div>
              </td>
          </tr>
          <tr>
              <td>
                  <div>Expire Date: 
                      <td><input style="width: 200px">
                      </td>
                  </div>
              </td>
          </tr>
          <tr>
 
    </form>


        <tr>
            <div class="optBar"></div> </tr>
<tr>
            <div>
                <td>  <button type="button" onclick="navMan('CheckOut.php')">Process Payment</button></td>
            <td> <button type="button" name="btnCancel" id="btnCancel" onclick="navMan('Cart.php')">Cancel</button> </td>
    </div>
    </tr>




  </table>

  <?PHP
build_footerClient();
  ?>