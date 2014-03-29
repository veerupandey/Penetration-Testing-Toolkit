
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
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8"/>
	<title>Penetration Testing Toolkit</title>
        <link rel="stylesheet" href="v.css" type="text/css" media="screen" />
	
	<link rel="stylesheet" href="css/layout.css" type="text/css" media="screen" />
        <link media="screen" href="dlgs/jquery.msg.css" rel="stylesheet" type="text/css">
        <script src="js/jquery-2.1.0.min.js" type="text/javascript"></script>
  
        <script type="text/javascript" src="dlgs/jquery.center.min.js"></script>
        <script type="text/javascript" src="dlgs/jquery.msg.js"></script>

        
	
        
	<script src="js/hideshow.js" type="text/javascript"></script>
	<script src="js/jquery.tablesorter.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/jquery.equalHeight.js"></script>
       
            
    
    
        
    </script>
	<script type="text/javascript">
	$(document).ready(function() 
    	{ 
      	  $(".tablesorter").tablesorter(); 
   	 } 
	);
	$(document).ready(function() {

	//When page loads...
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content

	//On Click Event
	$("ul.tabs li").click(function() {

		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content

		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active ID content
		return false;
	});

});
    </script>
    <script type="text/javascript">
    $(function(){
        $('.column').equalHeight();
    });
</script>

</head>


<body onload="dvProgress.style.display = 'none';">

	<header id="header">
		<hgroup>
			<h1 class="site_title"><a href="index.php">Pen-Tools</a></h1>
                        <h2 class="section_title">Penetration Testing Toolkit</h2>
		</hgroup>
	</header> <!-- end of header bar -->
	
	<section id="secondary_bar">
		<div class="user">
                   
			<p>Welcome <?php echo get_current_user(); ?></p>
			 <a class="logout_user" href="#" title=""></a> 
		</div>
		<div class="breadcrumbs_container">
			<article class="breadcrumbs"><a href="index.php">Home</a> <div class="breadcrumb_divider"></div> <a class="current">Pentest</a></article>
		</div>
	</section><!-- end of secondary bar -->
	
	<aside id="sidebar" class="column">
		
		<hr/>
		<h3 >Scanner</h3>
		<ul class="toggle">
                    <li class="icn_settings"><a href="index.php">Nmap Scanner Menu</a></li>
			<li class="icn_security"><a href="vuln.php">Web Scanner</a></li>
                     <li class="icn_categories"><a href="uni.php">URL Fuzzer</a></li>
			<li class="icn_security"><a href="sweep.php">Ping Sweep</a></li>
                       
                        
		</ul>
                <h3>Info Gathering</h3>
                <ul class="toggle">
                    <li class="icn_settings"><a href="info.php">Information gathering</a></li>
			<li class="icn_categories"><a href="harvester.php">TheHarvester</a></li>
                        <li class="icn_security"><a href="google.php">Google Hacking</a></li>
                         
                </ul>
               
                <h3>Payload Generator</h3>
                <ul class="toggle">
                    <li class="icn_settings"><a href="payload.php">Quick Payload</a></li>
                    <li class="icn_security"><a href="win.php">Windows OS</a></li>
			
                </ul>
                
               
               
<h3> Backdoors</h3>
		<ul class="toggle">
                    <li class="icn_settings"><a href="exe.php">Backdooring exe</a></li>
                    <li class="icn_security"><a href="deb.php">Debian package backdoor</a></li>
                    <li class="icn_categories"><a href="check.php">PDF Backdoor</a></li>
                    <li class="icn_jump_back"><a href="phpbackdoor.php">PHP Backdoor</a></li>
                        </ul>
 
                
<h3>CMS Explorer</h3>
		<ul class="toggle">
			<li class="icn_settings"><a href="wordpress.php">Wordpress</a></li>
			<li class="icn_security"><a href="joomla.php">Joomla</a></li>
			<li class="icn_categories"><a href="drupal.php">Drupal</a></li>
                        <li class="icn_jump_back"><a href="cms.php">Detect Version of CMS</a></li>
		</ul>
		
		<h3>Network Tools</h3>
		<ul class="toggle">
			<li class="icn_security"><a href="dns.php">DNS Queries</a></li>
			<li class="icn_categories"><a href="ip.php">IP Address</a></li>
                        <li class="icn_jump_back"><a href="web.php">Web Tools</a></li>
                        <li class="icn_settings"><a href="net.php">Network Tests</a></li>
                     
		</ul>

		
		
                
                <h3>Domain Tools</h3>
		<ul class="toggle">
			<li class="icn_settings"><a href="dmtool.php">Domain info</a></li>
                         <li class="icn_security"><a href="domain.php">Domain tools</a></li>
			
			
		</ul>
                
		
                <h3>Other Web Tools</h3>
                <ul class="toggle">
                   
			
                        <li class="icn_security"><a href="http://map.honeynet.org/" target="_blank">Current world attack</a></li>
                        <li class="icn_settings"><a href="http://ubuntuone.com/0phf469wTTJyly6VO2q14u" target="_blank">DDOS Javascript</a></li>
                        <li class="icn_jump_back"><a  href="https://suite.websecurify.com/" target="_blank">WebSecurify</a></li>
		
                         
                </ul>
  
                <h3>Execute System Commands</h3>
<ul class="toggle">
                           <?php $host=$_SERVER['SERVER_ADDR'];?>
			<li class="icn_settings"><?php echo "<a href='https://$host:4200/'>";?>Terminal</a></li>
		
		</ul>
           
		<footer>
			<hr />
			<p><strong>Copyright &copy; 2014 Rakesh Pandey</strong></p>
                        <p>Created by <a href="https://facebook.com/veerubhai" target="_blank">Rakesh Pandey</a></p>
		</footer>
	</aside><!-- end of sidebar -->


</body>

</html>
