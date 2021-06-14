
     <?php if(isset($_GET['s'])) { 
          $getSuccess =  $_GET['s'];
      ?>
        <div class="alert alert-success" id="alert"><?php echo $getSuccess; ?></div>
      <?php } else if(isset($_GET['f'])) { 
         $getFail = $_GET['f'];
      ?>

        <div class="alert alert-danger" id="alert"><?php echo $getFail; ?></div>

      <?php } else if(isset($_GET['i'])) { 
        $getUpdate = $_GET['i'];
      ?>

        <div class="alert alert-info" id="alert"><?php echo $getUpdate; ?></div>

      <?php } ?>
