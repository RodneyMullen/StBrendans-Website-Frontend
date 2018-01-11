<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<div id="DownloadDocuments" name="DownloadDocuments" ></div>
<h2>DOCUMENTS FOR DOWNLOAD</h2>
<p> Note: In order to download selected document, you may need to SHIFT+CLICK on the document <strong>or</strong> right click on it and select "<em>Download link as...</em>".</p>
<table style="background-color:#003366; " >
  <tbody>
<?php
$ni = 0;
$ff = "parish/docs.php";
if (File_Exists($ff)) { # Pokud existuje doclist, otevri ho
$fp = FOpen($ff,"r");
 while (!feof($fp) && $ni < 100) { # Nacti vsechny soubory a popisky
       $doc[] = fgets($fp);
       $desc[] = fgets($fp);
       $ni++;
  }
FClose($fp);
}

$ui = 0;
while ($ui < $ni) { # Z�skej pripony a pak vypis seznam do tabulky
$tok[] = strtok ($doc["$ui"],".");
$tokk = strtok ($doc["$ui"],".");
  while ($tokk) { # Hledej jm�no souboru za poslednim lom�tkem
      $extt = $tokk;
      $tokk = strtok (".");
      }
?>
    <tr>
      <td><a href="parish/<?php echo $doc["$ui"]; ?>"><img src="images/<?php
	  if (StrStr($extt,"pdf")) { echo 'pdf.png'; }
	  elseif (StrStr($extt,"doc")) { echo 'doc.png'; }
	  elseif ((StrStr($extt,"jpg")) || (StrStr($extt,"jpeg"))
	  	   || (StrStr($extt,"png")) || (StrStr($extt,"bmp"))
		   || (StrStr($extt,"gif"))) { echo 'image.png'; }
	  elseif ((StrStr($extt,"wav")) || (StrStr($extt,"ogg"))
	       || (StrStr($extt,"mp3"))) { echo 'sound.png'; }
	  elseif ((StrStr($extt,"avi")) || (StrStr($extt,"mpg"))
	       || (StrStr($extt,"mpeg"))) { echo 'video.png'; }
	  elseif ((StrStr($extt,"rar")) || (StrStr($extt,"zip")) || (StrStr($extt,"tgz"))
	       || (StrStr($extt,"arj"))) { echo 'tar.png'; }
	  else  { echo "document.png"; }
	  ?>" alt="File for download" style=" height: 64px; border:0;"></a></td>
      <td ><?php echo '<a href="parish/'.$doc["$ui"].'" target="_blank">'.$doc["$ui"].'</a>'; ?> </td>
      <td style="width:450px"><?php echo '<p>'.$desc["$ui"].'</p>'; ?></td>
    </tr>
<?php
$ui++;
} ?>

  </tbody>
</table>


<p>&nbsp;</p>

<hr/>
