<?PHP
  $authChk = true;
  require('app-lib.php');
  isset($_REQUEST['sid'])? $sid = $_REQUEST['sid'] : $sid = "";
  if(!$sid) {
    isset($_POST['sid'])? $sid = $_POST['sid'] : $sid = "";
  }
  isset($_REQUEST['a'])? $action = $_REQUEST['a'] : $action = "";
  if(!$action) {
    isset($_POST['a'])? $action = $_POST['a'] : $action = "";
  }
  isset($_POST['txtSearch'])? $txtSearch = $_POST['txtSearch'] : $txtSearch = "";
  if(!$txtSearch) {
    isset($_REQUEST['txtSearch'])? $txtSearch = $_REQUEST['txtSearch'] : $txtSearch = "";
  }
  if($action == "delRec") {
    $query =
      "UPDATE lpa_invoices SET
         lpa_inv_status = 'U'
       WHERE
         lpa_inv_no = '$sid' LIMIT 1
      ";
    openDB();
    $result = $db->query($query);
    if($db->error) {
      printf("Errormessage: %s\n", $db->error);
      exit;
    } else {
      header("Location: sales.php?a=recDel&txtSearch=$txtSearch");
      exit;
    }
  }

  isset($_POST['txtInvoiceNo'])? $invoiceNo = $_POST['txtInvoiceNo'] : $invoiceNo = gen_ID();
  isset($_POST['txtInvoiceDate'])? $invoiceDate = $_POST['txtInvoiceDate'] : $invoiceDate = "";
  isset($_POST['txtInvoiceClientID'])? $invoiceClientID = $_POST['txtInvoiceClientID'] : $invoiceClientID = "";
  isset($_POST['txtInvoiceClientName'])? $invoiceClientName = $_POST['txtInvoiceClientName'] : $invoiceClientName = "";
  isset($_POST['txtInvoiceClientAddress'])? $invoiceClientAddress = $_POST['txtInvoiceClientAddress'] : $invoiceClientAddress = "";
  isset($_POST['txtInvoiceAmount'])? $invoiceAmount = $_POST['txtInvoiceAmount'] : $invoiceAmount = "0.00";
  isset($_POST['txtInvoiceStatus'])? $invoiceStatus = $_POST['txtInvoiceStatus'] : $invoiceStatus = "";
  $mode = "insertRec";
  if($action == "updateRec") {
    $query =
      "UPDATE lpa_Invoice SET
         lpa_inv_no = '$invoiceNo',
         lpa_inv_date = '$invoiceDate',
         lpa_inv_client_ID = '$invoiceClientID',
         lpa_inv_client_name = '$invoiceClientName',
         lpa_inv_client_address = '$invoiceClientAddress',
         lpa_inv_amount = '$invoiceAmount',
         lpa_inv_status = '$invoiceStatus'
       WHERE
         lpa_inv_no = '$sid' LIMIT 1
      ";
     openDB();
     $result = $db->query($query);
     if($db->error) {
       printf("Errormessage: %s\n", $db->error);
       exit;
     } else {
         header("Location: sales.php?a=recUpdate&txtSearch=$txtSearch");
       exit;
     }
  }
  if($action == "insertRec") {
    $query =
      "INSERT INTO lpa_invoices (
         lpa_inv_no,
         lpa_inv_date,
         lpa_inv_client_ID,
         lpa_inv_client_name,
         lpa_inv_client_address,
         lpa_inv_amount,
         lpa_inv_status
       ) VALUES (
         '$invoiceNo',
         '$invoiceDate',
         '$invoiceClientID',
         '$invoiceClientName',
         '$invoiceClientAddress',
         '$invoiceAmount',
         '$invoiceStatus'
       )
      ";
    openDB();
    $result = $db->query($query);
    if($db->error) {
      printf("Errormessage: %s\n", $db->error);
      exit;
    } else {
      header("Location: sales.php?a=recInsert&txtSearch=".$invoiceNo);
      exit;
    }
  }

  if($action == "Edit") {
    $query = "SELECT * FROM lpa_invoices WHERE lpa_inv_no = '$sid' LIMIT 1";
    $result = $db->query($query);
    $row_cnt = $result->num_rows;
    $row = $result->fetch_assoc();
    $invoiceNo     = $row['lpa_inv_no'];
    $invoiceDate   = $row['lpa_inv_date'];
    $invoiceClientID   = $row['lpa_inv_client_ID'];
    $invoiceClientName = $row['lpa_inv_client_name'];
    $invoiceClientAddress  = $row['lpa_inv_client_address'];
    $invoiceAmount  = $row['lpa_inv_amount'];
    $invoiceStatus = $row['lpa_inv_status'];
    $mode = "updateRec";
  }
  build_header($displayName);
  build_navBlock();
  $fieldSpacer = "5px";
