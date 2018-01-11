<p align="right"><small>
|&nbsp;&nbsp;<a href="#hours">SERVICE HOURS</a>&nbsp;&nbsp;
<!--|&nbsp;&nbsp;<a href="#articles">ARTICLES</a>&nbsp;&nbsp;-->
|&nbsp;&nbsp;<a href="#newsletter">NEWSLETTER</a>&nbsp;&nbsp;|<br>
|&nbsp;&nbsp;<a href="#docs">DOWNLOAD DOCUMENTS</a>&nbsp;&nbsp;
|&nbsp;&nbsp;<a href="#churches">PARISH BUILDINGS</a>&nbsp;&nbsp;|<br>
|&nbsp;&nbsp;<a href="#people">PEOPLE IN THE PARISH</a>&nbsp;&nbsp;
|&nbsp;&nbsp;<a href="#comunity">COMMUNITY</a>&nbsp;&nbsp;
|&nbsp;&nbsp;<a href="#village">COOLOCK VILLAGE</a>&nbsp;&nbsp;|</small></p>

<p>&nbsp;</p>
<a name="hours"></a>
<h3>MASS TIMES</h3>
<blockquote><table width="460" bgcolor="#BBCAFF" cellpadding="2">
  <tbody>
    <tr>
      <td width="120">Monday  </td>
      <td width="100">8:00 am</td><td width="100">10:00 am</td><td></td>
    </tr>
    <tr bgcolor="#DDEDFF">
      <td>Tuesday  </td>
      <td>8:00 am</td><td>10:00 am</td><td></td>
    </tr>
    <tr>
      <td>Wednesday  </td>
     <td>8:00 am</td><td>10:00 am</td><td></td>
    </tr>
    <tr bgcolor="#DDEDFF">
      <td>Thursday  </td>
      <td>8:00 am</td><td>10:00 am</td><td></td>
    </tr>
    <tr>
      <td>Friday  </td>
      <td>8:00 am</td><td>10:00 am</td><td></td>
    </tr>
    <tr bgcolor="#DDEDFF">
      <td>Saturday  </td>
      <td>&nbsp;</td><td>10:00 am</td><td></td>
    </tr>
    <tr>
      <td>&nbsp;  </td>
      <td>&nbsp;</td><td></td><td></td>
    </tr>
    <tr bgcolor="#BCB2FF" valign="top">
      <td><b>Sunday</b>  </td>
      <td colspan="3">

<table width="400" cellpadding="2" cellspacing="1">
  <tbody>
    <tr>
      <td width="100">6:30 pm (Vigil)</td><td width="100">8:30 am</td><td>10:00 am</td>
    </tr>
    <tr>
      <td width="100">11:00 am</td><td width="100">12:30 pm</td><td>6:30 pm</td>
    </tr>
   </tbody>
</table>

    </tr>
    <tr>
      <td>&nbsp;  </td>
      <td>&nbsp;</td><td></td><td></td>
    </tr>
    <tr valign="top" bgcolor="#BCB2FF">
      <td><b>Holy Days</b>  </td>
      <td colspan="3">

<table width="400" cellpadding="2" cellspacing="1">
  <tbody>
    <tr>
      <td width="100">6:30 pm (Vigil)</td><td width="100">8:00 am</td><td>10:00 am</td>
    </tr>
    <tr>
      <td width="100">1:10 pm</td><td>6:30 pm</td><td>&nbsp;</td>
    </tr>
  </tbody>
</table>

    </td></tr>
  </tbody>
</table>
</blockquote>
<blockquote><small>Please check 
<?php
	echo '<A href="index.php?sid=events&visits='.$visits.'&sidep=events#news">announcement board</A>'; ?> for Holy Days.</small></blockquote>

<p>&nbsp;</p>

