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
			<header><h3>Information Extractor</h3></header>
				<div class="module_content">
<form name="form1" action="" method="post">
						<fieldset>
							<label>Enter Domain</label>
                                                        <input type="text" name="url"  id="ur">
						</fieldset>
      
    <fieldset>
         <p><tr> 
             <td><input type="radio" name="c" value="c1" checked="true"></td> 
                                        <td> Generate and Test Domain Typos</td>
				</tr> </p>
<p><tr> 
<p><tr> 
    <td><input type="radio" name="c" value="c2"></td> 
    				<td>Generate and Show Invalid Domain Names</td> 
				</tr> </p>
<p><tr> 
    <td><input type="radio" name="c" value="c3"></td> 
    				<td>Generate and Check Domain Popularity with Google</td> 
				</tr> </p>
    <p><tr> 
    <td><input type="radio" name="c" value="c4"></td> 
    				<td>Perform a whois lookup on the domain name of host</td> 
				</tr> </p>
    <p><tr> 
    <td><input type="radio" name="c" value="c5"></td> 
    				<td>Investigate domain with the common web based tools(Automator)</td> 
				</tr> </p>
    

    

    </fieldset>




						
						<div class="clear"></div>
				</div>
			<footer>
				<div class="submit_link">
					
                                    <input type="submit" name="submit" value="Start Now" class="alt_btn" id="submit">
                                    <a href="domain.php"><input type="button" value="Reset" id="reset"></a>
				</div>
			</footer>
		</article><!-- end of post new article -->
                
               <?php
               
                if(isset($_POST['submit']))
                {
                    $url=$_POST['url'];
                    
                    $c=$_POST['c'];
                    
                    
                                     
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
             
                       require_once 'loading.php';
                       switch ($c)
                       {
                           case c1:
                            
                    echo "<script type='text/javascript'>$.msg({ fadeIn : 500,fadeOut : 500, bgPath : 'dlgs/',  content : 'Generating Domain Typos!Please refer result section after this message'});</script>";
          echo "<p><b>Generating and Testing Domain Typs</b></p>";
          shell("");
          shell("urlcrazy $url");
          echo "<script type='text/javascript'>$.msg({ fadeIn : 500,fadeOut : 500, bgPath : 'dlgs/',  content : 'Domain Typos Generated!Please refer result section after this message'});</script>";
          
                 break;
             
                           case c2:
                                        
                    echo "<script type='text/javascript'>$.msg({ fadeIn : 500,fadeOut : 500, bgPath : 'dlgs/',  content : 'Generating and Showing Invalid Domain Names(Domain Typos)!Please refer result section after this message'});</script>";
          echo "<p><b>Generating and Showing Invalid Domain Typs</b></p>";
              shell("");
          shell("urlcrazy -i $url");
          
            echo "<script type='text/javascript'>$.msg({ fadeIn : 500,fadeOut : 500, bgPath : 'dlgs/',  content : 'Domain Typos Generated!Please refer result section after this message'});</script>";
            break;
        
         case c3:
                                        
                    echo "<script type='text/javascript'>$.msg({ fadeIn : 500,fadeOut : 500, bgPath : 'dlgs/',  content : ' Checking Domain Popularity with Google!Please refer result section after this message'});</script>";
          echo "<p><b>Generating and  Domain Typs</b></p>";
              shell("");
          shell("urlcrazy -p $url");
          
            echo "<script type='text/javascript'>$.msg({ fadeIn : 500,fadeOut : 500, bgPath : 'dlgs/',  content : 'Domain Typos Generated!Please refer result section after this message'});</script>";
            break;
         case c4:
                                        
                    echo "<script type='text/javascript'>$.msg({ fadeIn : 500,fadeOut : 500, bgPath : 'dlgs/',  content : ' Performing whois lookup on the domain name of host!Please refer result section after this message'});</script>";
          echo "<p><b>Generating and  Domain Typs</b></p>";
          shell("");
          shell("dmitry -w $url");
          
            echo "<script type='text/javascript'>$.msg({ fadeIn : 500,fadeOut : 500, bgPath : 'dlgs/',  content : 'Success!Please refer result section after this message'});</script>";
            break;
        
                           case c5:
                            echo "<script type='text/javascript'>$.msg({ fadeIn : 500,fadeOut : 500, bgPath : 'dlgs/',  content : ' investigating IP Addresses and URLs with the common web based tools'});</script>";
          shell("echo 'Investigating IP Addresses and URLs with  common web based tools' ");
      
          shell("sudo automater -t $url|sed -e'1,13d'");
          
            echo "<script type='text/javascript'>$.msg({ fadeIn : 500,fadeOut : 500, bgPath : 'dlgs/',  content : 'Success!Please refer result section after this message'});</script>";
           

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
                     
     
                
 ?>
                

		
		<article class="module width_full">
			<header><h3>Tool Description</h3></header>
				<div class="module_content">
                                    <p><b>Automater</b></p>
                                    <p>Automator is a IP and URL Passive Analysis tool</p>

                                    <p><b>Urlcrazy</b></p>
                                    Generate and test domain typos and variations to detect and perform
                                    <ul><li> URL hijacking</li><li>phishing</li><li>corporate espionage.</li></ul>

Supports the following domain variations:
<ul><li>Character omission, character repeat, adjacent character swap,
    </li><li>adjacent character replacement, double 
        character replacement, adjacent character insertion</li><li> missing dot, strip dashes, singular or pluralise,
        common misspellings, vowel swaps, homophones</li><li>bit flipping (cosmic rays), homoglyphs, wrong top level 
domain, and wrong second level domain.
</li></ul>
                                </div>
                        
		</article><!-- end of styles article -->
                

		<div class="spacer"></div>
	</section>
</body>
</html>
