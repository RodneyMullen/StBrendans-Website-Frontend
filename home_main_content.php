<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<div class="col1" id="main_content">
    <h1> Home</h1>
    <p> Welcome to the Coolock Parish, St Brendan's Church website <br />
        this page will give information concerning the Parish priests and Contact
        information
    </p>
<table class="wheelchair_table" cellpadding="5" cellspacing="0">
        <thead><tr><th></th></tr></thead>
        <tfoot><tr><th></th></tr></tfoot>
        <tbody>
           <TR>
                <TD>
                    <IMG class="disabled_image" src="images/disablem.png" alt="Disable logo" width="42" height="41" />
                </TD>
                <TD>
                    <p>St. Brendan's Church is wheelchair friendly.</p>
                </TD>
           </TR>
        </tbody>
</table>
               
<hr />
<?php
    include_once "notices.php";
    include_once "ParishInformation/parishpriests.php";
    include_once "contacts.php";
   
 ?>
</div>