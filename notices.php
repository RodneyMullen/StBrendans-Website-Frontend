<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<div  class="notices">
    <table class="Notices_table"  >
        <caption id="notices" name="notices"><h2>Parish Notices </h2></caption>
        <thead><tr><td></td></tr></thead>
        <tfoot><tr><td></td></tr></tfoot>
        <tbody>
            <tr>
                <td >
                    <img id="noticeboard_topfinal_image" src="images/noticeboard_topfinal.png" alt="Top image of the noticeboard"/>
                </td>
            </tr>
            <tr>
                <td>
                    <?php
                            include_once "getnotices.php";
                     ?>
                    
                </td>

            </tr>
            <tr>
                <td>
                    <img id="noticeboard_bottomfinal" src="images/noticeboard_botttomfinal.png" alt="Bottom image of the noticeboard"/>
                </td>
            </tr>

        </tbody>


    </table>
             
         


</div>
<hr/>