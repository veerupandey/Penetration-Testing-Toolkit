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
 with dpkg-scripts; if not, write to the Free Software Foundation, Inc.,
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
			<header><h3>BlindElephant Scan</h3></header>
				<div class="module_content">
<form name="form1" action="" method="post">
						<fieldset>

							<label>Enter Domain</label>
                                                        <input type="text" name="url" value=""  id="ur">
						</fieldset>
    <fieldset style="width:47%">  
        <label>Web Application</label>
   <select name="c" value="Drupal">
            <option value="drupal"> Drupal</option>
            <option value="joomla">Joomla</option>
            <option value="liferay">Liferay</option>
            <option value="mediawiki">Mediawiki</option>
            <option value="movabletype">movabletype</option>
            <option value="oscommerce">oscommerce</option>
            <option value="phpbb">phpbb</option>
            <option value="phpmyadmin">phpmyadmin</option>
            <option value="phpnuke">phpnuke</option>
            <option value="spip">spip</option>
            <option value="tikiwiki">tikiwiki</option>
            <option value="twiki">twiki</option>
            <option value="wordpress">wordpress</option>
        </select></p>
    </fieldset>
    <fieldset style ="float: left;width: 47%">
        <legend><label>No Idea About Web App?</label></legend><input type="checkbox" name="check">Guess Application</p>
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
                    $check=$_POST['check'];

                    
                
               
               
               if($url==''){
                   
                   echo "<script type='text/javascript'>$.msg({fadeIn : 500,fadeOut : 500,bgPath : 'dlgs/',  content : 'You Have not entered any URL.Please enter an URL to continue..'});</script>";
              }
               
 else {
      
      echo "<script type='text/javascript'>$.msg({ fadeIn : 500,fadeOut : 500, bgPath : 'dlgs/',  content : 'Execution Started!Please refer result section after this message'});</script>";
                   require_once 'loading.php';
                   if (isset($check))
                   {
                       echo "<p><b>Guessing the name of CMS</b></p>";
                       shell(" BlindElephant.py $url guess");
                   }
                 else {
    shell("BlindElephant.py $url $c");
             
                  
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
					
					
<p>This tool is designed to help the penetration tester on an earlier stage; it is an effective, simple and easy to use.This tool acts as front end of Blindelephant,a famous command line utility for cms identification</p>
<p>The BlindElephant Web Application Fingerprinter attempts to discover the version of a (known) web application by comparing static files at known locations against precomputed hashes for versions of those files in all all available releases. The technique is fast, low-bandwidth, non-invasive, generic, and highly automatable. </p>
<p>The sources supported are:</p>

					<ul>
                                            <li>Drupal</li>
                                        <li>Joomla</li>
            <li>Liferay</li>
            <li>Mediawiki</li>
            <li>movabletype</li>
            <li>movabletype</li>
            <li>oscommerce</li>
            <li>phpbb</li>
            <li>phpmyadmin</li>
            <li>phpnuke</li>
            <li>spip</li>
            <li>tikiwiki</li>
            <li>twiki</li>
            <li>wordpress</li>
                                                
					</ul>
<p>The information gathering steps of footprinting and scanning are of utmost importance. Good information gathering can make the difference between a successful penetration test and one that has failed to provide maximum benefit to the client. We can say that Information is a weapon, a successful penetration testing and a hacking process need a lots of relevant information that is why, information gathering so called foot printing is the first step of hacking. So, gathering valid login names and emails are one of the most important parts for penetration testing. We can use these to profile our target, brute force authentication systems, send client-side attacks (through phishing), look through social networks for juicy info on platforms and technologies, etc.</p>
				</div>
                        
		</article><!-- end of styles article -->
                

		<div class="spacer"></div>
	</section>
</body>
</html>
