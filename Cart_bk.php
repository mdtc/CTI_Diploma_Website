<?PHP
$clientChk = true;
require('app-lib.php');
isset($_POST['a'])? $action = $_POST['a'] : $action = "";
  if(!$action) {
    isset($_REQUEST['a'])? $action = $_REQUEST['a'] : $action = "";
  }
  
build_header($displayName);


?>
<?php  build_ClientnavBlock();
 ?>
<div id="content">
    <div class="PageTitle">YOUR SHOPPING CART</div>

    <div>
      <table style="width: calc(100% - 15px);border: #cccccc solid 1px">
        <tr style="background: #eeeeee">
          <td style="text-align: center; width: 80px;border-left: #cccccc solid 1px"><b>Code</b></td>
          <td style="text-align: center; border-left: #cccccc solid 1px"><b>Name</b></td>
          <td style="width: 80px;text-align: center"><b>Quantity</b></td>
          <td style="text-align: left; border-left: #cccccc solid 1px"><b>Image</b></td>
          <td style="width: 80px;text-align: center"><b>Price</b></td>
          <td style="width: 80px;text-align: center"><b>Remove from Cart</b></td>


        </tr>
                    <?php $price = 0;
                    $qty = 0;
                    $totalItems = 0;

                    for ($i=0; $i<99; $i++) {
                            $name1 = 'cartItem';
                            $name2 = $name1.$i;
                            isset($_COOKIE[$name2])? $cookie = $_COOKIE[$name2] : $cookie = "";
                                if ($cookie == isset($_COOKIE[$name2])) {
                                    $item = $cookie;
                                    echo $item;
                                    openDB();
                                    $query =
                                    "SELECT * FROM
                                    lpa_stock
                                    WHERE lpa_stock_ID LIKE '%$item%' AND lpa_stock_status <> 'D' 
                                     ";  
                                     $result = $db->query($query);                                   

                                     $row_cnt = $result->num_rows;
                                     if($row_cnt >= 1) {

                                       while ($row = $result->fetch_assoc()) {
                                        if ($row['lpa_image']) {
                                            $prodImage = $row['lpa_image'];
                                          } else {
                                            $prodImage = "question.png";
                                          }
                                         $sid = $row['lpa_stock_ID'];

                                         if ($item == $sid){
                                           $totalItems = $totalItems + 1;
                                           ?>

                                                  <tr><td></td> <td></td>
                                                  <td style="text-align: center">
                                            <?php echo $qty ?>                                                 
                                                </tr> 
                                         <tr class="hl">
                                           <td style="text-align: center">
                                             <?PHP echo $sid; ?>
                                           </td>
                                           <td style="text-align: center">
                                               <?PHP echo $row['lpa_stock_name']; ?>
                                           </td>
                                           <td style="text-align: center">
                                           <?php $qty = 1;
                                            ?>
                                            <?php echo $qty ?>
                                           </td>
                                           <td style="text-align: center" width="35" height="50">
                                           <div class="productListItemImageFrame"  style="align: center; background: url('images/<?PHP echo $prodImage; ?>') no-repeat center center;">
                                            </div>
                                           </td>
                                           <td style="text-align: center">
                                             <?PHP echo $row['lpa_stock_price']; ?>
                                           </td>
                                           <td style="text-align: center"> <button id="btndel" name="btndel" onclick="deleteCookie('<?PHP echo $name2; ?>'); navMan('Cart.php')"> Remove </button> </td>
                                           
                                           
                                       </tr> <?php 
                                       
                                    $price = ($price + $row['lpa_stock_price']);
                                    }} }}
                                  }?>
                                       <tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>
                                         <tr class="PageTitle" style="background: #eeeeee" >
          <td style="border-left: #cccccc solid 1px"> TOTAL </td>
                        <td style="width: 80px;text-align: right"></td>
                        <td style="width: 80px;text-align: center"><?php echo $totalItems ?></td>
                        <td style="width: 80px;text-align: right"></td>
                                         <td style="width: 80px;text-align: center"> 
                                         <?php echo $price; ?>
                                           </td>
                                           <td style="width: 80px;text-align: right"></td>


                    </tr>
                    <tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>
                    <tr>
                    <td><button style="width: 120px; height:40px" type="button" id="btnback" onclick="navMan('products.php')">Back to Catalog</button></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <?php if ($totalItems > 0) { ?>
          <td> 
          
            <button style="width: 120px; height:40px" type="button" id="btnAddRec" onclick="setCookie('totalItems',<?php echo $totalItems; ?>,1); setCookie('price',<?php echo$price; ?>,1); navMan('Payment.php')">Confirm</button> </td> <?php } else
            { ?> <td></td> <?php } ?>
                    </tr>
                                         </table>
                                         </div>
                                         </div>

                            

              

<script>

</script>


<?php
build_footer();
?>