<p align="right"><small>|&nbsp;&nbsp;<a href="#top">TOP</a>&nbsp;&nbsp;|</small></p>
<hr>
<?php /* ?>
<a name="articles"></a>
<h3>ARTICLES</h3>
<blockquote><table bgcolor="#BBCAFF" cellpadding="5" width="100%">
  <tbody>
<?php

 
$i = 0;
$fp = "parish/articleslist.php";
$fsp = fopen($fp, "r"); 
do
{
	
	// Precteni ArticleListu
	$ico = "-"; 
	$header = Trim(fgets($fsp));
	if(!$header)
	{
		break;
	}
	$textik = Trim(fgets($fsp));  
	$tmp = Trim(fgets($fsp)); 
	$ico = StrTok($tmp,","); 
	$folder = StrTok(","); 
	if ((!File_Exists("parish/img/".$ico)) || Is_Dir("parish/img/".$ico)) 
	{ 
		$ico = "noimage.jpg";
	}
?>
<tr valign="top"><TD>
<A href="index.php?sid=parish/articles/viewer&aid=<?php echo $folder; ?>&ico=<?php echo $ico; ?>&intro=<?php echo urlencode($textik); ?>&nadpis=<?php echo urlencode($header); ?>"><IMG src="parish/img/<?php if(File_Exists("parish/img/".$ico)) { echo $ico; } else { echo "noimage.jpg"; } ?>" alt="Sample Article 1" width="120" hspace="0" vspace="0" border="1"></A>
</TD><TD>
  <h4 style="padding-top:0; margin-top:0; "><A href="index.php?sid=parish/articles/viewer&visits=<? echo $visits?>&aid=<?php echo $folder; ?>&ico=<?php echo $ico; ?>&intro=<?php echo urlencode($textik); ?>&nadpis=<?php echo urlencode($header); ?>"><?php echo $header; ?></A></h4><p align="justify"><?php echo $textik; ?></p></TD></tr>
  <tr valign="top"><TD>&nbsp;</TD><TD></TD></tr>-->
<?php
/*
$i++;
}while($i <= 3); 
fclose($fsp);
?>  
  <tr valign="top"><TD colspan="2"><A href="index.php?sid=parish/articles/articles&visits=<? echo $visits?>">More articles &#062;&#062;&#062;</A></TD></tr>
  </tbody>
</table></blockquote>
<p>&nbsp;</p>-->
<p align="right"><small>|&nbsp;&nbsp;<a href="#top">TOP&nbsp;&nbsp;|</small></p>
<hr>
</a>
   <?php */ ?>
<a name="newsletter"></a>
<h3>NEWSLETTER</h3>
<p align="justify">Newest newsletters available for download.</p>
<blockquote><table bgcolor="#BBCAFF" width="400">
  <tbody>
<?php
$ff = "parish/newslett.php";
if (File_Exists($ff)) {
$fp = FOpen($ff,"r");
$nwl[] = FGetS($fp); $nwl[] = FGetS($fp); $nwl[] = FGetS($fp); $nwl[] = FGetS($fp);
FClose($fp);
}

$ui = 0;
while ($ui < 4) {
$tok1 = strtok ($nwl["$ui"],".");
 while ($tok1) {
     $prip1 = $tok1;
     $tok1 = strtok (".");
     if (!$tok1) { $prip[] = $prip1; }
     }

?>
    <tr>
      <td style="padding-right:10" width="80"><?php
	  if (StrStr($prip["$ui"],"pdf")) { echo '<a href="parish/'.$nwl["$ui"].'" target="_blank"><img src="img/pdf.png" alt="PDF document for Acrobat Reader" width="64" height="64" hspace="0" vspace="0" border="0"></a>'; }
	  else  { echo '<a href="parish/'.$nwl["$ui"].'"><img src="img/document.png" alt="Newsletter" width="64" height="64" hspace="0" vspace="0" border="0"></a>'; }
	  ?>  </td>
      <td><?php echo '<a href="parish/'.$nwl["$ui"].'">'.$nwl["$ui"].'</a>'; ?>  </td>
    </tr>
<?php
$ui++;
} ?>
  </tbody>
</table></blockquote>


<p>&nbsp;</p>
<p align="right"><small>|&nbsp;&nbsp;<a href="#top">TOP</a>&nbsp;&nbsp;|</small></p>
<hr>

