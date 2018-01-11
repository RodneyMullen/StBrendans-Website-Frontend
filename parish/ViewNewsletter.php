<div name="DownloadNewsletter" id="DownloadNewsletter" ></div>
<h2>NEWSLETTER</h2>
<h3>Newest newsletters available for download.</h3>
<table style="background-color:#003366; position:relative; left: 90px; width: 500px;" >
   <thead><tr><th></th></tr></thead>
   <tfoot><tr><th></th></tr></tfoot>
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
      <td style="padding-right:10px; width:80px;"><?php
	  if (StrStr($prip["$ui"],"pdf")) { echo '<a href="parish/'.$nwl["$ui"].'" target="_blank"><img src="images/pdf.png" alt="PDF document for Acrobat Reader" style ="width:64px; height:64px; border:0;"></a>'; }
	  else  { echo '<a href="parish/'.$nwl["$ui"].'"><img src="images/document.png" alt="Newsletter" style="width:64; height:64; border:0;"></a>'; }
	  ?>  </td>
      <td><?php echo '<a href="parish/'.$nwl["$ui"].'">'.$nwl["$ui"].'</a></h4>'; ?>  </td>
    </tr>
<?php
$ui++;
} ?>
  </tbody>
</table>
<hr/>



