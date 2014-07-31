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
			<header><h3>Nmap Scanner Menu</h3></header>
				<div class="module_content">
<form name="form1" action="" method="post"><fieldset>
		<legend>Target:</legend>
                <label> URL:</label>e.g..  www.site.com, 192.168.2.29</p><input id="ur" type="text" name="url" value="" />
</fieldset>

    <fieldset>
        <legend>Scan Options</legend>
		<p><input type="checkbox" name="options[]" value=""  />Ping Host To Check if its Alive</p>
		<p><input  type="checkbox" name="options[]" value=" -O --osscan-guess " checked="checked" />Detect Operating System</p>
		<p><input  type="checkbox" name="options[]" value=" -sV " />Detect Service Version</p>
		<p><input  type="checkbox" name="options[]" value=" --traceroute "  /> Do Traceroute</p>
		<p><input  type="checkbox" name="options[]" value=" -sU "  /> UDP Port Scan</p>
		<p><input  type="checkbox" name="options[]" value=" -p 1-65535 "  /> TCP Port Scan</p>
		<p><input  type="checkbox" name="options[]" value=" -T4 -A -Pn "  /> Intense Scan When Network blocks pinging</p>
		<p><input  type="checkbox" name="options[]" value=" --script ip-geolocation-* " />Target Geolocation</p>
                <p><input  type="checkbox" name="options[]" value=" --script whois " />Information about the registrar and contact names</p>
       </fieldset>
        

				<div class="clear"></div>
				</div>
			<footer>
				<div class="submit_link">
					
                                    <input type="submit" name="submit" value="Start Scanning Now" class="alt_btn" id="submit" >
                                    <input type="reset" value="Reset" id="reset"> </a>
				</div>
			</footer>
                        
		</article><!-- end of post new article -->
               

                <?php
              if(isset($_POST['submit'])){
               $url = $_POST['url'];

 if($url==''){
                   
                   echo "<script type='text/javascript'>$.msg({fadeIn : 500,fadeOut : 500,bgPath : 'dlgs/',  content : 'You Have not entered any URL.Please enter an URL to continue..'});</script>";
              }
               
 else {
      echo "<script type='text/javascript'>$.msg({ fadeIn : 500,fadeOut : 500, bgPath : 'dlgs/',  content : 'Doing Nmap Scan for $url ! You Can see Full result in result section'});</script>";
         
      require_once 'loading.php';
	if(preg_match("#;|\||&|%#", $url)){ die("Bad, very bad, this characters are not accepted: ; | & %");}
	

	foreach ($_POST['options'] as $key => $value) {
		if(preg_match("#;|\||&|%#", $value)){
			die("Bad, very bad, this characters are not accepted: ; | & %");
		}
$str.=$value;

		
	}
$url = trim($url); //remove space from start and end of url
               if(substr(strtolower($url), 0, 7) == "http://") $url = substr($url, 7); // remove http:// if included
                if(substr(strtolower($url), 0, 8) == "https://") $url = substr($url, 8);
      
                     $url_parts = explode("/", $url);
                     $url = $url_parts[0];
                    
shell("sudo nmap $str $url");
	
         
   
         echo '</div>
                                    <footer>
				<div align="left">
					
					<h3>Thank You!</h3>
				</div>
			</footer>
		</article><!-- end of styles article -->
                 <h4 class="alert_success">Scan Succeeded </h4>
                 
 ';
     
        echo "<script type='text/javascript'>$.msg({ fadeIn : 500,fadeOut : 500, bgPath : 'dlgs/',  content : 'Nmap Done ! See result in result section'});</script>";
            
     
               
          
                     
 }
}            
    
                
 ?>
      	
		<article class="module width_full">
			<header><h3 id="b">Tool Description</h3></header>
				<div class="module_content">
					
					
					<p>This module uses the popular nmap framework and performs the scan by passing the parameter to nmap as per user's choice</p>

<p>Vist <a href="http://wwww.nmap.org">Nmap official website</a> to know more about nmap command  and its options.</p>
<p>You can perform the following  operations using this module</p>

					<ul>
						<li>check whether the host is up or not  </li>
						<li>Dtect operating system and service version of the target host</li>
						<li>Do traceroute and get the target GeoLocation </li>
						<li>Scan for open tcp and udp ports.</li>
                                                <li>Finds Target Geolocation</li>
                                                <li> Gather Information About Registrar And Contact name(whois)</li>
                                                <li>Much More......</li>
					</ul>
				</div>
                        
                        
		</article><!-- end of styles article -->
                

		<div class="spacer"></div>
	</section>
    
</body>
</html>
