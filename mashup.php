<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


<?PHP
  $authChk = true;
  require('app-lib.php');
  build_header($displayName);
?>

  <?PHP build_navBlock(); ?>



<div id="container">
    <div class="p-1 mb-2 bg-danger text-white text-center"><h4>MASHUP</h4></div>

  <div class="row">
    <div class="col">
         <div class="ml-3 backg">
             <h1>Mission</h1><p class="text-center">Logical Peripherals Australia’s mission is to supply high quality computer peripherals, reliable
                                                      customer service and above all customer satisfaction. We strive to deliver the very best in the
                                                       latest technologies and support our customers with the highest after sales support, allowing our
                                                      customers to enjoy the best of technology that our ever-changing world demands.</p>
                                                            
         </div>
      </div>
    <div class="col">
        <p class="text-center">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3540.1217255004244!2d153.02714841564736!3d-27.46546952309996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b915a1d772edb2d%3A0xa10d73f1dee93c97!2sCanterbury%20Technical%20Institute!5e0!3m2!1sen!2sau!4v1582267405876!5m2!1sen!2sau" width="700" height="450" frameborder="0" style="border:0;" allowfullscreen="true"></iframe>
        </p>
    </div>

  </div>

  <div class="row mt-4">  
    <div class="col">
      <p class="text-left">
        <iframe class="youtube" width="900" height="315" src="https://www.youtube.com/embed/bau4XBLzkE0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </p>
    </div>
    <div class="col">
    <p class="text-center">
      <script async defer src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2"></script>  
        <div class="fb-post" 
          data-href="https://www.facebook.com/20531316728/posts/10154009990506729/"
          data-width="700"></div>
        </div>
    </p>
  </div>
       
        
 </div>
      

<?PHP

build_footer()

?>


