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
			<header><h3>Windows OS Payload </h3></header>
				<div class="module_content">
                                    <form name="form1" action="win_result.php" method="post">
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
                                                        <input type="text" name="pkg" value="U1304.exe" >
						</fieldset>
    
    
                                         
    <fieldset>
        <label>Choose a Payload</label><label style="float:right;margin-right: 2%">Description</label><br/>
        <p><input  type="radio" value="windows/shell_reverse_tcp" name="c" > Windows Shell Reverse_TCP<v style=" float: right;margin-right:  4%"> Spawn a command shell on victim and send back to attacker</v> </p>
       
        <p><input type="radio" value="windows/meterpreter/reverse_tcp" name="c" checked="true"> Windows Reverse_TCP Meterpreter <v style=" float: right;margin-right:  4%">  Spawn a meterpreter shell on victim and send back to attacker
</v> </p>

        <p><input type="radio" value="windows/shell_bind_tcp" name="c">  Windows Bind Shell <v style=" float: right;margin-right:  4%"> Execute payload and create an accepting port on remote system
</v>   </p>
        <p><input  type="radio" value="windows/vncinject/reverse_tcp" name="c" > Windows Reverse_TCP VNC DLL <v style=" float: right;margin-right:  4%"> Spawn a VNC server on victim and send back to attacker
        </v></p>
       
        <p><input type="radio" value="windows/meterpreter/reverse_tcp_allports" name="c">  Windows Meterpreter All Ports <v style=" float: right;margin-right:  4%"> Spawn a meterpreter shell and find a port home (every port)
 </v> </p>

        <p><input type="radio" value="windows/meterpreter/reverse_https" name="c">Windows Meterpreter Reverse HTTPS <v style=" float: right;margin-right:  4%">  Tunnel communication over HTTP using SSL and use Meterpreter
</v>   </p>
    <p><input  type="radio" value="windows/meterpreter/reverse_tcp_dns" name="c" >  Windows Meterpreter Reverse DNS <v style=" float: right;margin-right:  4%">  Use a hostname instead of an IP address and spawn Meterpreter

        </v></p>
  </fieldset>		
    <fieldset>
        <label>How stealthy do you want ?</label><br/>
        <p><input type="radio" value="1" name="s" checked="true" >Normal - about 400K payoad  - fast compile</p>
        <p><input type="radio" value="2" name="s" >Stealth - about 1-2 MB payload - fast compile </p>
        <p><input type="radio" value="3" name="s" >Super Stealth - about 10-20MB payload - fast compile </p>
        <p><input type="radio" value="4" name="s" >Insane Stealth - about 50MB payload - slower compile </p>
        <p><input type="radio" value="5" name="s" >Desperate Stealth - about 100MB payload - slower compile  </p>
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
