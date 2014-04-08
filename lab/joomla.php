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
require_once 'layout.php';
require_once 'u.php';
?>

<section id="main" class="column">
		
		<h4 class="alert_info">Welcome to the Web Based Penetration Testing Toolkit.</h4>
		
		
		
		
		<div class="clear"></div>
		
		<article class="module width_full">
			<header><h3>Joomla Site Test</h3></header>
				<div class="module_content">
<form name="form1" action="" method="post">
						<fieldset>
							<label>Enter Joomla Site To Scan</label>
							<input type="text" name="url" id="ur">
                                                        
						</fieldset>
    <fieldset>  
      <tr> 
          <td><input type="radio" name="c" value="c1"></td> 
    				<td>Detect Joomla Version Running</td> 
				</tr> 
                                <p   <tr> 
                                    <td><input type="radio" name="c" value="c2" checked="true"></td> 
    				<td>Scan for Vulnerability</td> 
                                </tr> </p>
<p   <tr> 
    <td><input type="radio" name="c" value="c3"></td> 
    				<td>Get Site Geo-Location</td> 
                                </tr> </p>
<p   <tr> 
    <td><input type="radio" name="c" value="c4"></td> 
    				<td>Hosting Info</td> 
                                </tr> </p>
    </fieldset>
						
						<div class="clear"></div>
				</div>
			<footer>
				<div class="submit_link">
					
                                    <input type="submit" name="submit" value="Start Joomla Site Test" class="alt_btn" id="submit">
                                    <a href="joomla.php"><input type="button" value="Reset" id="reset"></a>
				</div>
			</footer>
		</article><!-- end of post new article -->
                
               <?php
               
                if(isset($_POST['submit']))
                {
                    $url=$_POST['url'];
                    $c=$_POST['c'];
                    
                    
                    
                   $url = trim($url); //remove space from start and end of url
               if(substr(strtolower($url), 0, 7) == "http://") $url = substr($url, 7); // remove http:// if included
                if(substr(strtolower($url), 0, 8) == "https://") $url = substr($url, 8);
      
                     $url_parts = explode("/", $url);
                     $url = $url_parts[0];
                        
                 
             
               
               
               
               if($url==''){
                    echo "<script type='text/javascript'>$.msg({fadeIn : 500,fadeOut : 500,bgPath : 'dlgs/',  content : 'You Have not entered any URL.Please enter an URL to continue..'});</script>";
                  
               }
 else {
             
                    
                    echo "<script type='text/javascript'>$.msg({ fadeIn : 500,fadeOut : 500, bgPath : 'dlgs/',  content : 'Execution Started!Please refer result section after this message'});</script>";
                   require_once 'loading.php';
               switch($c)
                   {
                      
                   case c1:
                       echo "<p><b>Detecting Version of joomla for $url:</b></p>";
                       shell("");
                       shell("  BlindElephant.py $url joomla|sed -e '1,2d'");
                       echo "<p><b>Poking Version of joomla for $url using joomscan:</b></p>";
                       shell("sudo joomscan -pe -u $url|sed -e '1,2d");
                       break;
                   
                   case c2:
                      echo "<p><b>Scanning  $url for vunerabilty:</b></p>";
                          shell("");
                       shell(" sudo joomscan -u  $url|sed -e '1,26d'"); 
                       break;
                   case c3:
                       $ip=gethostbyname($url);
                       
                       echo "<p><b>Getting Info about  Location of   $url($ip):</b></p>";
                       shell("");
                       shell("python ./cmd/geoedge.py $url|grep 'IP\|Country\|City\|Coordinates'");
                     
                       break;
                   case c4:
                       
                     $ip=gethostbyname($url);
                       echo "<p><b>Hosting Info for   $url($ip):</b></p>";
                          shell("");
                       shell("  dmitry -w  $url");
                       break;
                       
                   }
                  
                   
                     
                       
                   }
                    
                    
                    
      echo "<script type='text/javascript'>$.msg({ fadeIn : 500,fadeOut : 500, bgPath : 'dlgs/',  content : 'Execution Finished!You Can see Full result in result section'});</script>";
       
    
      
         echo '</div>
                                    <footer>
				<div align="left">
					
					<h3>Thank You!</h3>
				</div>
			</footer>
		</article><!-- end of styles article -->
                 <h4 class="alert_success">Scan Succeeded </h4>
                 
 ';
         
  }
 
                   
            
                     
     
                
 ?>
                

		
		<article class="module width_full">
			<header><h3>Tool Description</h3></header>
				<div class="module_content">
					
					
					
					<p>Test Joomla Security with this immediate Joomla security scan service. Discover vulnerabilities, web server details and configuration errors.</p>

                                        <p>This Tool Uses <a href="http://sourceforge.net/projects/joomscan/">joomscan</a></p>
                                        <p><b>About Joomla Security Scan </b></p>

					<ul>
   

						<li>Detect known exploits and security vulnerabilities </li>
						<li> Exact version probing</li>
                                                <li> Joomla plugin based firewall detection</li>
                                                <li>Geolocation</li>
                                                <li>Hosting Info</li>
						
                                                
					</ul>
                                        
                                        

				</div>
                        
		</article><!-- end of styles article -->
                

		<div class="spacer"></div>
	</section>
</body>
</html>
