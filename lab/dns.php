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
			<header><h3>DNS Queries</h3></header>
				<div class="module_content">
<form name="form1" action="" method="post">
						<fieldset>
							<label>Enter Domain/IP Here</label>
							<input type="text" name="url" id="ur" >
                                                        
						</fieldset>
    <fieldset>
      <tr> 
          <td><input type="radio" name="c" value="c1" checked="true"></td> 
    				<td>DNS Lookup</td> 
				</tr> 
                                <p   <tr> 
   					<td><input type="radio" name="c" value="c2"></td> 
    				<td>Reverse DNS</td> 
                                </tr> </p>
<p   <tr> 
   					<td><input type="radio" name="c" value="c3"></td> 
    				<td>Whois Lookup</td> 
                                </tr> </p>
<p   <tr> 
    <td><input type="radio" name="c" value="c4"></td> 
    				<td>MX Lookup</td> 
                              
                                </tr> </p>

    <td><input type="radio" name="c" value="c5"></td> 
    				<td>DNS Zone Transfer</td> 
                                </tr> </p>
<p   <tr> 
    <td><input type="radio" name="c" value="c6"></td> 
    				<td>Find the Status Of Authority(SOA) record in a zone file</td> 
                                </tr> </p>
<p   <tr> 
    <td><input type="radio" name="c" value="c7"></td> 
    				<td>Brute Force DNS</td> 
                                </tr> </p>
    <p   <tr> 
    <td><input type="radio" name="c" value="c8"></td> 
    				<td>DNS Record Viewer</td> 
                              
                                </tr> </p>
