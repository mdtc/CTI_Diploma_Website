<?PHP

  $authChk = true;
  require('app-lib.php');
  build_header($displayName);
?>
  <?PHP build_navBlock(); ?>


  <div id="content" style="text-align: center; font-family: verdana; font-size: 400%; background: #eeeeee" >
  <h2>WELCOME <b><?PHP echo  "</br>". $displayName ."</br>"; ?></b> to </h2>
  <h1 style="font-size: 350%" class="PageTitle"> LPA ecomms </h1>
  <p>A company named Logic Peripherals Australia (LPA) has decided to invest in a new computer software package to manage the sales and stock of their computer peripheral line to rollout across their corporate network an internet web site. The new system they require will be a customised application to manage the following:</P>
      <P>• Stock (Computer Peripherals)</P>
      <P>• Sales & Invoicing</P>
      <P>• eCommerce web site store with payment gateway</P>
      <P>The project will be divided into three sections with the following user interfaces:</P>
      <P>• Desktop application</P>
      <P>This application will be used for internal intranet management of the system and will only be accessible on the corporate network or via VPN access. This interface will have full access to the system core with all features.
    Mobile Application</P>
    <P>The mobile application will be used for external management of the system and will have limited access to only allow management of the stock, sales and invoicing, system administration level will not be available through this interface.
    eCommerce web site store</P>
  </div>



  <script>
  </script>
<?PHP
build_footer();
?>