?>

  <div id="content">
    <div class="PageTitle">Invoice Record Management (<?PHP echo $action; ?>)</div>
    <form name="frmInvRec" id="frmInvRec" method="post" action="<?PHP echo $_SERVER['PHP_SELF']; ?>">
      <div>
        <input name="txtInvoiceNo" id="txtInvoiceNo" placeholder="Invoice No" value="<?PHP echo $invoiceNo; ?>" style="width: 100px;" title="Invoice No">
      </div>
      <div style="margin-top: <?PHP echo $fieldSpacer; ?>">
        <input name="txtInvoiceDate" id="txtInvoiceDate" placeholder="Invoice Date" value="<?PHP echo $invoiceDate; ?>" style="width: 400px;"  title="Invoice Date">
      </div>
      <div style="margin-top: <?PHP echo $fieldSpacer; ?>">
        <input name="txtInvoiceClientID" id="txtInvoiceClientID" placeholder="Invoice Client ID" value="<?PHP echo $invoiceClientID; ?>" style="width: 400px" title="Invoice Client ID">
      </div>
      <div style="margin-top: <?PHP echo $fieldSpacer; ?>">
        <input name="txtInvoiceClientName" id="txtInvoiceClientName" placeholder="Invoice Client Name" value="<?PHP echo $invoiceClientName; ?>" style="width: 400px"  title="Invoice Client Name">
      </div>
      <div style="margin-top: <?PHP echo $fieldSpacer; ?>">
        <input name="txtInvoiceClientAddress" id="txtInvoiceClientAddress" placeholder="Invoice Client Address" value="<?PHP echo $invoiceClientAddress; ?>" style="width: 400px"  title="Invoice Client Address">
      </div>
	  <div style="margin-top: <?PHP echo $fieldSpacer; ?>">
        <input name="txtInvoiceAmount" id="txtInvoiceAmount" placeholder="Invoice Amount" value="<?PHP echo $invoiceAmount; ?>" style="width: 400px"  title="Invoice Amount">
      </div>
      <div style="margin-top: <?PHP echo $fieldSpacer; ?>">
        <div>Invoice Status:</div>
        <input name="txtStatus" id="txtInvoiceStatus" type="radio" value="P">
          <label for="txtInvoiceStatusActive">Paid</label>
        <input name="txtStatus" id="txtInvoiceStatus" type="radio" value="U">
          <label for="txtInvoiceStatusInactive">Unpaid</label>
      </div>
      <input name="a" id="a" value="<?PHP echo $mode; ?>" type="hidden">
      <input name="sid" id="sid" value="<?PHP echo $sid; ?>" type="hidden">
      <input name="txtSearch" id="txtSearch" value="<?PHP echo $txtSearch; ?>" type="hidden">
    </form>
    <div class="optBar">
      <button type="button" id="btnInvoiceSave">Save</button>
      <button type="button" onclick="navMan('sales.php')">Close</button>
      <?PHP if($action == "Edit") { ?>
      <button type="button" onclick="delRec('<?PHP echo $sid; ?>')" style="color: darkred; margin-left: 20px">DELETE</button>
      <?PHP } ?>
    </div>
  </div>
  <script>
    var InvoiceRecStatus = "<?PHP echo $invoiceStatus; ?>";
    if(InvoiceRecStatus == "p") {
      $('#txtInvoiceStatusActive').prop('checked', true);
    } else {
      $('#txtInvoiceStatusInactive').prop('checked', true);
    }
    $("#btnInvoiceSave").click(function(){
		if(document.getElementById("txtInvoiceDate").value == "" ||
		document.getElementById("txtInvoiceClientID").value == "" ||
		document.getElementById("txtInvoiceClientName").value == "" ||
		document.getElementById("txtInvoiceClientAddress").value == "")
		{
				alert ("You have empty fields");
		}
		else
		{
				$("#frmInvRec").submit();
		}
        
    });
    function delRec(ID) {
      navMan("salesaddedit.php?sid=" + ID + "&a=delRec");
    }
    setTimeout(function(){
      $("#txtInvoiceDate").focus();
    },1);
  </script>
<?PHP
build_footer();
?>