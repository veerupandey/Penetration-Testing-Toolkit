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
			<header><h3>Ping-Sweep</h3></header>
				<div class="module_content">
<form name="form1" action="" method="post">
						<fieldset>
							<label>IP Range(Maximum C Class)</label>
                                                        <input type="text" name="url" id="ur" value="192.168.1.0/24 ">
                                                        e.g.. 192.168.1.0/24 
						</fieldset>
    <fieldset>   
        <p><input type="radio" name="c0"  value="c1" checked="true">Discover which hosts are up within a range of IP addresses(Ping-Sweep)</p>
        <p><input type="radio" name="c0" value="c2" ></td> Scan network for NetBIOS Name</p>
        
    </fieldset>		
						<div class="clear"></div>
				</div>
			<footer>
				<div class="submit_link">
					
                                    <input type="submit" name="submit" value="Start Ping-Sweep" class="alt_btn" id="submit">
                                   ><input type="reset" value="Reset" >
				</div>
			</footer>
		</article><!-- end of post new article -->
                
               <?php
               
                if(isset($_POST['submit']))
                {
                    $url=$_POST['url'];
                    $c0=$_POST['c0'];
             if($url==''){
                       echo "<script type='text/javascript'>$.msg({fadeIn : 500,fadeOut : 500,bgPath : 'dlgs/',  content : 'You Have not entered any URL.Please enter an URL to continue..'});</script>";
                  
               }
 else {
             if(isset($c0)){
                  require_once 'loading.php';
                   switch ($c0)
                   {
                       case c1:
     echo "<script type='text/javascript'>$.msg({fadeIn : 500,fadeOut : 500,bgPath : 'dlgs/',  content :'starting ping-sweep using nmap'});</script>";
                  
                       echo "<p><b>Discovering which hosts are up within a range of IP addresses $url:</b></p>";
                       shell("echo 'Wait.........'");
                       shell(" sudo nmap  -sP -T Insane $url|sed -e '1,2d'");
              break;
                       
 case c2:
                           
                      echo "<script type='text/javascript'>$.msg({fadeIn : 500,fadeOut : 500,bgPath : 'dlgs/',  content :'Scanning Network $url for NetBIOS Name.Refer Result Section for details'});</script>";
                  
                       echo "<p><b>Scanning Network $url for NetBIOS Name</b></p>";
                          shell("cho 'Wait........'");
                       shell("sudo nbtscan -r $url");
                       
     break;
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
 }
                   
 }            
                     
     
                
 ?>
                

		
		<article class="module width_full">
			<header><h3>Tool Description</h3></header>
				<div class="module_content">
					
					
                                    <p>This tool uses <a href="http://nmap.org/" target="_blank"> <b>Nmap</b></a> to scan a range of ip and <b>nbtscan </b>to discover NetBIOS Name</b> </p>


                                        <p><b>Ping-Sweep</b></p>

					<ul>
						<li>Ping sweep is just a technique that can be used to find out which hosts are alive in a network or large number of IP addresses.  </li>
						<li>This tool uses nmap and fping to do ping swap </li>
						
                                                
					</ul>
                                        <p><b>NetBIOS Scan</b></p>
                                        <p>A NetBIOS Name is a unique identifier, up to 15 characters long with a 16th character type identifier, that NetBIOS services use to identify resources on a network running NetBIOS over TCP/IP (NetBT). Due to security issues with NetBIOS, mainly information leaks, it is often disabled on corporate networks. However, it can still be found in use to support legacy systems and applications</p>
                                        <p>To KNow more about NetBIOS <a href="http://www.sans.org/security-resources/idfaq/nbt-netbios.php" target="_blank">Click Here</a></p>

				</div>
                        
		</article><!-- end of styles article -->
                

		<div class="spacer"></div>
	</section>
</body>
</html>
