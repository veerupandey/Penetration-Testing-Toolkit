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


function shell($cmd){
 
 header('Content-Encoding: none;');

        set_time_limit(0);

        $handle = popen("$cmd", "r");

        if (ob_get_level() == 0) 
            ob_start();

        while(!feof($handle)) {

            $buffer = fgets($handle);
            $buffer = trim(htmlspecialchars($buffer));

            echo $buffer . "<br />";

            echo str_pad('', 4096);    

            ob_flush();
            flush();

            sleep(1);
        }

        pclose($handle);

        ob_end_flush();

}

function getLocation($ip)
{ 
 $NetGeoURL = "http://netgeo.caida.org/perl/netgeo.cgi?target=".$ip; 
  
 if($NetGeoFP = fopen($NetGeoURL,r))
 { 
         ob_start();
 
         fpassthru($NetGeoFP);
         $NetGeoHTML = ob_get_contents();
         ob_end_clean();

 fclose($NetGeoFP);
 }
 preg_match ("/LAT:(.*)/i", $NetGeoHTML, $temp) or die("Could not find element LAT");
 $location[0] = $temp[1];
 preg_match ("/LONG:(.*)/i", $NetGeoHTML, $temp) or die("Could not find element LONG");
 $location[1] = $temp[1];

 return $location;
 }

  

  

  
?>
