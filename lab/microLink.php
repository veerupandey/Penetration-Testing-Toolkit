<?php /***************************************************************************
 Copyright (C) 2014 Rakesh Pandey
 Written by Rakesh Pandey <rakeshpandey@karunya.edu.in>.
 
 This file is part of Penetration Testing Toolkit, a web interface for various ethical hacking tools.
 
 Penetration Testing Toolkit is free software; you can redistribute it and/or modify it 
 under the terms of the GNU General Public License as published by the Free
 Software Foundation; either version 2 of the License, or (at your option)
 any later version. 

 Penetration Testing Toolkit is distributed in the hope that it will be useful, but WITHOUT 
 ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or 
 FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for 
 more details.

 You should have received a copy of the GNU General Public License along
 with Penetration Testing Toolkit; if not, write to the Free Software Foundation, Inc.,
 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA.
***************************************************************************/?>
<?php
function getPage($link){
   
   if ($fp = fopen($link, 'r')) {
      $content = '';
        
      while ($line = fread($fp, 1024)) {
         $content .= $line;
      }
   }

   return $content;  
}

function pingLink($domain){
    $file      = @fopen($domain,"r");
    $status    = -1;

    if (!$file) {
       $status = -1;  // Site is down
    }
    else {
        $status = 1;
        fclose($file);
    }
    return $status;
   
}

function checkPage($content){
   $links = array();
   
   if (strlen($content) > 10){
      $startPos = 0;
      while (strpos($content,'<a ',$startPos)){
         $spos  = strpos($content,'<a ',$startPos);
         $tmppos = strpos($content,'>',$spos);
         $spos  = strpos($content,'href',$spos);
         $spos1 = strpos($content,'"',$spos)+1;
         $spos2 = strpos($content,"'",$spos)+1;
         if ($spos2 < $spos1) $spos = $spos2;
         else $spos = $spos1;

         $epos1 = strpos($content,'"',$spos);
         $epos2 = strpos($content,"'",$spos);
         if ($epos2 < $epos1) $epos = $epos2;
         else $epos = $epos1;
         
         $startPos = $epos;
         $link = substr($content,$spos,$epos-$spos);
         if (strpos($link,'http://') !== false) $links[] = $link;
      }
   }
   
   return $links;
}

?>


    
<?php    
    if (isset($_POST['submit'])){
         $url = isset($_POST['url']) ? $_POST['url'] : '';
         if (!(strpos($url,'http://') === 0) ) $url = 'http://'.$url;

?>
     
      
        <table width="100%">
<?php
         $txt = getPage($url);
         $linkArray = checkPage($txt);
         foreach ($linkArray as $value) {
            if (pingLink($value) <= 0){
               $status = "INVALID";
            } else {
               $status = "OK";
            }
         	echo "<tr><td align='center'>$value</td><td>$status</td></tr>";
         	sleep(2);
         	@ob_flush();
         	flush();
         }

?>
        </table>
     
<?php            
    }
?>
   