<p   <tr> 
    <p   <tr> 
    <td><input type="radio" name="c" value="c9"></td> 
    				<td>Trace a chain of DNS Server to the source</td> 
                                </tr> </p>

    </fieldset>				
						<div class="clear"></div>
				</div>
			<footer>
				<div class="submit_link">
					
                                    <input type="submit" name="submit" value="Start DNS Test" class="alt_btn" id="submit">
                                    <input type="reset" value="Reset" id="reset">
				</div>
			</footer>
		</article><!-- end of post new article -->
                
               <?php
               
                if(isset($_POST['submit']))
                {
                    $url=$_POST['url'];
                    $c=$_POST['c'];
                   
                  $url = trim($url); //remove space from start and end of url
               if(substr(strtolower($url), 0, 7) == "http://") $url = substr($url, 7); // remove http:// if included
                if(substr(strtolower($url), 0, 8) == "https://") $url = substr($url, 8);
      
                     $url_parts = explode("/", $url);
                     $url = $url_parts[0];
                      
       
                
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
                  echo "<script type='text/javascript'>$.msg({ fadeIn : 500,fadeOut : 500, bgPath : 'dlgs/',  content : 'DNS Lookup Started for $url!Please refer result section after this message'});</script>";
            
                  echo "<p><b>DNS Lookup Started for $url </b></p> ";
             
             shell(" dig $url ANY +noall +answer  | sed -e '1,3d' ");
                  break;
              case c2:
                 if(filter_var($url, FILTER_VALIDATE_IP))
                 {
                     echo "<script type='text/javascript'>$.msg({ fadeIn : 500,fadeOut : 500, bgPath : 'dlgs/',  content : 'Reverse DNS for $url!Please refer result section after this message'});</script>";
            
                      echo "<p><b>Reverse DNS for $url</b></p>"; 
                  shell("dig +noall +answer -x $url ");
                 }else{
                     echo "<script type='text/javascript'>$.msg({ fadeIn : 500,fadeOut : 500, bgPath : 'dlgs/',  content : '$url is not a valid IP'});</script>";
                     echo "$url is not a valid IP";
                 }
               
                  break;
              case c3:
                  echo "<script type='text/javascript'>$.msg({ fadeIn : 500,fadeOut : 500, bgPath : 'dlgs/',  content : 'Whois Lookup for $url!Please refer result section after this message'});</script>";
            
                  if(filter_var($url, FILTER_VALIDATE_IP)){
                      echo "<p><b>Whois Lookup for $url </b></p>";
                  shell("sudo dmitry -i $url "); 
                  }
 else {
      
                      echo "<p><b>Whois Lookup for $url </b></p>";
                  shell("sudo dmitry -w $url  "); 
                  
 }
                  
                  break;
              case c4:
                  echo "<script type='text/javascript'>$.msg({ fadeIn : 500,fadeOut : 500, bgPath : 'dlgs/',  content : 'Mail Exachange Loopkup(MX Lookup) Started for $url!Please refer result section after this message'});</script>";
            
                  echo "<p><b>Mail Exachange Loopkup(MX Lookup) Started for $url</b></p>";
                  shell(" host -t MX $url ");
                  break;
              case c5:
                  echo "<script type='text/javascript'>$.msg({ fadeIn : 500,fadeOut : 500, bgPath : 'dlgs/',  content : 'DNS Zone Transfer Starting for $url!Please refer result section after this message'});</script>";
            
                  echo "<p><b>DNS Zone Transfer Starting for $url </b></p>";
              
                  shell("sudo dig $url AXFR|sed -e '1,3d'");
                  break;
              case c6:
                  echo "<script type='text/javascript'>$.msg({ fadeIn : 500,fadeOut : 500, bgPath : 'dlgs/',  content : 'Execution Started!Please refer result section after this message'});</script>";
            
                  echo "<p><b>Finding the Status Of Authority(SOA) record in a zone file for  $url</b></p>";
                  shell("dig +nocmd $url any +multiline +noall +answer");
                  break;
              case c7:
                  echo "<script type='text/javascript'>$.msg({ fadeIn : 500,fadeOut : 500, bgPath : 'dlgs/',  content : 'Execution Started!Please refer result section after this message'});</script>";
            
                  echo "<p><b>Bruteforcing DNS-Records for Domain $url </b></p>";
                 shell("sudo nmap -Pn -p 80 --script dns-brute $url|sed -e '1,4d'");
                 break;
             case c8:
                 echo "<script type='text/javascript'>$.msg({ fadeIn : 500,fadeOut : 500, bgPath : 'dlgs/',  content : 'Viewing DNS Records for $url!Please refer result section after this message'});</script>";
            
                  echo "<p><b>Viewing DNS Records for $url </b></p>";
                 shell("host -t any $url");
                 break;
             
             case c9:
                 echo "<script type='text/javascript'>$.msg({ fadeIn : 500,fadeOut : 500, bgPath : 'dlgs/',  content : 'Tracing a chain of DNS Server to the source!Please refer result section after this message'});</script>";
            
                  echo "<p><b>Tracing a chain of DNS Server to the source </b></p>";
                 shell("dnstracer $url");
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
					
					
					
                                    <p><b>DNS Lookup</b></p>
                                    <p>A domain has a number of records associated with it, a DNS server can be queried to determine the IP address of the primary domain (A record), mail servers (MX records), DNS servers (NS nameservers) and other items such as SPF records (TXT records)
                                        .The DNS lookup tool uses the dig command line to show the response from a query of type any.</p>
                                        
                                    <p><b>Discovering host names with Reverse DNS Lookups</b></p>
                                    <p>A reverse DNS record is simply an entry that resolves an IP address back to a host name.
                                        Most people are aware of the forward lookup or discovering an IP address from a host name so that an Internet service is able to be accessed.</p>
				
                                    <p><b>Digging DNS with a Zone Transfer</b></p>
                        <p>A zone transfer that from an external IP address is used as part of an attackers reconnaissance phase. Usually a zone transfer is a normal operation between primary and secondary DNS servers in order to synchronise the records for a domain. This is typically not something you want to be externally accessible. If an attacker can gather all your DNS records, they can use those to select targets for exploitation.</p>
                         <p><b>Whois Lookup</b></p>
                         <p>Whois lookups are an easy and fast way to find the ISP, Hosting provider, countries and contact details for domains and IP addresses. There are many uses for this data that can be utilized by both attackers and defenders in the information security sector.</p>
                                </div>
		</article><!-- end of styles article -->
                

		<div class="spacer"></div>
	</section>
</body>
</html>
