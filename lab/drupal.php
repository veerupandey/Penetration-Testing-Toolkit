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
			<header><h3>Drupal Site Test</h3></header>
				<div class="module_content">
<form name="form1" action="" method="post">
						<fieldset>
							<label>Enter Drupal Site To Scan</label>
							<input type="text" name="url" >
                                                        
						</fieldset>
    <fieldset>  
      <tr> 
          <td><input type="radio" name="c" value="c1" checked="true"></td> 
    				<td>Detect Drupal Version Running </td> 
				</tr> 
                                <p   <tr> 
                                    <td><input type="radio" name="c" value="c2"></td> 
    				<td>Scan for Vunerabilities(Enumerates the modules)</td> 
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
					
                                    <input type="submit" name="submit" value="Start Drupal Site Test" class="alt_btn">
                                    <a href="drupal.php"><input type="button" value="Reset"></a>
				</div>
			</footer>
		</article><!-- end of post new article -->
                
               <?php
               
                if(isset($_POST['submit']))
                {
                    $url=$_POST['url'];
                    $c=$_POST['c'];
                   
                    
                    
                    
                 
             
               
               
              if($url==''){
                 
                   echo "<script type='text/javascript'>$.msg({fadeIn : 500,fadeOut : 500,bgPath : 'dlgs/',  content : 'You Have not entered any URL.Please enter an URL to continue..'});</script>";
              }
 else {
             
                  
                    
                     echo "<script type='text/javascript'>$.msg({ fadeIn : 500,fadeOut : 500, bgPath : 'dlgs/',  content : 'Execution Started!Please refer result section after this message'});</script>";
                   require_once 'loading.php';
                   switch ($c){
                   case c1:
                       echo "<p><b>Detecting Version of Drupal on $url:</b></p>";
                       shell("");
                       shell("BlindElephant.py $url drupal|sed -e '1,1d'");
                       break;
                   
                   case c2:
                     echo "<p><b>Enumerating the Modules Used by this Drupa Site($url):</b></p>";
                         shell("");
                       shell(" sudo python ./cmd/dp.py $url");
                       break;
                   case c3:
                        $ip=gethostbyname($url);
                       
                       echo "<p><b>Getting Info about  Location of   $url($ip):</b></p>";
                         shell("");
                       shell("sudo python ./cmd/geoedge.py $url|grep 'IP\|Country\|City\|Coordinates'");
                       break;
                   case c4:
                       $ip=gethostbyname($url);
                       echo "<p><b>Hosting Info for   $url($ip):</b></p>";
                         shell("");
                       shell(" sudo dmitry -w  $url");
                       break;
                       
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
 
                   
 }            
                     
   
                
 ?>
                

		
		<article class="module width_full">
			<header><h3>Tool Description</h3></header>
				<div class="module_content">
					
					
					
					<p>Security Scanner for Drupal installations to quickly identify potential security issues, server reputation and other aspects of the web server.</p>


                                        <p><b>It can perform the following tests </b></p>

					<ul>
						<li>Check for Drpal Installation and Version </li>
						<li> Enumertes the modules</li>
                                                <li>Geolocation</li>
                                                <li>Hosting Info</li>
						
                                                
					</ul>
                                        
                                        

				</div>
                        
		</article><!-- end of styles article -->
                

		<div class="spacer"></div>
	</section>
</body>
</html>
