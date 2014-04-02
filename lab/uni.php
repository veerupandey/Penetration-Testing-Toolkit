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
			<header><h3>Web Vuln Scan Using uniscan</h3></header>
				<div class="module_content">
<form name="form1" action="" method="post"><fieldset>
		<legend>Target:</legend>
        <label for="ur">URL:</label><input id="ur" type="text" name="url" value="http://www.karunya.edu/" />
</fieldset>

    <fieldset>
        <legend>Scan Options</legend>
		<p><input  type="checkbox" name="options[]" value=" -q" checked="checked" /> Directory Check</p>
		<p><input  type="checkbox" name="options[]" value=" -w" checked="checked" /> File Check</p>
		<p><input  type="checkbox" name="options[]" value=" -e" checked="checked" /> /robots.txt Check</p>
		<p><input  type="checkbox" name="options[]" value=" -d" checked="checked" /> Dynamic Tests</p>
		<p><input  type="checkbox" name="options[]" value=" -s" checked="checked" /> Static Tests</p>
		<p><input  type="checkbox" name="options[]" value=" -r" checked="checked" /> Stress Tests</p>
		<p><input  type="checkbox" name="options[]" value=" -g" checked="checked" /> Web Server Information</p>
		<p><input  type="checkbox" name="options[]" value=" -j" checked="checked" /> Server Information</p>
       </fieldset>
        
						<div class="clear"></div>
				</div>
			<footer>
				<div class="submit_link">
					
                                    <input type="submit" name="submit" value="Start Scan" class="alt_btn" id="submit">
                                    <input type="reset" value="Reset" id="reset"></a>
</form>
				</div>
			</footer>
		</article><!-- end of post new article -->
                
               <?php
              if(isset($_POST['submit'])){
               $url = $_POST['url'];
require_once 'loading.php';
 if($url==''){
                   
                   echo "<script type='text/javascript'>$.msg({fadeIn : 500,fadeOut : 500,bgPath : 'dlgs/',  content : 'You Have not entered any URL.Please enter an URL to continue..'});</script>";
              }
               
 else {
  	if(preg_match("#;|\||&|%#", $url)){ die("Bad, very bad, this characters are not accepted: ; | & %");}
	

	foreach ($_POST['options'] as $key => $value) {
		if(preg_match("#;|\||&|%#", $value)){
			die("Bad, very bad, this characters are not accepted: ; | & %");
		}
$str.=$value;

		
	}
shell("echo 'Starting uniscan..'");
shell("sudo uniscan -b $str -u  $url|sed -e '1,8d'");
	
        
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
					
				<p>This tool uses uniscan tool to scan a website for vulnerabilities</p>
	
<p>Uniscan is a simple Remote File Include, Local File Include and Remote Command Execution vulnerability scanner.</p>
				</div>
                        
		</article><!-- end of styles article -->
                

		<div class="spacer"></div>
	</section>
</body>
</html>
