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


              <h6> Page Links </h6>
              <p>
                   
                   <a href="Lourdes2010.php?visits=<?php echo $visits; ?>"> Lourdes 2010</a><br />
                    <a href="Lourdes2009.php?visits=<?php echo $visits; ?>"> Lourdes 2009</a><br />
                  <a href="Lourdes2008.php?visits=<?php echo $visits; ?>"> Lourdes 2008</a><br />
                 <a href="LourdesArchive.php?visits=<?php echo $visits; ?>"> Lourdes Archive</a><br />
                 <a href="InsideTheChurch.php?visits=<?php echo $visits; ?>"> Inside the Church</a><br />
                 <a href="ParishCentre&Garden.php?visits=<?php echo $visits; ?>"> Parish Centre & Garden</a><br />
                 <a href="CoolockVillage.php?visits=<?php echo $visits; ?>"> Coolock Village</a><br />
                 <a href="Other.php?visits=<?php echo $visits; ?>"> Other</a><br />
                 <a href="Colleges.php?visits=<?php echo $visits; ?>"> Colleges</a><br />
                 <a href="ChurchAlbum.php?visits=<?php echo $visits; ?>"> Church</a>

              </p>
               <!-- It is important to add a line break at the end for the sidebar -->
               <br />
        </div>



</div>

  