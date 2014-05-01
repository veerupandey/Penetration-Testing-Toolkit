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
			<header><h3>Backdooring EXE files</h3></header>
				<div class="module_content">
                                    <form name="form1" action="exe_result.php" method="post" enctype="multipart/form-data">
						<fieldset>
							<label>Enter Your IP Address</label>
                                                        <input type="text" name="ip" value="" >
						</fieldset>
    <fieldset>
							<label>Enter Port to Use</label>
                                                        <input type="text" name="port" value="4444" >
                                                        </fieldset>
    
   
                                         <fieldset>
							<label>Enter Package Name </label>
                                                        <input type="text" name="pkg" value="pentest.exe" >
                                                        <p style="margin-left: 2% "><b>Note:</b>Don't provide anyname  if u need output file to have  same name as uploaded file</p>
						</fieldset>
    <fieldset>
							<label>Upload an executable file</label>
                                                        <p> <input type="file" name="userfile" value="Upload"  style="float: left;width: 92%"></p>
						</fieldset>
    <fieldset>
        <label>Instructions</label><br>
        <p style="margin-left: 1%">To Upload a file of size more than <b>2M</b>, You need change your  Apache php.ini file</p>
        <p style="margin-left: 1%">In Debian/Ubuntu based systems probably you can find <b>/etc/php5/apache/php.inf</b></p>
        <p style="margin-left: 1%"><em>Example:</em></p>
        <ul>
            <li>post_max_size = 750M</li>
            <li>upload_max_filesize = 750M</li>
            <li>max_execution_time = 5000</li>
            <li>max_input_time = 5000</li>
            <li>memory_limit = 1000M</li>
        </ul>
        <p style="margin-left: 1%">Then restart your <b>apache server</b> by typing <b>sudo service apache2 restart</b>
    </fieldset>
    
   		                                      
    <fieldset>
        <label>Choose a Payload</label><label style="float:right;margin-right: 2%">Description</label><br/>
        <p><input  type="radio" value="windows/shell_reverse_tcp" name="c" > Windows Shell Reverse_TCP<v style=" float: right;margin-right:  4%"> Spawn a command shell on victim and send back to attacker</v> </p>
       
        <p><input type="radio" value="windows/meterpreter/reverse_tcp" name="c" checked="true"> Windows Reverse_TCP Meterpreter <v style=" float: right;margin-right:  4%">  Spawn a meterpreter shell on victim and send back to attacker
</v> </p>

        <p><input type="radio" value="windows/shell_bind_tcp" name="c">  Windows Bind Shell <v style=" float: right;margin-right:  4%"> Execute payload and create an accepting port on remote system
</v>   </p>
        <p><input  type="radio" value=" windows/vncinject/reverse_tcp" name="c" > Windows Reverse_TCP VNC DLL <v style=" float: right;margin-right:  4%"> Spawn a VNC server on victim and send back to attacker
        </v></p>
       
        <p><input type="radio" value="windows/meterpreter/reverse_tcp_allports" name="c">  Windows Meterpreter All Ports <v style=" float: right;margin-right:  4%"> Spawn a meterpreter shell and find a port home (every port)
 </v> </p>

        <p><input type="radio" value="windows/meterpreter/reverse_https" name="c">Windows Meterpreter Reverse HTTPS <v style=" float: right;margin-right:  4%">  Tunnel communication over HTTP using SSL and use Meterpreter
</v>   </p>
    <p><input  type="radio" value="windows/meterpreter/reverse_tcp_dns" name="c" >  Windows Meterpreter Reverse DNS <v style=" float: right;margin-right:  4%">  Use a hostname instead of an IP address and spawn Meterpreter

        </v></p>
  </fieldset>
						
		
						<div class="clear"></div>
				</div>
			<footer>
				<div class="submit_link">
					
                                    <input type="submit" name="submit" value="Start Now" class="alt_btn" id="submit">
                                    <input type="reset" value="Reset" id="reset"></a>
				</div>
			</footer>
</form>
		</article><!-- end of post new article -->
  		<div class="spacer"></div>
	</section>
</body>
</html>
