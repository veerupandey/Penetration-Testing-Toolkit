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
                    <header><h3>Quick Payload Generator </h3></header>
				<div class="module_content">
                                    <form name="form1" action="payload_result.php" method="post">
						<fieldset>
							<label>Enter Your IP Address(LHOST)</label>
                                                        <input type="text" name="ip" value="" >
						</fieldset>
    <fieldset>
							<label>Enter Port to Use(LPORT)</label>
                                                        <input type="text" name="port" value="4444" >
    </fieldset>
    <fieldset>
							<label>Enter Payload Name</label>
                                                        <input type="text" name="pkg" value="pentest" >
						</fieldset>
    
    
                                         
    <fieldset>
        <label>Windows payload</label><label style="float:right;margin-right: 2%">Description</label><br/>
        <p><input type="radio" value="c1" name="c" checked="true" > Windows Meterpreter Reverse Tcp <v style=" float: right;margin-right:  4%">  Spawn a meterpreter shell on victim and send back to attacker
</v> </p>
 <p><input  type="radio" value="c2" name="c" > Windows Shell Reverse_TCP<v style=" float: right;margin-right:  4%"> Spawn a command shell on victim and send back to attacker</v> </p>
  <p><input type="radio" value="c3" name="c">  Payload using msfvenom<v style=" float: right;margin-right:  4%"> Msfvenom Encoding Payload</v></p>
  <p><input type="radio" value="c4" name="c">Custom Shell Code<v style=" float: right;margin-right:  4%">Encoding Trojan Bypass 80% Anti Virus</v></p>
    </fieldset>
     <fieldset>
        <label>Linux Payload</label><label style="float:right;margin-right: 2%">Description</label><br/>     
    <p><input type="radio" value="c5" name="c">  Linux x86 Meterpreter Reverse Tcp	 <v style=" float: right;margin-right:  4%"> Connect back to the attacker, Staged meterpreter server</v> </p>
 <p><input  type="radio" value="c6" name="c" > Linux x86 shell reverse_tcp<v style=" float: right;margin-right:  4%"> Connect back to the attacker, Spawn a command shell</v> </p>
     </fieldset>
    
          <fieldset>
        <label>Apple OSX Payload</label><label style="float:right;margin-right: 2%">Description</label><br/>     
    <p><input type="radio" value="c8" name="c"> OSX Reverse TCP <v style=" float: right;margin-right:  4%">OS X Command Shell, Reverse TCP Inline
</v> </p>
 <p><input  type="radio" value="c9" name="c" >OSX Isight bind_tcp <v style=" float: right;margin-right:  4%"> Mac OS X x86 iSight Photo Capture, Bind TCP Stager
</v> </p>
     </fieldset>
    <fieldset>
        <label>Java Payloads</label><label style="float:right;margin-right: 2%">Description</label><br/>
      <p><input type="radio" value="c10" name="c"> Java meterpreter reverse_tcp <v style=" float: right;margin-right:  4%">Java Meterpreter, Java Reverse TCP Stager

</v> </p>
 <p><input  type="radio" value="c11" name="c" >Java shell reverse_tcp <v style=" float: right;margin-right:  4%"> Command Shell, Java Reverse TCP Stager

</v> </p>
     
   <p><input type="radio" value="c12" name="c">Java shell bind_tcp  <v style=" float: right;margin-right:  4%"> Command Shell, Java Bind TCP Stager

</v> </p>
       
 </fieldset>
    <fieldset>
        <label>Web Shell</label><label style="float:right;margin-right: 2%">Description</label><br/>
        <p><input  type="radio" value="c13" name="c" >PHP<v style=" float: right;margin-right:  4%">PHP Meterpreter Reverse_tcp

</v> </p>
      
 <p><input  type="radio" value="c14" name="c" >ASP<v style=" float: right;margin-right:  4%">ASP Page with metasploit payload

</v> </p>
     
   <p><input type="radio" value="c15" name="c">JSP<v style=" float: right;margin-right:  4%">   Java JSP Command Shell, Reverse TCP Inline


</v> </p>
</fieldset>
    <fieldset>
        <label>Android OS  Payload</label><label style="float:right;margin-right: 2%">Description</label><br/>
      
     <p><input type="radio" value="c16" name="c"> Android Meterpreter<v style=" float: right;margin-right:  4%">  Android Meterpreter, Dalvik Reverse TCP Stager
</v></p>        
 </fieldset>
       
 </fieldset>
   
    
   
        
						
						<div class="clear"></div>
				</div>
			<footer>
				<div class="submit_link">
					
                                    <input type="submit" name="submit" value="Start Now" class="alt_btn" id="submit">
                                   <input type="reset" value="Reset" id="reset">
				</div>
			</footer>
		</article><!-- end of post new article -->
                
               

		
		<div class="spacer"></div>
	</section>
</body>
</html>
