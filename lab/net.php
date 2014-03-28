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
			<header><h3>Network Tests</h3></header>
				<div class="module_content">
<form name="form1" action="" method="post">
						<fieldset>
							<label>Enter the URL</label>
							<input type="text" name="url" id="ur" >
                                                        
						</fieldset>
    <fieldset>
    <p> <tr> 
          <td><input type="radio" name="c" value="c1"></td> 
    				<td>Traceroute </td> 
    </tr></p> 
      
<p>  <tr> 
          <td><input type="radio" name="c" value="c2"></td> 
          <td>Test Ping</td> </tr></p>

						<p>  <tr> 
          <td><input type="radio" name="c" value="c3"></td> 
    				<td>NPing</td> 
                                <p>  <tr> 
                                    <td><input type="radio" name="c" value="c4" checked="true"></td> 
    				<td>ICMP monitoring(fping)</td> 
    </fieldset>
						
						<div class="clear"></div>
				</div>
			<footer>
				<div class="submit_link">
					
                                    <input type="submit" name="submit" value="Start Network Test" class="alt_btn" id="submit">
                                    <a href="net.php"><input type="button" value="Reset" id="reset"></a>
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
                   echo "<script type='text/javascript'>$.msg({ fadeIn : 500,fadeOut : 500, bgPath : 'dlgs/',  content : 'Traceroute started for  $url!Please refer result section after this message'});</script>";
            
                   echo "<p><b>Traceroute started for  $url</b></p>";
                  shell("sudo mtr --report $url");
                                     
 echo "<script type='text/javascript'>$.msg({ fadeIn : 500,fadeOut : 500, bgPath : 'dlgs/',  content : 'Traceroute Done for $url'});</script>";
                 
                  break;
              case c2:
                   echo "<script type='text/javascript'>$.msg({ fadeIn : 500,fadeOut : 500, bgPath : 'dlgs/',  content : 'Ping Test!Please refer result section after this message'});</script>";
            
                 echo "<p><b>Test Ping</b></p>";
                  shell(" ping -c 5 -R -a $url ");
                                     
 echo "<script type='text/javascript'>$.msg({ fadeIn : 500,fadeOut : 500, bgPath : 'dlgs/',  content : 'ping Done for $url'});</script>";
                  break;
              case c3:
                  
              echo "<script type='text/javascript'>$.msg({ fadeIn : 500,fadeOut : 500, bgPath : 'dlgs/',  content : 'Nping!Please refer result section after this message'});</script>";
            echo "<p><b>Nping for $url</b></p>";
            shell("nping $url");
                               
 echo "<script type='text/javascript'>$.msg({ fadeIn : 500,fadeOut : 500, bgPath : 'dlgs/',  content : 'Nping Done for $url'});</script>";
            
            break;
        case c4:
                  
              echo "<script type='text/javascript'>$.msg({ fadeIn : 500,fadeOut : 500, bgPath : 'dlgs/',  content : 'ICMP Monitoring!Please refer result section after this message'});</script>";
            echo "<p><b>fping for $url</b></p>";
            shell("fping $url && fping -C 8 $url");
                  
              echo "<script type='text/javascript'>$.msg({ fadeIn : 500,fadeOut : 500, bgPath : 'dlgs/',  content : 'ICMP Monitoring Done!Please refer result section after this message'});</script>";
                             
        
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
					
					
					
                                    <p>This tool act as front end for mtr,traceroute  and ping command</p>
                                    <p>It is a computer network diagnostic tool for displaying the route (path) and measuring transit delays of packets across an Internet Protocol (IP) network. </p>
                                    

					<ul>
   

						<li>Display the route using mtr </li>
						<li> Ping Target to check its availability</li>
                                                
						
                                                
					</ul>
                                    <p>Ping (networking utility), a computer network tool used to test whether a particular host is reachable across an IP network</p>
                                        
                                        

				</div>
                        
		</article><!-- end of styles article -->
                

		<div class="spacer"></div>
	</section>
</body>
</html>
