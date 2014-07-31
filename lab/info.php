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
			<header><h3>Information Gathering</h3></header>
				<div class="module_content">
<form name="form1" action="" method="post">
						<fieldset>
							<label>Enter Domain or IP</label>
                                                        <input type="text" name="url" id="ur"  >
						</fieldset>
    <fieldset> 
        <p><tr> 
    <td><input type="radio" name="c" value="c0"></td> 
    				<td>Retrieve NetBIOS State</td> 
				</tr> </p>
<p><tr>
<p><tr> 
    <td><input type="radio" name="c" value="c1" checked="true"></td> 
    				<td>Live Host Identification</td> 
				</tr> </p>
   
      <p>   <tr> 
   					<td><input type="radio" name="c" value="c2"></td> 
    				<td>Retrieve netcraft.com information on host</td> 
                                </tr> </p>
<p>   <tr> 
   					<td><input type="radio" name="c" value="c3"></td> 
    				<td>Search for possible email address</td> 
                                </tr> </p>

<p><tr> 
   					<td><input type="radio" name="c" value="c4"></td>
                                        <td>Enumerating all hostnames which Bing has indexed for IP address</td> 
				</tr> </p>
<p><tr> 
   					<td><input type="radio" name="c" value="c5"></td> 
                                        <td>Search URL for Datas(MD5,MySQL,WP (Wordpress),Domain,URL,IP4,IP6,SSN,EMAIL,CCN,Twitter,DOC,EXE,ZIP,IMG)<input type="text" name="data" value="EMAIL" maxlength="30" size="4" style="float: right;width: 10%"></td> 
				</tr> </p>


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
                   
                    $c=$_POST['c'];
                    $doc=$_POST['doc'];
                    
                    $data=$_POST['data'];
                    
                 $url = trim($url); //remove space from start and end of url
               if(substr(strtolower($url), 0, 7) == "http://") $url = substr($url, 7); // remove http:// if included
                if(substr(strtolower($url), 0, 8) == "https://") $url = substr($url, 8);
      
                     $url_parts = explode("/", $url);
                     $url = $url_parts[0];
                      
                       
                    
                    
                
               
                
               if($url==''){
                   echo "<script type='text/javascript'>$.msg({fadeIn : 500,fadeOut : 500,bgPath : 'dlgs/',  content : 'You Have not entered any URL.Please enter an URL to continue..'});</script>";
             
               }
 else 
              
               {
                   echo "<script type='text/javascript'>$.msg({ fadeIn : 500,fadeOut : 500, bgPath : 'dlgs/',  content : 'Started ! Please refer result section after this message'});</script>";
      
                     require_once 'loading.php';
                      
                       
                    
     
     
                     switch ($c)
     {
                         case c0:
          echo "<p><bRetriving NetBIOS state for  $url</b></p>";
                             shell("");
        shell("nmap -Pn --script nbstat -p 137  $url");
        break;
    
        case c1:
            echo "<p><b>Live Host Identification for  $url</b></p>";
            shell("");
            shell("sudo xprobe2 $url |sed -e '1,19d'");
            break;
        
         
            
         
         case c2:
              echo "<p><b>Retrieving Netcraft.com Info on $url:</b></p>";
                 
                       shell("dmitry -n $url");
                       break;
                   
                         case c3:
                              echo "<p><b>Searching  $url for possible email address</b></p>";
         shell(" dmitry -e $url");
         break;
                         case c4:
                             
          echo "<p><b>Enumerating all hostnames which Bing has indexed for  IP address. of $url:</b></p>";
                                 shell("");
          shell("sudo ./cmd/bing-ip2hosts $url");
          break;
      
                         case c5:
              if ($data!=''){
                 echo "<p><b>Searching $url for $data:</b></p>";
                    
            
              shell("sudo python ./cmd/tekCollect.py -u http://$url -t $data  ");  
              }  else {
                  echo "Hey!Please enter a data  e.g.MD5,MySQL,WP (Wordpress),Domain,URL,IP4,IP6,SSN,EMAIL,CCN,Twitter,DOC,EXE,ZIP,IMG";
              }
            
              
           
             
    
     }
    echo "<script type='text/javascript'>$.msg({ fadeIn : 500,fadeOut : 500, bgPath : 'dlgs/',  content : 'Done ! See Full result in result section'});</script>";
            
     
        
        
         

   
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
			<header><h3 id="b">Tool Description</h3></header>
				<div class="module_content">
					
                                    <p>This tool provides the following functionalities:</p>	
                                    <ul>
                                        <li> Retrieve NetBIOS State</li>
                                        <li> Live Host Identification e.g..ping,distance calculation,OS fingerprinting etc</li>
                                        <li> Retrieve netcraft.com information on host </li>
                                        <li> Search for possible email address  </li>
                                        <li> Enumerate all hostnames which Bing has indexed for input IP address </li>
                                        <li>Search input URL for Datas(MD5,MySQL,WP (Wordpress),Domain,URL,IP4,IP6,SSN,EMAIL,CCN,Twitter,DOC,EXE,ZIP,IMG)</li>
                                    </ul>
				</div>
                        
		</article><!-- end of styles article -->
                

		<div class="spacer"></div>
	</section>
</body>
</html>
