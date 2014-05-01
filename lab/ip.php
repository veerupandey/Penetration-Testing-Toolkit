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
<html>
    <body onLoad="init()"> 
<section id="main" class="column">
		
		<h4 class="alert_info">Welcome to the Web Based Penetration Testing Toolkit.</h4>
		
		
		
		
		<div class="clear"></div>
		
		<article class="module width_full">
			<header><h3>IP Address</h3></header>
				<div class="module_content">
<form name="form1" action="" method="post">
						<fieldset>
							<label>Enter IP/Domain Here</label>
							<input type="text" name="url" id="ur">
                                                        

                                                </fieldset>
    <fieldset>
   
    <p> <tr> 
          <td><input type="radio" name="c" value="c1"></td> 
    				<td>IP GeoLocation</td> 
    </tr></p> 
      
<p>  <tr> 
    <td><input type="radio" name="c" value="c2" checked="true"></td> 
    				<td>Reverse IP Lookup</td> 
</tr> </p>
                                <p   <tr> 
   					<td><input type="radio" name="c" value="c3"></td> 
    				<td>Port Check</td> 
                                </tr> </p>
<p   <tr> 
   					<td><input type="radio" name="c" value="c4"></td> 
    				<td>Get More Info About IP</td> 
                                </tr> </p>

    </fieldset>
						
						<div class="clear"></div>
				</div>
			<footer>
				<div class="submit_link">
					
                                    <input type="submit" name="submit" value="Start IP Test" class="alt_btn" id="submit">
                                    <a href="ip.php"><input type="button" value="Reset" id="reset"></a>
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
             
      if(isset($c))
      {
          
          require_once 'loading.php';
          switch ($c)
          {
              case c1:
                   if(filter_var($url, FILTER_VALIDATE_IP)){
                       echo "<script type='text/javascript'>$.msg({ fadeIn : 500,fadeOut : 500, bgPath : 'dlgs/',  content : 'Execution Started!Please refer result section after this message'});</script>";
            
                       echo "<p><b>Getting GeoLocation of target IP $url </b></p> ";
                  shell("sudo python ./cmd/geoedge.py $url|grep 'IP\|Country\|City\|Coordinates'");
                   }else{
                       echo "<script type='text/javascript'>$.msg({ fadeIn : 500,fadeOut : 500, bgPath : 'dlgs/',  content : '$url is not a valid IP'});</script>";
            
                     echo "$url is Not a Valid IP Address";
                 }
                 
                  break;
              case c2:
                 if(filter_var($url, FILTER_VALIDATE_IP))
                 {
                      echo "<script type='text/javascript'>$.msg({ fadeIn : 500,fadeOut : 500, bgPath : 'dlgs/',  content : '$url is not a valid URL'});</script>";
            
                     echo "$url is Not a Valid URL";
                      
                 }else{
                      echo "<script type='text/javascript'>$.msg({ fadeIn : 500,fadeOut : 500, bgPath : 'dlgs/',  content : 'Execution Started!Please refer result section after this message'});</script>";
            
                     echo "<p><b>Reverse IP for $url</b></p>"; 
                  shell("host $url");
                
                 }
               
                  break;
              case c3:
                  if(filter_var($url, FILTER_VALIDATE_IP)){
                       echo "<script type='text/javascript'>$.msg({ fadeIn : 500,fadeOut : 500, bgPath : 'dlgs/',  content : 'Execution Started!Please refer result section after this message'});</script>";
            
                      echo "<p><b>Checking Port on IP $url </b></p>";
                  shell("dmitry -p -f $url |sed '1,2d'"); 
                  }
 else {
      echo "<script type='text/javascript'>$.msg({ fadeIn : 500,fadeOut : 500, bgPath : 'dlgs/',  content : '$url is not a valid IP'});</script>";
            
      
                  echo "$url is Not a Valid IP";   
                  
 }
                  
                  break;
              case c4:
                  if(filter_var($url, FILTER_VALIDATE_IP)){
                      echo "<script type='text/javascript'>$.msg({ fadeIn : 500,fadeOut : 500, bgPath : 'dlgs/',  content : 'Execution Started!Please refer result section after this message'});</script>";
            
                       echo "<p><b>Showing Info about IP $url</b></p>";
                       shell("");
                  shell(" sudo nmap -Pn -sV -sC $url| sed -e '1,3d' ");
                  }  else {
                       echo "<script type='text/javascript'>$.msg({ fadeIn : 500,fadeOut : 500, bgPath : 'dlgs/',  content : '$url is not a valid IP'});</script>";
            
                      echo 'Not A Valid IP'; 
                  }
                 
                  break;
                  
            
          }
  
                   
 }            
                     
     }
                
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
					
					
					
                                        <p><b>GeoIPLookup </b></p>

                                        <p>IP Geolocation involves attempting to find the location of an IP address in the real world. Due to the fact that IP addresses are assigned to organization and these are ever changing associations it can be difficult to determine exactly where in the world an IP address is located</p>
                                        <p><b> Reverse IP Lookup</b></p>
                                        <p>A web server can be configured to server multiple virtual hosts from a single IP address. This is a common technqiue in shared hosting environments in particular. However it is also common in many organizations and can be an excellent way to expand the attack surface when going after a web server.</p>

				</div>
                        
		</article><!-- end of styles article -->
                

		<div class="spacer"></div>
	</section>
</body>
</html>
