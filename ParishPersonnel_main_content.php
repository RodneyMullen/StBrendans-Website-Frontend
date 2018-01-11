<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<div class="col1" id="main_content">
    <h1 id="OtherParishPersonnel" name="OtherParishPersonnel">OTHER PARISH PERSONNEL</h1>
    <p> This page will provide information regarding Other Personnel working within the Parish </p>
    <h3> <a href="ParishInformation.php?visits=<?php echo $visits; ?>">  Back to Parish Information </a></h3>
    <hr />
    <p>

    <table class="OtherPersonnel_table" 
        <thead><tr><th></th></tr></thead>
        <tfoot><tr><th></th></tr></tfoot>
        <tbody>
            <tr>
                <td>
                    <img class="CiaranDoyle_image" src="ParishInformation/images/Ciaran Doyle.png" alt="Ciaran Doyle" />
                </td>
                <td>

                        <h4>Ciaran Doyle</h4>
                        <p>
                            Sacristan
                        </p>

                </td>
            </tr>
            <tr>
                <td>
                    <img class ="MalachyKeena_image" src="ParishInformation/images/malachy.jpg" alt="Malachy Keena"/>
                </td>
                <td>

                        <h4>Malachy Keena</h4>
                        <p>
                            Parish Secretary
                        </p>

                </td>
            </tr>
            <tr>
                <td>
                    <img class ="PaddyCanty_image" src="ParishInformation/images/paddy.jpg" alt="Paddy Canty" />
                </td>
                <td>

                        <h4>Paddy Canty</h4>
                        <p>
                            Caretaker/Maintenance
                        </p>

                </td>
            </tr>
            <tr>
                <td>
                   <img class="MargaretSmith_image" src="ParishInformation/images/margar.jpg" alt="Margaret Smith" />
                </td>
                <td>

                        <h4>Margaret Smith</h4>
                        <p>
                            Cook
                        </p>

                </td>
            </tr>

        </tbody>
    </table>
    <hr>
    <?php

    include_once "ParishInformation/pastpriests.php";
    ?>
   


</div>
<!--

-->