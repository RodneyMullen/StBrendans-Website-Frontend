<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<div class="col2">
    <!-- sidebar -->
    <div class="sidebar_top">
        <img class="sidebar_top_icon" src="images/sidebar_top_icon.png" alt="icon on top of the sidebar showing a cross" />
    </div>
        <div class="sidebar_content" id="sidebar">
             <?php include_once "calendar.php"; ?>
            <?php include_once "sidebar_top_content.php"; ?>

            <h6>   Quick Links </h6>
            <h5> <a href="church.php?visits=<?php echo $visits; ?>#DownloadNewsletter">Download Newsletter</a></h5>
            <h5> <a href="MinistersOfTheEucharist.php?visits=<?php echo $visits; ?>#DownloadMinistersList">Download Ministers of the Eucharist List</a></h5>
          <!-- <h5> <a href="church.php?visits=<?php echo $visits; ?>#DownloadDocuments">Download Novena of Grace 2011 Schedule </a></h5> -->
         
              <h6> Page Links </h6>
              <p>
                   <a href="#notices">Notices</a><br />
                  <a href="#ParishPriests">Parish Priests</a><br />
                  <a href="#Contact">Contact</a>
              </p>
               <!-- It is important to add a line break at the end for the sidebar -->
               <br />
        </div>



</div>