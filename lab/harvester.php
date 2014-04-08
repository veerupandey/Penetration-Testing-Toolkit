<?php /***************************************************************************
 Copyright (C) 2014 Rakesh Pandey
 Written by Rakesh Pandey <rakeshpandey@karunya.edu.in>.
 
 This file is part ofPenetration Testing Toolkit, a web interface for various ethical hacking tools.
 
Penetration Testing Toolkit is free software; you can redistribute it and/or modify it 
 under the terms of the GNU General Public License as published by the Free
 Software Foundation; either version 2 of the License, or (at your option)
 any later version. 

Penetration Testing Toolkit is distributed in the hope that it will be useful, but WITHOUT 
 ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or 
 FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for 
 more details.

 You should have received a copy of the GNU General Public License along
 withPenetration Testing Toolkit; if not, write to the Free Software Foundation, Inc.,
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
			<header><h3>The Harvester</h3></header>
				<div class="module_content">
<form name="form1" action="" method="post">
						<fieldset>
							<label>Enter Domain</label>
                                                        <input type="text" name="url" value="" id="ur">
						</fieldset>
   <fieldset style="width:48%; float:left;">
							<label>Limit the number of results</label>
                                                        <input type="text" name="limit" value="500" style="width:92%;" >
						</fieldset>
   <fieldset style="width:47%; float:right;">  
       <label>Search Engine</label>
       <p><select  style="width:92%;" name="c" value="Google">
            <option value="google">Google</option>
            <option value="linkedin">Linkedin</option>
            <option value="pgp">pgp</option>
            <option value="all">All</option>
            <option value="google_profiles">Google-profiles</option>
            <option value="bing">Bing</option>
            <option value="bing_api">Bint_Api</option>
            <option value="yandex">Yandex</option>
            <option value="people123">People123</option>
            <option value="jigsaw">Jigsaw</option>
        </select>
   </fieldset>
    <fieldset style=" float:left; width: 100%">
    <p><h3>Do You Want Me Include any of these Modules?</h3></p>



<p><tr> 
   					<td><input type="checkbox" name="c2"></td> 
    				<td>Verify host name via dns resolution and search for virtual hosts</td> 
				</tr> </p>
<p><tr> 
   					<td><input type="checkbox" name="c3"></td> 
    				<td>Perform a DNS reverse query on all ranges discovered</td> 
				</tr> </p>

<p><tr> 
   					<td><input type="checkbox" name="c5"></td> 
                                        <td>Perform a DNS TLD expansion discovery</td>
				</tr> </p>

    </fieldset>
        
        
						<div class="clear"></div>
				</div>
			<footer>
				<div class="submit_link">
					
                                    <input type="submit" name="submit" value="Start Now" class="alt_btn" id="submit">
                                    <a href="harvester.php"><input type="button" value="Reset" id="reset"></a>
				</div>
			</footer>
		</article><!-- end of post new article -->
                
               <?php
               
                if(isset($_POST['submit']))
                {
                    $url=$_POST['url'];
                    $c=$_POST['c'];
                    $c1=$_POST['c2'];
                    $c2=$_POST['c3'];
                    
                    $c3=$_POST['c5'];
                    $limit=$_POST['limit'];
                    
                $url = trim($url); //remove space from start and end of domain
                if(substr(strtolower($url), 0, 7) == "http://") $url = substr($url, 7); // remove http:// if included
                if(substr(strtolower($url), 0, 8) == "https://") $url = substr($url, 8); // remove http:// if included
                if(substr(strtolower($url), 0, 4) == "www.") $url = substr($url, 4);//remove www from domain
               
               
               $url_parts = explode("/", $url);
                     $url = $url_parts[0];
              
               if($url==''){
                    
                   echo "<script type='text/javascript'>$.msg({fadeIn : 500,fadeOut : 500,bgPath : 'dlgs/',  content : 'You Have not entered any URL.Please enter an URL to continue..'});</script>";
             
               }
 else {
             
      echo "<script type='text/javascript'>$.msg({ fadeIn : 500,fadeOut : 500, bgPath : 'dlgs/',  content : 'Starting theHarvester!You Can see Full result in result section'});</script>";
       
                   if(isset($c)){  
                       
                       require_once 'loading.php';
                       
                       if(isset($c1)&&isset($c2)&&isset($c3)){
                           shell("");
                          shell("python ./harvester/theHarvester.py -d $url -l $limit -v -n -t -b $c");
                           
                           
                   }elseif(isset ($c1)&&isset ($c2)){
                       shell("");
shell("python ./harvester/theHarvester.py -d $url -l $limit -v -n  -b $c");
                       
                       
                   }elseif (isset ($c1)&&isset ($c3)) {
                       shell("");
shell("sudo python ./harvester/theHarvester.py -d $url -l $limit -v -t -b $c");
                
                       
                       
            }elseif (isset ($c2)&&isset ($c3)) {
                shell("");
shell("python ./harvester/theHarvester.py -d $url -l $limit -n -t -b $c");
                
                
            }
                       
                       
   elseif (isset($c1)) {
       shell("");
shell("python ./harvester/theHarvester.py -d $url -l $limit -v   -b $c");
           }
            elseif (isset ($c2)) {
                shell("");
               shell("python ./harvester/theHarvester.py -d $url -l $limit -n   -b $c");
                
                
            } 
           
        elseif (isset ($c3)) {
            shell("");
 shell("python ./harvester/theHarvester.py -d $url -l $limit -t   -b $c");
            
            }  else {
                shell("");
                shell("python ./harvester/theHarvester.py -d $url -l $limit  -b $c");
                
            }
                       
                   }
        
        
       echo "<script type='text/javascript'>$.msg({ fadeIn : 500,fadeOut : 500, bgPath : 'dlgs/',  content : 'Info Harvesting Completed!You Can see Full result in result section'});</script>";
            
         
   
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
					
					
					<p>This Tool provides us information about e-mail accounts, user names and hostnames/subdomains from different public sources like search engines and PGP key server.</p>

<p>This tool is designed to help the penetration tester on an earlier stage; it is an effective, simple and easy to use.This tool acts as front end of theharvester by Christian Martorella</p>
<p>The sources supported are:</p>

					<ul>
						<li>Google - emails, subdomains/hostnames </li>
						<li>Google profiles - Employee names </li>
						<li>Bing search - emails, subdomains/hostnames, virtual hosts</li>
						<li>LinkedIn - Employee names</li>
                                                <li>Exalead - emails, subdomain/hostnames </li>
                                                
					</ul>
<p>The information gathering steps of footprinting and scanning are of utmost importance. Good information gathering can make the difference between a successful penetration test and one that has failed to provide maximum benefit to the client. We can say that Information is a weapon, a successful penetration testing and a hacking process need a lots of relevant information that is why, information gathering so called foot printing is the first step of hacking. So, gathering valid login names and emails are one of the most important parts for penetration testing. We can use these to profile our target, brute force authentication systems, send client-side attacks (through phishing), look through social networks for juicy info on platforms and technologies, etc.</p>
				</div>
                        
		</article><!-- end of styles article -->
                

		<div class="spacer"></div>
	</section>
</body>
</html>
