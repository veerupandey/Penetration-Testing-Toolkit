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
			<header><h3>WordPress Site Scan</h3></header>
				<div class="module_content">
<form name="form1" action="" method="post">
						<fieldset>
							<label>Enter Wordpress Site</label>
							<input type="text" name="url" id="ur">
                                                        
						</fieldset>
    <fieldset> 
      <tr> 
          <td><input type="radio" name="c" value="c1" checked="true"></td> 
    				<td>Non Intrusive Check</td> 
				</tr> 
                                <p   <tr> 
   					<td><input type="radio" name="c" value="c2"></td> 
    				<td>Detect Version Of Wordpress</td> 
                                </tr> </p>
<p   <tr> 
   					<td><input type="radio" name="c" value="c3"></td> 
    				<td>Enumerate Users</td> 
                                </tr> </p>
<p   <tr> 
    <td><input type="radio" name="c" value="c4"></td> 
    				<td>Enumerate Installed Plugins</td> 
                                </tr> </p>
<p   <tr> 
    <td><input type="radio" name="c" value="c5"></td> 
    				<td>Enumerate installed timthumbs</td> 
                                </tr> </p>
<p   <tr> 
    <td><input type="radio" name="c" value="c6"></td> 
    				<td>Enumerate Installed Themes</td> 
                                </tr> </p>

<p   <tr> 
    <td><input type="radio" name="c" value="c7"></td> 
    				<td>GeoLocation</td> 
                                </tr> </p>
<p   <tr> 
    <td><input type="radio" name="c" value="c8"></td> 
    <td>Wordpress PingBack Port Scanner</td> <td><fieldset><input type="text" name="ur" value="Enter at least one  WordpressSite to pingback Target site e.g..http://www.myblog1.com/ /" style="background:floralwhite " maxlength="100" size="20"> </fieldset></td>
                                </tr> </p>

    </fieldset>			
						<div class="clear"></div>
				</div>
			<footer>
				<div class="submit_link">
					
                                    <input type="submit" name="submit" value="Start Wordpress Site Test" class="alt_btn" id="submit">
                                  <input type="reset" value="Reset" id="reset"></a>
				</div>
			</footer>
		</article><!-- end of post new article -->
                
               <?php
               
                if(isset($_POST['submit']))
                {
                    $url=$_POST['url'];
                    $c=$_POST['c'];
                    $ur=$_POST['ur'];
                    
       
                
               if($url==''){
                    echo "<script type='text/javascript'>$.msg({fadeIn : 500,fadeOut : 500,bgPath : 'dlgs/',  content : 'You Have not entered any URL.Please enter an URL to continue..'});</script>";
                  
               }
 else {
             
      if(isset($c))
      {
          echo "<script type='text/javascript'>$.msg({ fadeIn : 500,fadeOut : 500, timeout:100,bgPath : 'dlgs/',  content : 'Execution Started!Please refer result section after this message'});</script>";
                  
          require_once 'loading.php';
          switch ($c)
          {
              case c1:
                  echo "<p><b>Starting Non Intrusive checks on $url </b></p> ";
                shell("");
                  shell("sudo wpscan --url $url | sed -r 's/\x1B\[([0-9]{1,2}(;[0-9]{1,2})?)?[mGK]//g' ");
                  break;
              case c2:
                echo "<p><b>Detecting Version of wordpress on $url</b></p>"; 
                     shell("");
                  shell("sudo BlindElephant.py $url wordpress | sed -e '1,2d'");
                  break;
              case c3:
                   echo "<p><b>Enumerating Users on $url </b></p>";
                     shell("");
                  shell("sudo wpscan --url $url --enumerate u |  sed -e '1,15d' ");
                  break;
              case c4:
                  echo "<p><b>Enumerating Installed Plugin</b></p>";
                     shell("");
                  shell("sudo wpscan --url $url --enumerate p | sed -e '1,15d' ");
                  break;
              case c5:
                  echo "<p><b>Enumerating  installed timthumbs on $url  </b></p";
                     shell("");
                  shell("sudo wpscan --url $url --enumerate tt| sed -e '1,15d'");
                  break;
              case c6:
                  echo "<p><b>Enumerating installed themes on $url </b></p>";
                     shell("");
                  shell("sudo wpscan --url $url --enumerate t |  sed -e '1,15d'");
                  break;
              case c7:
                  echo "<p><b>Getting Location of $url </b></p>";
                     shell("");
                 shell("sudo python ./cmd/geoedge.py $url|grep 'IP\|Country\|City\|Coordinates'");
                 break;
              case c8:
                     echo "<p><b>Starting Wordpress PingBack Port Scanner  for $url through $ur ..</b></p>";
                     shell("");
                    shell(" sudo ruby /var/www/lab/cmd/wp/wppps.rb $url  $ur "); 
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
                }
                
 ?>
                

		
		<article class="module width_full">
			<header><h3>Tool Description</h3></header>
				<div class="module_content">
					
					
					
					<p>This security scan will check a WordPress installation for common security related mis-configurations.</p>

                                        <p>This tool uses famous wordpress scaner <a href="http://wpscan.org/">wpscan</a></p>
                                        
                                        
                                        

				</div>
                        
		</article><!-- end of styles article -->
                

		<div class="spacer"></div>
	</section>
</body>
</html>
