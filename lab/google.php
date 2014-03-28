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
			<header><h3>Google Hacking</h3></header>
				<div class="module_content">
                                    <script type="text/javascript">
                                    function do_google_search(type) 
                        {
                            if(document.getElementById('p1').value.length == 0) {
                                alert_element('p1', 'This field must not be empty');
                                return;
                            }
                            site = document.getElementById('p1').value;
                            url = 'https://www.google.com/search?q=';
                            url += 'site:' + site;
                            switch(type)
                            {
                                case 1:
                                    url += '+intitle:index.of';
                                    break;
                                case 2:
                                    url += '+ext:xml+|+ext:conf+|+ext:cnf+|+ext:reg+|+ext:inf+|+ext:rdp+|+ext:cfg+|+ext:txt+|+ext:ora+|+ext:ini';
                                    break;
                                case 3:
                                    url += '+ext:sql+|+ext:dbf+|+ext:mdb';
                                    break;
                                case 4:
                                    url += '+ext:log';
                                    break;
                                case 5:
                                    url += '+ext:bkf+|+ext:bkp+|+ext:bak+|+ext:old+|+ext:backup';
                                    break;
                                case 6:
                                    url += '+inurl:login';
                                    break;
                                case 7:
                                    url += '+intext:"sql+syntax+near"+|+intext:"syntax+error+has+occured"+|+intext:"incorrect+syntax+near"+|+intext:"unexpected+end+of+SQL+command"+|+intext:"Warning:+mysql_connect()"+|+intext:"Warning:+mysql_query()"+|+intext:"Warning:+pg_connect()"';
                                    break;
                                case 8:
                                    url += '+ext:doc+|+ext:docx+|+ext:odt+|+ext:pdf+|+ext:rtf+|+ext:sxw+|+ext:psw+|+ext:ppt+|+ext:pptx+|+ext:pps+|+ext:cvs';
                                    break;
                                case 9:
                                    url += '+ext:php+intitle:phpinfo+"published+by+the+PHP+Group"';
                                    break;
                            }
                            window.open(url,'',                         'scrollbars=yes,menubar=no,height=600,width=800,resizable=yes,toolbar=yes,menubar=no,location=no,status=no');

                           
                        }
                    </script>
                    <fieldset>
                        <label>Target website / domain:</label>
                        <p><input id="p1" name="target domain" value="" type="text"></p>
                    </fieldset>
                    <fieldset>
                        <p style="margin-left: 4cm">Search for directory listing vulnerabilities:
                            <a href="" onclick="do_google_search(1)"><v style="float:right;margin-right:8cm">Google Search</v></a>
                        </p>
                    
                    
                        <p style="margin-left: 4cm">Search for configuration files:
                       
                            <a href="" onclick="do_google_search(2)"><v style="float:right;margin-right:8cm">Google Search</v></a>
                        </p>
                    
                        
                        <p style="margin-left: 4cm"> Search for database files:
                        
                            <a href="" onclick="do_google_search(3)"><v style="float:right;margin-right:8cm">Google Search</v></a>
                            </p>
                   
                            <p  style="margin-left: 4cm">Search for log files:
                        
                            <a  href=""  onclick="do_google_search(4)"><v style="float:right;margin-right:8cm">Google Search</v></a>
                        
                    </p>
                   <p style="margin-left: 4cm"> Search for backup and old files:
                        
                            <a href="" onclick="do_google_search(5)"><v style="float:right;margin-right:8cm">Google Search</v></a>
                       </p>
                       <p style="margin-left: 4cm">Search for login pages:
                        
                            <a href="" onclick="do_google_search(6)"><v style="float:right;margin-right:8cm">Google Search</v></a>
                       </p>
                       
                       <p style="margin-left: 4cm">Search for SQL errors:
                        
                            <a href="" onclick="do_google_search(7)"><v style="float:right;margin-right:8cm">Google Search</v></a>
                       </p>
                       <p style="margin-left: 4cm">Search for publicly exposed documents:
                        
                            <a href="" onclick="do_google_search(8)"><v style="float:right;margin-right:8cm">Google Search</v></a>
                        </p>
                        <p style="margin-left: 4cm">Search for phpinfo():
                        
                            <a href="" onclick="do_google_search(9)"><v style="float:right;margin-right:8cm">Google Search</v></a>
                        </p>
                  
                    </fieldset>
                    
       
    
        
   
						
		
						<div class="clear"></div>
				</div>
			<footer>
				<div class="submit_link">
                                    
				</div>
			</footer>
		</article><!-- end of post new article -->
                
              

 
		<article class="module width_full">
			<header><h3>Tool Description</h3></header>
				<div class="module_content">
					
					
                                    <p>  A collection of Google dorks  very useful to gather information about your target </p>
                                    <p><b>Note:</b>Your Browser must allow pop up</p>
                                    <p> Google searches to find various information about the target, like:
                                    <ul>
                                        <li> Search for configuration weaknesses (e.g. directory listing)</li>
                                        <li>Search for configuration files, database files or log files</li>
                                    <li>Search for login pages in target website</li>
                                    <li>Search for error messages indexed by Google</li>
                                    <li>Search for public documents exposed by the target</li>

                                    </ul>                   
		</article><!-- end of styles article -->
                

		<div class="spacer"></div>
	</section>
</body>
</html>
