<?php
    include "admin/mysqladm.php";
    include "admin/connect.php";
    include "visitcounter.php";
    if(isset($visits) == false)
    {
        $visits=0;
    }
    $visits=computeVisitors($visits); // works out visitor number

    $url = $_SERVER['PHP_SELF'];
    $url_array = explode('/',$url);
   // $current_page = $url_array[path];
    $current_page=$url_array[1];
  




?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta type="description" content="St Brendan's Parish in Coolock, Dublin. This website gives information about the Catholic Church Parish from mass times, events, Priests, photogallery, webcam in the church, Parish history and general information about the Parish" />
        <meta type="keywords" content="St Brendans, Parish, Coolock, Church, Dublin , Catholic, Priests, Marish Fathers "    />
        <link rel="stylesheet" type="text/css" href="stbrendanspages.css"/>
        
        <script type="text/javascript" src="Javascript/calendar_insert.js"></script>
        <title> St Brendan's Parish</title>
    </head>
    <body>
    
        <div class="header" id="header" name="header">
            <img class="header_pic" src="images/header.png" alt="Image on top of a cross, an altar and a banner reading St Brendan's Parish, Coolock, Dublin" />
        </div>
       
        <div class="toolbar" id="toolbar" name="toolbar">
            <table class="toolbar_table" summary="Toolbar showing two glass pane icons and links">
                    <thead><tr><th></th></tr></thead>
                    <tfoot><tr><th></th></tr></tfoot>
                    <tbody>
                        <tr>
                          <td>
                              
                                 <img class="toolbarpane_pic" src="images/toolbar_left_icon.png" alt="glass pane on left to start toolbar" />
                            </td>
                            <td>
                                <img class="toolbarcandle_pic" src="images/<?php if($current_page=='index.php'){ echo 'candle_lit.png';}else{echo 'candle_unlit.png';} ?>" alt="small icon of a lit candle" /> <a href="index.php?visits=<?php echo $visits; ?>"> Home</a>
                            </td>
                            <td>
                               <img class="toolbarcandle_pic" src="images/<?php if($current_page=='Church.php'){ echo 'candle_lit.png';}else{echo 'candle_unlit.png';} ?>" alt="small icon of an unlit candle" /> <a href="Church.php?visits=<?php echo $visits; ?>">Church</a>
                            </td>
                            <td>
                                <img class="toolbarcandle_pic" src="images/<?php if($current_page=='ParishInformation.php' || $current_page=='ParishPersonnel.php' || $current_page=='Schools.php' || $current_page=='FAQ.php'|| $current_page=='MinistersOfTheEucharist.php'){ echo 'candle_lit.png';}else{echo 'candle_unlit.png';} ?>" alt="small icon of an unlit candle" /> <a href="ParishInformation.php?visits=<?php echo $visits; ?>">Parish Information</a>
                                
                            </td>
                            <td>
                                <img class="toolbarcandle_pic" src="images/<?php echo 'candle_unlit.png'; ?>" alt="small icon of an unlit candle" /> <a href="https://picasaweb.google.com/116697430166855768268">Photogallery</a>
                               <!-- <img class="toolbarcandle_pic" src="images/<?php if($current_page=='Photogallery.php' || $current_page=='Lourdes2010.php' ||  $current_page=='Lourdes2009.php' || $current_page=='Lourdes2008.php' || $current_page=='LourdesArchive.php'|| $current_page=='InsideTheChurch.php' || $current_page=='ParishCentre&Garden.php' || $current_page=='CoolockVillage.php' || $current_page=='Other.php' || $current_page=='Colleges.php' || $current_page=='ChurchAlbum.php'){ echo 'candle_lit.png';}else{echo 'candle_unlit.png';} ?>" alt="small icon of an unlit candle" /> <a href="Photogallery.php?visits=<?php echo $visits; ?>">Photogallery</a> -->
                            </td>
                            <td>
                                <img class="toolbarcandle_pic" src="images/<?php if($current_page=='Webcam.php'){ echo 'candle_lit.png';}else{echo 'candle_unlit.png';} ?>" alt="small icon of an unlit candle" /> <a href="Webcam.php?visits=<?php echo $visits; ?>">Webcam</a>
                            </td>
                            <td>
                                <img class="toolbarcandle_pic" src="images/<?php if($current_page=='history.php' || $current_page=='stbrendan.php'|| $current_page=='ParishofCoolock.php'  || $current_page=='NineteenthCenturyRevival.php' || $current_page=='SrCatherineMcAuley.php'  || $current_page=='ParishHistory.php' || $current_page=='MaristFathers.php' ){ echo 'candle_lit.png';}else{echo 'candle_unlit.png';} ?>" alt="small icon of an unlit candle" /> <a href="history.php?visits=<?php echo $visits; ?>">History</a>
                            </td>
                             <td>
                                 <img class="toolbarpane_pic" src="images/toolbar_right_icon.png" alt="glass pane on right to start toolbar" />
                            </td>

                        </tr>
                    </tbody>
                </table>
        </div>
        <div class="colmask leftmenu">
            <div class="colleft">
