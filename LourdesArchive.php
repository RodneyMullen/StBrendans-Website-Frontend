<?php
    include_once "topofpage.php";
   ?>
<div class="col1" id="main_content">
<h2>  Lourdes Archive </h2>
        
        
        <embed class=albums type="application/x-shockwave-flash" src="http://picasaweb.google.com/s/c/bin/slideshow.swf" width="600" height="400" flashvars="host=picasaweb.google.com&captions=1&hl=en_US&feat=flashalbum&RGB=0x000000&feed=http%3A%2F%2Fpicasaweb.google.com%2Fdata%2Ffeed%2Fapi%2Fuser%2F116697430166855768268%2Falbumid%2F5527551183079726001%3Falt%3Drss%26kind%3Dphoto%26authkey%3DGv1sRgCMf_rvPFxPL9fg%26hl%3Den_US" pluginspage="http://www.macromedia.com/go/getflashplayer"></embed>
        <br />
        <h3><a href="Photogallery.php?visits=<?php echo $visits; ?>"> Back to Photogallery </a></h3>
        <hr />
</div>
        <?php
    include_once "sidebar_Photogallery_content.php";

    include_once "sitemap.php";

?>