<A name="docs"></A>
<h3>DOCUMENTS FOR DOWNLOAD</h3>
<p align="justify">Note: In order to download selected document, you may need to SHIFT+CLICK on the document <strong>or</strong> right click on it and select "<em>Download link as...</em>".</p>
<blockquote><table bgcolor="#BBCAFF" width="460">
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
      <td width="80"><a href="parish/<?php echo $doc["$ui"]; ?>"><img src="img/<?php
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
	  ?>" alt="File for download" width="64" height="64" hspace="0" vspace="0" border="0"></a></td>
      <td width="150"><?php echo '<a href="parish/'.$doc["$ui"].'" target="_blank">'.$doc["$ui"].'</a>'; ?>  </td>
      <td><em><?php echo $desc["$ui"]; ?></em></td>
    </tr>
<?php
$ui++;
} ?>
<tr><TD colspan="3"><p align="justify"><small>Note: KDE (<A href="http://www.kde.org">www.kde.org</A>) icons are used to describe file-content.</small></p></TD></tr>
  </tbody>
</table></blockquote>


<p>&nbsp;</p>
<p align="right"><small>|&nbsp;&nbsp;<a href="#top">TOP</a>&nbsp;&nbsp;|</small></p>
<hr>


<a name="churches"></a>
<h3>PARISH BUILDINGS</h3>
<blockquote><table width="100%" cellspacing="0" cellpadding="8">
  <tbody>
    <tr bgcolor="#BBCAFF" valign="top">
      <td width="130"><IMG src="parish/img/chur_000.jpg" alt="St. Brendan's" width="120" height="90" hspace="0" vspace="0" border="1"></td><td>
<h3>St. Brendan's Church and Parish Centre, Coolock Village</h3>
<p align="justify">The current parish of Coolock, consecrated in 1969 is relatively small with about one thousand families making up the community, but once it covered a Iarge area from Glasnevin to Raheny. There has been a church in Coolock since the early Christians set up a wattle chapel in the area later known as 'An Culog' (Little Corner), because of its...<br>
<A href="index.php?sid=history/history&sidep=history&visits=<? echo $visits?>">Read <strong>more about the parish and the church history</strong> &#062;&#062;&#062;</A><br>
<A href="index.php?sid=gallery&visits=<? echo $visits?>">See photographs of the church &#062;&#062;&#062;</A></p>
<table align="left" border="1" style="border-color:#000000; border-style:dashed" cellpadding="2" width="100%"><TR><TD><br />
St. Brendan's Church<br>
Coolock Village<br>
Dublin 5, Ireland</TD></TR></table>
	  </td>
    </tr><tr>
      <td>&nbsp;</td><td>&nbsp;</td>
    </tr>
    <tr bgcolor="#BBCAFF" valign="top">
      <td><IMG src="parish/img/preview.jpg" alt="Chanel College" width="120" height="84" hspace="0" vspace="0" border="1"></td><td>
<h3>Chanel College</h3><p align="justify">Chanel College was founded in 1955. It is a Catholic Secondary School under the trusteeship of the Marist Fathers. Our mission in Chanel College is to enable our students to reach their full potential so that they will make a positive difference in today's world. We strive to create a sense of community within the school and an informal but respectful atmosphere...<br>
<A href="index.php?sid=parish/chanel&sidep=history&visits=<? echo $visits?>">Read <strong>more about the Chanel College</strong> &#062;&#062;&#062;</A>
<A href="index.php?sid=gallery&visits=<? echo $visits?>">See photographs of parish colleges &#062;&#062;&#062;</A></p><table align="left" border="1" style="border-color:#000000; border-style:dashed" cellpadding="2" width="100%"><TR><TD>
Chanel College<br>
Coolock Village<br>
Dublin 5, Ireland</TD></TR></table>	  </td>
    </tr><tr>
      <td>&nbsp;</td><td>&nbsp;</td>
    </tr><tr bgcolor="#BBCAFF" valign="top">
      <td><IMG src="parish/img/mercey.jpg" alt="Mercey College" width="120" height="63" hspace="0" vspace="0" border="1"></td><td>
<h3>Mercy College</h3>
Mercy College, St. Brendan's Drive, Dublin 5 was established in 1963 by the Mercy order.  Over the years Mercy has provided an excellent education for girls from many parts of North Dublin.  The overall educational philosophy of Mercy College is...&nbsp;&nbsp;&nbsp;<A href="index.php?sid=parish/mercey&visits=<? echo $visits?>">Read <strong>more about <i>Mercy College</i></strong> &#062;&#062;&#062;</A>
	  <br>
