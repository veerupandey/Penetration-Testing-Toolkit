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
			<header><h3>Web Tools</h3></header>
				<div class="module_content">
<form name="form1" action="" method="post">
						<fieldset>
							<label>Enter the URL</label>
							<input type="text" name="url" id="ur" >
                                                        

                                                </fieldset>
    <fieldset>
    <p> <tr> 
          <td><input type="radio" name="c" value="c1"></td> 
    				<td>Get HTTP Header</td> 
    </tr></p> 
      
<p>  <tr> 
          <td><input type="radio" name="c" value="c2"></td> 
          <td>Link Extractor</td> </tr></p>
                                <p>  <tr> 
                                    <td><input type="radio" name="c" value="c3" checked="true"></td> 
          <td>Website Link Checker</td> </tr></p>

    </fieldset>			
						<div class="clear"></div>
				</div>
			<footer>
				<div class="submit_link">
					
                                    <input type="submit" name="submit" value="Start Now" class="alt_btn" id="submit">
                                    <a href="web.php"><input type="button" value="Reset" id="reset"></a>
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
                  echo "<script type='text/javascript'>$.msg({ fadeIn : 500,fadeOut : 500, bgPath : 'dlgs/',  content : 'Getting HTTP Header!Please refer result section after this message'});</script>";
            
                   echo "<p><b>Getting HTTP Header on $url</b></p>";
                  shell("sudo curl -I $url");
                                     
 echo "<script type='text/javascript'>$.msg({ fadeIn : 500,fadeOut : 500, bgPath : 'dlgs/',  content : 'See HTTP Header details for $url in Result Section'});</script>";
                 
                  break;
              case c2:
                  echo "<script type='text/javascript'>$.msg({ fadeIn : 500,fadeOut : 500, bgPath : 'dlgs/',  content : 'Dumping all the links of  $url in your web page!Please refer result section after this message'});</script>";
            
                 echo "<p><b>Dumping all the links of  $url in your web page</b></p>";
                  shell(" lynx -dump $url ");
                                     
 echo "<script type='text/javascript'>$.msg({ fadeIn : 500,fadeOut : 500, bgPath : 'dlgs/',  content : 'Links dumped from $url to your result section'});</script>";
                  break;
             
              case c3:
                  echo "<script type='text/javascript'>$.msg({ fadeIn : 500,fadeOut : 500, bgPath : 'dlgs/',  content : 'Checking link status on $url !Refer Result Section For Detail'});</script>";
            
                  require 'microLink.php';
                  echo "<script type='text/javascript'>$.msg({ fadeIn : 500,fadeOut : 500, bgPath : 'dlgs/',  content : 'Done!Please refer result section after this message'});</script>";
            
                  break;
                
                  
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
                }
                
 ?>
                

		
		<article class="module width_full">
			<header><h3>Tool Description</h3></header>
				<div class="module_content">
					
                                    <p> <b>HTTP Header</b></p>
                                    <p>A great deal of information can be gathered in a check of the HTTP Headers from a web server. Server side software can be identified often down to the exact version running. Cookie strings, web application technologies and other data can be gathered from the HTTP Header. This information can be used when troubleshooting or when planning an attack against the web server.</p>
                                    <p><b>Link Extractor</b></p>
                                    <p>The purpose of this tool is to allow a fast and easy to scrape links from a web page. Listing links, domains and resources that a page links to can tell you a lot about the page. Reasons for using a tool such as this are wide ranging; from Internet research, web page development to security assessments and web page testing.

The tool has been built with a simple and well known command line tool Lynx. This is a text based web browser popular on Linux based operating systems.

</p>
                                        

				</div>
                        
		</article><!-- end of styles article -->
                

		<div class="spacer"></div>
	</section>
</body>
</html>
