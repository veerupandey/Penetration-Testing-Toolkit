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
                    <header><h3>Web Scanner</h3></header>
			<div class="module_content">
<form name="form1" action="" method="post"><fieldset>
		<legend>Target:</legend>
        <label for="ur">URL:</label><input id="ur" type="text" name="url" value="" />
</fieldset>			
    <fieldset>          
        <legend>Scan Options</legend>
        <p> <input type="checkbox" name="c1" > GET HTTP headers and display the transaction</p>
        <p> <input type="checkbox" name="c2" checked="true"> Scan web server for dangerous Files,Outdated Versions... etc </p>
        <p> <input type="checkbox" name="c3" > What Web Scan</p> 
        <p><input type="checkbox" name="c4"> SSL Check:(Enter port number-Default 443)<input type="text" maxlength="30" size="4" name="port0" value="443" style="float:right;width:10%"> </p>
        <p> <input type="checkbox" name="c5"> Check if domain uses load balancing </p>
        <p> <input type="checkbox" name="c6"> Web Application Firewall Detection</p
        <p><input type="checkbox" name="c7"> Detect Application at given port:<input type="text" maxlength="30" size="4" name="port" value="80" style="float:right;width:10%"></p>
 </fieldset>			
						<div class="clear"></div>
				</div>
			<footer>
				<div class="submit_link">
					
                                    <input type="submit" name="submit" value="Start Scanning Now" class="alt_btn" id="submit">
                                    <input type="reset" value="Reset" id="reset"></a>
				</div>
			</footer>
		</article><!-- end of post new article -->
                
               <?php
               
                if(isset($_POST['submit']))
                {
                    
                    $url=$_POST['url'];
                    $c1=$_POST['c1'];
                    $c2=$_POST['c2'];
                    $c3=$_POST['c3'];
                    $c4=$_POST['c4'];
                    $c5=$_POST['c5'];
                    $c6=$_POST['c6'];
                    $c7=$_POST['c7'];
                    
                    $port0=$_POST['port0'];
                    $port=$_POST['port'];
               require_once 'loading.php';     
            if($url==''){
                    echo "<script type='text/javascript'>$.msg({fadeIn : 500,fadeOut : 500,bgPath : 'dlgs/',  content : 'You Have not entered any URL.Please enter an URL to continue..'});</script>";
                  die("!!!!You Have Not Entered any URL!!!!");
               }
            
            if(isset($c1)||isset($c2)||isset($c3)||isset($c4)||isset($c5)||isset($c6)||isset($c7))
            {
                 
                           if(isset($c1)){
                               echo "<script type='text/javascript'>$.msg({fadeIn : 500,fadeOut : 500,bgPath : 'dlgs/',  content : 'Getting HTTP Header and Displaying Transactions for $url'});</script>";
                  
                            echo "<p><b>Getting HTTP Header and Displaying Transactions for $url:</b></p>";
                       shell(" siege  -g $url");
                        
                           }
                           if(isset($c2))
                           {
                               echo "<script type='text/javascript'>$.msg({fadeIn : 500,fadeOut : 500,bgPath : 'dlgs/',  content : 'Nikto Scanner on $url..See details in Result section'});</script>";
                  
                            echo "<p><b>Scanning web server on $url for dangerous Files,Outdated Versions... etc:</b></p>";
                            shell("echo 'Starting......'");
                            shell(" nikto -host $url|sed -e '1,1d'");
                           
                           }
                           if(isset($c3)){
                               echo "<script type='text/javascript'>$.msg({fadeIn : 500,fadeOut : 500,bgPath : 'dlgs/',  content : 'Whatweb for  $url..See details in Result section'});</script>";
                               echo "<p><b>Whatweb Scan Started for $url:</b></p>";
                               shell(" whatweb -v  $url");
                               
                           }
             
                           if(isset($c4)){
                               echo "<script type='text/javascript'>$.msg({fadeIn : 500,fadeOut : 500,bgPath : 'dlgs/',  content : 'Testing SSL configuration for $url..See details in Result section'});</script>";
                               echo "<p><b> SSL-check  for $url:</b></p>";
                               shell(" sslyze $url:$port0 |sed -e '1,11d'");
                               
                           }
                           if(isset($c5)){
                               echo "<script type='text/javascript'>$.msg({fadeIn : 500,fadeOut : 500,bgPath : 'dlgs/',  content : 'Checking  if $url uses load balancing..See details in Result section'});</script>";
                               echo "<p><b>Checking  if $url uses load balancing</b></p>";
                               shell("lbd $url|sed -e '1,3d'");
                               
                           }
                           if(isset($c6)){
                               echo "<script type='text/javascript'>$.msg({fadeIn : 500,fadeOut : 500,bgPath : 'dlgs/',  content : 'Detecting firewall for $url..See details in Result section'});</script>";
                               echo "<p><b>Detecting firewall for  $url :</b></p>";
                               shell("wafw00f $url |sed -e '1,13d'");
                               
               
                           }
                           if(isset($c7)){
                              echo "<script type='text/javascript'>$.msg({fadeIn : 500,fadeOut : 500,bgPath : 'dlgs/',  content : 'Detecting Application @ $port on  $url..See details in Result section'});</script>";
                              echo "<p><b>Detecting Application at port  $port on $url  :</b></p>";
                              shell("sudo amap -A $url $port|grep 'Protocol\|Unidentified'");
                             
                           }
echo "<script type='text/javascript'>$.msg({fadeIn : 500,fadeOut : 500,bgPath : 'dlgs/',  content : 'Scanning Done for $url..See details in Result section'});</script>";
         echo '</div>
                                    <footer>
				<div align="left">
					
					<h3>Thank You!</h3>
				</div>
			</footer>
		</article><!-- end of styles article -->
                 <h4 class="alert_success">Scan Succeeded </h4>
                 
            ';}
 else {
     echo "<script type='text/javascript'>$.msg({fadeIn : 500,fadeOut : 500,bgPath : 'dlgs/',  content : '!!!!You have not selected any option!!!!'});</script>";
                  
                die("!!!!You Have Not Selected any option!!!!");
            }
 }
         
  
             
 ?>
                <article class="module width_full">
			<header><h3>Tool Description</h3></header>
				<div class="module_content">
					
					
					<p>This module uses the various frameworks such as nikto,openvas,wapiti,amap etc and performs the scan by passing the parameter to these frameworks  as per user's choice</p>


<p>You can perform the following  operations using this module</p>

					<ul>
						<li> Check for MS08-067,MS06-025 Window RPC Vulns,Unmanage sevice Dns,SMB2 Exploit(using nmap script smb-check-vulns) </li>
						<li>Scan Webservers for dangerous files(nikto) </li>
						<li>Performs the check against password protected resource(HTTP 401 status) and attemp to bypass it(nmap script)</li>
						<li>Test for presence of vsFTPD abd ProFTP backdoors</li>
                                                <li>Attemts to identify applications even if they running on a different port other than normal(amap) </li>
                                                <li>Try to extract all info about a site(whatweb scan)</li>
                                                
                                                
					</ul>
				</div>
                        
		</article><!-- end of styles article -->
                

		<div class="spacer"></div>
	</section>
</body>
</html>
