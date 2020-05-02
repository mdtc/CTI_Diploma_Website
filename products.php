<?PHP
$clientChk = true;
  require('app-lib.php');

  build_headerCostumer($displayName);
  isset($_POST['a'])? $action = $_POST['a'] : $action = "";
?>

<?php if ($authClient) {
    build_ClientnavBlock();
} else  {
    build_navBlock();
} ?>

  <div id="content">
    <div class="sectionHeader">Product List</div>

  <form action="" method="post">
    <div class="setionSearch">
      <div>
        <input id="txtSearch" name="txtSearch" value="" placeholder="Search....">
        <button type="submit">Search</button>
        <button type="button"onclick="navMan('Cart.php')">Go to YOUR Shopping Cart</button>
          <?php if ($authUser){ ?>
        <button type="button" onclick="loadURL('stock.php')">Add Stock</button> <?php }?>
      </div>
    </div>
    <input type="hidden" name="a" value="search">

  </form>

<?PHP
    
    if($action == "search") {
      openDB();
      $query =
      "UPDATE lpa_stock SET
         lpa_stock_status = 'D'
       WHERE
         lpa_stock_onhand = 0 
      ";
    $result = $db->query($query);

    openDB();
    $query =
      "UPDATE lpa_stock SET
         lpa_stock_status = 'a'
       WHERE
         lpa_stock_onhand != 0 
      ";
    $result = $db->query($query);
    

      isset($_POST['txtSearch'])? $itmSearch = $_POST['txtSearch'] : $itmSearch = "";
      openDB();
      $query = "SELECT * FROM lpa_stock " .
        "WHERE lpa_stock_name LIKE '%$itmSearch%' " .
        "AND lpa_stock_status = 'a' " .
        "ORDER BY lpa_stock_name ASC";
      $result = $db->query($query);

      while ($row = $result->fetch_assoc()) {
        
        if ($row['lpa_image']) {
          $prodImage = $row['lpa_image'];
        } else {
          $prodImage = "question.png";
        }
        $prodID = $row['lpa_stock_ID'];
               
        
      
        ?>
        <div class="productListItem">
          <div
            class="productListItemImageFrame"
            style="background: url('images/<?PHP echo $prodImage; ?>') no-repeat center center;">
          </div>
          <div class="prodTitle"><?PHP echo $row['lpa_stock_name']; ?></div>
          <div class="prodDesc"><?PHP echo $row['lpa_stock_desc']; ?></div>
          <div class="prodOptionsFrame">
            <div class="prodPriceQty">
              <div class="prodPrice">$<?PHP echo $row['lpa_stock_price']; ?></div>
              <div class="prodQty"><!--QTY:--></div>
              <div class="prodQtyFld">
              <?php //<input ?><div
                  name="fldQTY-<?PHP echo $prodID; ?>"
                  id="fldQTY-<?PHP echo $prodID; ?>"
                  type="number"
                  value="1"> </div>
              </div>
            </div>
            <div class="prodAddToCart">
            
              <button
                type="button" name="btnaddcart" id="btnaddcart"
                onclick="addToCart('<?PHP echo $prodID; ?>')">
                <img src="images/cart.png" alt="Add to cart" width="25" height="30">
               </button>
            </div>
          </div>
          <div style="clear: left"></div>
        </div>
      <?PHP }  ?>
      </div>
    <?PHP
    } 
     ?>
  <script>

    function loadURL(URL) {
      window.location = URL;
    }


    
  </script>


<?PHP
  build_footerClient();
?>