<A href="index.php?sid=gallery&visits=<? echo $visits?>" style="padding-top:10">See photographs of parish colleges &#062;&#062;&#062;</A>
<br>
<A HREF="http://www.merceycoolock.ie" TARGET=othersites>Mercey College Web Site &#062;&#062;&#062;</A></td>
    </tr><tr>
      <td>&nbsp;</td><td>&nbsp;</td>
    </tr><tr bgcolor="#BBCAFF" valign="top">
      <td><IMG src="parish/img/chatrina.jpg" alt="Scoil Chaitriona" width="120" height="90" hspace="0" vspace="0" border="1"></td><td>
<h3>Scoil Chaitriona</h3>
Scoil Chaitriona Infants is under the patronage of the Catholic Archbishop of Dublin and is conducted in accordance with the religious and educational philosophy of the Sisters of Mercy. The school caters for girls and boys from...&nbsp;&nbsp;&nbsp;<A href="index.php?sid=parish/chatrina&visits=<? echo $visits?>">Read <strong>more about Scoil Chaitriona<i></i></strong> &#062;&#062;&#062;</A>
<br>
<A href="index.php?sid=gallery&visits=<? echo $visits?>">See photographs of parish colleges &#062;&#062;&#062;</A>	  </td>
    </tr>
  </tbody>
</table></blockquote>


<p>&nbsp;</p>
<p align="right"><small>|&nbsp;&nbsp;<a href="#top">TOP</a>&nbsp;&nbsp;|</small></p>
<hr>
<a name="people"></a>
<h3>PEOPLE IN THE PARISH</h3>

<table width="100%" cellpadding="8" cellspacing="0" border="0">
  <tbody valign="top">
    <tr>
      <td><img src="parish/jhand.jpg" width="200" height="181" border="0" alt="Fr. John Hand, Moderator"></td>
      <td>
      <h4>Fr. John Hand, Moderator</h4>
      Moderator in St. Brendans since August 2005</td>
    </tr>
    <tr>
	  <td><IMG src="parish/priests/Fr_John_Harrington.JPG" alt="Fr. John Harrington SM, CC" width="200" height="163" hspace="0" vspace="0" border="1"></td>
      <td><h4>Fr. John Harrington SM, CC.</h4><p>Serving in St. Brendan's since 2008.</p></td>
    </tr>
    <tr>
      <td><img src="parish/priests/Fr_Pat_Byrne.JPG" width="200" height="177" border="0" alt="Fr. Pat Byrne SM, PC."></td>
      <td><h4>Fr. Pat Byrne SM, PC.</h4>
      <p align="justify">Serving in St. Brendan's since 2008.</p></td>
    </tr><tr>
      <td width="220"><IMG src="parish/priests/frbuttl.jpg" alt="Fr. Kieran Butler S.M., CC" width="200" height="165" hspace="0" vspace="0" border="1"></td>
      <td>
      <h4>Fr. Kieran Butler S.M., PC</h4>
      <p align="justify">Serving in St. Brendan's since 1993.</p>
      </td>
    </tr>
  </tbody>
</table>

<A href="index.php?sid=parish/priests&visits=<? echo $visits?>&sidep=parish#people">More about people in the parish &#062;&#062;&#062;</A><br>
<A href="index.php?sid=parish/priests&visits=<? echo $visits?>&sidep=parish#prlist">List of parish priests since new chruch opening &#062;&#062;&#062;</A>







<p>&nbsp;</p>
<p align="right"><small>|&nbsp;&nbsp;<a href="#top">TOP</a>&nbsp;&nbsp;|</small></p>
<hr>
<a name="comunity"></a>
<h3>COMMUNITY</h3>

<?php include "parish/marists.php"; ?>


<p>&nbsp;</p>
<p align="right"><small>|&nbsp;&nbsp;<a href="#top">TOP</a>&nbsp;&nbsp;|</small></p>
<hr>
<a name="village"></a>
<h3>COOLOCK VILLAGE</h3>
<A href="index.php?sid=history/history&visits=<? echo $visits?>">Read about history of Coolock and the Coolock Parish</A><br>
<A href="index.php?sid=gallery&visits=<? echo $visits?>">See photos of the Coolock Village in our photogallery</A><br>
<A href="index.php"></A><br>
<p>&nbsp;</p>
