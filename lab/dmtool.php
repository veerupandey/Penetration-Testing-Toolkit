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
<html>
    <body onLoad="init()"> 
<section id="main" class="column">
		
		<h4 class="alert_info">Welcome to the Web Based Penetration Testing Toolkit.</h4>
		
		
		
		
		<div class="clear"></div>
		
		<article class="module width_full">
			<header><h3>Domain Tools</h3></header>
				<div class="module_content">
<form name="form1" action="" method="post">
  <fieldset>
  <legend>Target:</legend>
        <label for="ur">URL:</label><input id="ur" type="text" name="url" value="" />
</fieldset>			
    <fieldset>          
        <legend>Scan Options</legend>
        <p> <input type="checkbox" name="c1" >Domain Availaility Checker</p>
        <p> <input type="checkbox" name="c2" checked="true">Page Rank Checker</p>
        <p> <input type="checkbox" name="c3" >Domain Age Checker</p> 
        <p><input type="checkbox" name="c4"> Get Alexa Rank</p>
        <p> <input type="checkbox" name="c5">Find Sub Domains</p>
          <p> <input type="checkbox" name="c6">Generate and Test Domain Typos</p>
               <p> <input type="checkbox" name="c7">Who Is Lookup</p>
        <p><input type="checkbox" name="c8"> Investigate domain with the common web based tools(Automator)</p>
          </fieldset>	
   
   
						<div class="clear"></div>
				</div>
			<footer>
				<div class="submit_link">
					
                                    <input type="submit" name="submit" value="Start Scanning Now" class="alt_btn" id="submit">
                                    <input type="reset" value="Reset" id="reset"></a>
				</div>
			</footer>
		</article><!-- end of post new article -->
                
						

						
                
               <?php
               
                if(isset($_POST['submit']))
                {
                    $url=$_POST['url'];
                    $c1=$_POST['c1'];
 						  $c2=$_POST['c2'];
                    $c3=$_POST['c3'];
                    $c4=$_POST['c4'];
                    $c5=$_POST['c5'];
                    $c6=$_POST['c6'];
                    $c7=$_POST['c7'];
                    $c8=$_POST['c8'];
                   
                    
          require_once 'loading.php';     
            if($url==''){
                    echo "<script type='text/javascript'>$.msg({fadeIn : 500,fadeOut : 500,bgPath : 'dlgs/',  content : 'You Have not entered any URL.Please enter an URL to continue..'});</script>";
                  die("!!!!You Have Not Entered any URL!!!!");
               }
            
            if(isset($c1)||isset($c2)||isset($c3)||isset($c4)||isset($c5)||isset($c6)||isset($c7)||isset($c8))
            {
                 
           if(isset($c1)){
         
                                echo "<p><b>Checking domain availability for $url </b></p> ";
                   if(checkdnsrr($url,'ANY')){
                 echo "<p>Domain <b><font  color='red' >$url</font></b> is <font size='5' color='orange'>taken</font></p>";
                                 }else{
                     
                     echo "<p>Domain <b><font  color='red' >$url</font></b> is <font size='5' color='green'>Available</font></p>";
 
                 }
                 echo "<p>Have a look on availability of these domains....</p>";
                $domain = trim($url); //remove space from start and end of domain
                if(substr(strtolower($domain), 0, 7) == "http://") $domain = substr($domain, 7); // remove http:// if included
                if(substr(strtolower($domain), 0, 8) == "https://") $domain = substr($domain, 8); // remove http:// if included
                if(substr(strtolower($domain), 0, 4) == "www.") $domain = substr($domain, 4);//remove www from domain
                if(preg_match("/^([-a-z0-9]{2,100})\.([a-z\.]{2,8})$/i",$domain))
                   {
                     $domain_parts = explode(".", $domain);
                     $name = $domain_parts[0];
                    
                   }
                   $tld=array('as','be','cc','co.uk','cx','dj','eu','info','jp','lt','me','name','nl','org','pl','ru','sk','tv','at','biz','ch','com','cz','dk','hu','je','li','lv','mobi','net','nu','org.uk','ro','se','to','se','to','us');
                  $len=count($tld);
                 
                  foreach ($tld as $i)
                  {
                     
                       $dm=$name.'.'.$i;
                     
                      if(checkdnsrr($dm,'ANY'))
                      {
                        echo "<p><font color='red'>Taken......</font><b>$dm</b></p>";  
                      }
                     else {
                         echo "<p><font color='green'>Available........</font><b>$dm</b></p>";  
                        }
                  }
}
                   if(isset($c2))
                           {
                  
  class PR {
 public function get_google_pagerank($url) {
 $query="http://toolbarqueries.google.com/tbr?client=navclient-auto&ch=".$this->CheckHash($this->HashURL($url)). "&features=Rank&q=info:".$url."&num=100&filter=0";
 $data=file_get_contents($query);
 $pos = strpos($data, "Rank_");
 if($pos === false){} else{
 $pagerank = substr($data, $pos + 9);
 return $pagerank;
 }
 }
 public function StrToNum($Str, $Check, $Magic)
 {
 $Int32Unit = 4294967296; // 2^32
 $length = strlen($Str);
 for ($i = 0; $i < $length; $i++) {
 $Check *= $Magic;
 if ($Check >= $Int32Unit) {
 $Check = ($Check - $Int32Unit * (int) ($Check / $Int32Unit));
 $Check = ($Check < -2147483648) ? ($Check + $Int32Unit) : $Check;
 }
 $Check += ord($Str{$i});
 }
 return $Check;
 }
 public function HashURL($String)
 {
 $Check1 = $this->StrToNum($String, 0x1505, 0x21);
 $Check2 = $this->StrToNum($String, 0, 0x1003F);
 $Check1 >>= 2;
 $Check1 = (($Check1 >> 4) & 0x3FFFFC0 ) | ($Check1 & 0x3F);
 $Check1 = (($Check1 >> 4) & 0x3FFC00 ) | ($Check1 & 0x3FF);
 $Check1 = (($Check1 >> 4) & 0x3C000 ) | ($Check1 & 0x3FFF);
 $T1 = (((($Check1 & 0x3C0) << 4) | ($Check1 & 0x3C)) <<2 ) | ($Check2 & 0xF0F );
 $T2 = (((($Check1 & 0xFFFFC000) << 4) | ($Check1 & 0x3C00)) << 0xA) | ($Check2 & 0xF0F0000 );
 return ($T1 | $T2);
 }
 public function CheckHash($Hashnum)
 {
 $CheckByte = 0;
 $Flag = 0;
 $HashStr = sprintf('%u', $Hashnum) ;
 $length = strlen($HashStr);
 for ($i = $length - 1; $i >= 0; $i --) {
 $Re = $HashStr{$i};
 if (1 === ($Flag % 2)) {
 $Re += $Re;
 $Re = (int)($Re / 10) + ($Re % 10);
 }
 $CheckByte += $Re;
 $Flag ++;
 }
 $CheckByte %= 10;
 if (0 !== $CheckByte) {
 $CheckByte = 10 - $CheckByte;
 if (1 === ($Flag % 2) ) {
 if (1 === ($CheckByte % 2)) {
 $CheckByte += 9;
 }
 $CheckByte >>= 1;
 }
 }
 return '7'.$CheckByte.$HashStr;
 }
}
                 $pr = new PR();
                echo "$url has Google PageRank: ". "<b><font size='15' color='red'>".$pr->get_google_pagerank($url)."</font></b>" ; 
                 }

if(isset($c3)){
                echo "<p><b>Checking Domain $url Age</b></p>";
                  class DomainAge{
  private $WHOIS_SERVERS=array(
  "com"               =>  array("whois.verisign-grs.com","/Creation Date:(.*)/"),
  "net"               =>  array("whois.verisign-grs.com","/Creation Date:(.*)/"),
  "org"               =>  array("whois.pir.org","/Created On:(.*)/"),
  "info"              =>  array("whois.afilias.info","/Created On:(.*)/"),
  "biz"               =>  array("whois.neulevel.biz","/Domain Registration Date:(.*)/"),
  "us"                =>  array("whois.nic.us","/Domain Registration Date:(.*)/"),
  "uk"                =>  array("whois.nic.uk","/Registered on:(.*)/"),
  "ca"                =>  array("whois.cira.ca","/Creation date:(.*)/"),
  "tel"               =>  array("whois.nic.tel","/Domain Registration Date:(.*)/"),
  "ie"                =>  array("whois.iedr.ie","/registration:(.*)/"),
  "it"                =>  array("whois.nic.it","/Created:(.*)/"),
  "cc"                =>  array("whois.nic.cc","/Creation Date:(.*)/"),
  "ws"                =>  array("whois.nic.ws","/Domain Created:(.*)/"),
  "sc"                =>  array("whois2.afilias-grs.net","/Created On:(.*)/"),
  "mobi"              =>  array("whois.dotmobiregistry.net","/Created On:(.*)/"),
  "pro"               =>  array("whois.registrypro.pro","/Created On:(.*)/"),
  "edu"               =>  array("whois.educause.net","/Domain record activated:(.*)/"),
  "tv"                =>  array("whois.nic.tv","/Creation Date:(.*)/"),
  "travel"            =>  array("whois.nic.travel","/Domain Registration Date:(.*)/"),
  "in"                =>  array("whois.inregistry.net","/Created On:(.*)/"),
  "me"                =>  array("whois.nic.me","/Domain Create Date:(.*)/"),
  "cn"                =>  array("whois.cnnic.cn","/Registration Date:(.*)/"),
  "asia"              =>  array("whois.nic.asia","/Domain Create Date:(.*)/"),
  "ro"                =>  array("whois.rotld.ro","/Registered On:(.*)/"),
  "aero"              =>  array("whois.aero","/Created On:(.*)/"),
  "nu"                =>  array("whois.nic.nu","/created:(.*)/")
  );
  public function age($domain)
  {
  $domain = trim($domain); //remove space from start and end of domain
  if(substr(strtolower($domain), 0, 7) == "http://") $domain = substr($domain, 7); // remove http:// if included
  if(substr(strtolower($domain), 0, 4) == "www.") $domain = substr($domain, 4);//remove www from domain
  if(preg_match("/^([-a-z0-9]{2,100})\.([a-z\.]{2,8})$/i",$domain))
  {
  $domain_parts = explode(".", $domain);
  $tld = strtolower(array_pop($domain_parts));
  if(!$server=$this->WHOIS_SERVERS[$tld][0]) {
  return false;
  }
  $res=$this->queryWhois($server,$domain);
  if(preg_match($this->WHOIS_SERVERS[$tld][1],$res,$match))
  {
  date_default_timezone_set('UTC');
  $time = time() - strtotime($match[1]);
  $years = floor($time / 31556926);
  $days = floor(($time % 31556926) / 86400);
  if($years == "1") {$y= "1 year";}
  else {$y = $years . " years";}
  if($days == "1") {$d = "1 day";}
  else {$d = $days . " days";}
  return "$y, $d";
  }
  else
  return false;
  }
  else
  return false;
  }
  private function queryWhois($server,$domain)
  {
  $fp = @fsockopen($server, 43, $errno, $errstr, 20) or die("Socket Error " . $errno . " - " . $errstr);
if($server=="whois.verisign-grs.com")
$domain="=".$domain;
  fputs($fp, $domain . "\r\n");
  $out = "";
  while(!feof($fp)){
  $out .= fgets($fp);
  }
  fclose($fp);
  return $out;
  }
}

$w=new DomainAge();
echo "<p><b><font size='4' color='green' >".$w->age("$url")."</font></b></p>";
                  
 }


 if(isset($c4)){
                  echo "<p><b>Getting Alexa Rank for $url</b></p>";
             

$xml = simplexml_load_file('http://data.alexa.com/data?cli=10&dat=snbamz&url='.$url);
$rank=isset($xml->SD[1]->POPULARITY)?$xml->SD[1]->POPULARITY->attributes()->TEXT:0;
$web=(string)$xml->SD[0]->attributes()->HOST;
echo "<b><font color='red'></b>".$web."</font></b>"." has Alexa Rank "."<b><font size='6' color='green'>".$rank."</font></b>";
echo "<p><b>Getting Backlinks for $url</b></p>";
$backlink=(int)$xml->SD[0]->LINKSIN->attributes()->NUM;
echo "<b><font color='red'></b>".$web."</font></b>"." has Alexa Backlinks "."<b><font size='6' color='green'>".$backlink."</font></b>";

}
             
 if(isset($c5)){
                  echo "<p><b>Finding Subdomains of  $url</b></p>";
                  shell("");
                 
shell("dmitry -s $url");
}


  if(isset($c6)){

$domain = $url;

// For the full list of TLDs/Whois servers see http://www.iana.org/domains/root/db/ and http://www.whois365.com/en/listtld/
$whoisservers = array(
	"ac" => "whois.nic.ac", // Ascension Island
	// ad - Andorra - no whois server assigned
	"ae" => "whois.nic.ae", // United Arab Emirates
	"aero"=>"whois.aero",
	"af" => "whois.nic.af", // Afghanistan
	"ag" => "whois.nic.ag", // Antigua And Barbuda
	"ai" => "whois.ai", // Anguilla
	"al" => "whois.ripe.net", // Albania
	"am" => "whois.amnic.net",  // Armenia
	// an - Netherlands Antilles - no whois server assigned
	// ao - Angola - no whois server assigned
	// aq - Antarctica (New Zealand) - no whois server assigned
	// ar - Argentina - no whois server assigned
	"arpa" => "whois.iana.org",
	"as" => "whois.nic.as", // American Samoa
	"asia" => "whois.nic.asia",
	"at" => "whois.nic.at", // Austria
	"au" => "whois.aunic.net", // Australia
	// aw - Aruba - no whois server assigned
	"ax" => "whois.ax", // Aland Islands
	"az" => "whois.ripe.net", // Azerbaijan
	// ba - Bosnia And Herzegovina - no whois server assigned
	// bb - Barbados - no whois server assigned
	// bd - Bangladesh - no whois server assigned
	"be" => "whois.dns.be", // Belgium
	"bg" => "whois.register.bg", // Bulgaria
	"bi" => "whois.nic.bi", // Burundi
	"biz" => "whois.biz",
	"bj" => "whois.nic.bj", // Benin
	// bm - Bermuda - no whois server assigned
	"bn" => "whois.bn", // Brunei Darussalam
	"bo" => "whois.nic.bo", // Bolivia
	"br" => "whois.registro.br", // Brazil
	"bt" => "whois.netnames.net", // Bhutan
	// bv - Bouvet Island (Norway) - no whois server assigned
	// bw - Botswana - no whois server assigned
	"by" => "whois.cctld.by", // Belarus
	"bz" => "whois.belizenic.bz", // Belize
	"ca" => "whois.cira.ca", // Canada
	"cat" => "whois.cat", // Spain
	"cc" => "whois.nic.cc", // Cocos (Keeling) Islands
	"cd" => "whois.nic.cd", // Congo, The Democratic Republic Of The
	// cf - Central African Republic - no whois server assigned
	"ch" => "whois.nic.ch", // Switzerland
	"ci" => "whois.nic.ci", // Cote d'Ivoire
	"ck" => "whois.nic.ck", // Cook Islands
	"cl" => "whois.nic.cl", // Chile
	// cm - Cameroon - no whois server assigned
	"cn" => "whois.cnnic.net.cn", // China
	"co" => "whois.nic.co", // Colombia
	"com" => "whois.verisign-grs.com",
	"coop" => "whois.nic.coop",
	// cr - Costa Rica - no whois server assigned
	// cu - Cuba - no whois server assigned
	// cv - Cape Verde - no whois server assigned
	// cw - Curacao - no whois server assigned
	"cx" => "whois.nic.cx", // Christmas Island
	// cy - Cyprus - no whois server assigned
	"cz" => "whois.nic.cz", // Czech Republic
	"de" => "whois.denic.de", // Germany
	// dj - Djibouti - no whois server assigned
	"dk" => "whois.dk-hostmaster.dk", // Denmark
	"dm" => "whois.nic.dm", // Dominica
	// do - Dominican Republic - no whois server assigned
	"dz" => "whois.nic.dz", // Algeria
	"ec" => "whois.nic.ec", // Ecuador
	"edu" => "whois.educause.edu",
	"ee" => "whois.eenet.ee", // Estonia
	"eg" => "whois.ripe.net", // Egypt
	// er - Eritrea - no whois server assigned
	"es" => "whois.nic.es", // Spain
	// et - Ethiopia - no whois server assigned
	"eu" => "whois.eu",
	"fi" => "whois.ficora.fi", // Finland
	// fj - Fiji - no whois server assigned
	// fk - Falkland Islands - no whois server assigned
	// fm - Micronesia, Federated States Of - no whois server assigned
	"fo" => "whois.nic.fo", // Faroe Islands
	"fr" => "whois.nic.fr", // France
	// ga - Gabon - no whois server assigned
	"gd" => "whois.nic.gd", // Grenada
	// ge - Georgia - no whois server assigned
	// gf - French Guiana - no whois server assigned
	"gg" => "whois.gg", // Guernsey
	// gh - Ghana - no whois server assigned
	"gi" => "whois2.afilias-grs.net", // Gibraltar
	"gl" => "whois.nic.gl", // Greenland (Denmark)
	// gm - Gambia - no whois server assigned
	// gn - Guinea - no whois server assigned
	"gov" => "whois.nic.gov",
	// gr - Greece - no whois server assigned
	// gt - Guatemala - no whois server assigned
	"gs" => "whois.nic.gs", // South Georgia And The South Sandwich Islands
	// gu - Guam - no whois server assigned
	// gw - Guinea-bissau - no whois server assigned
	"gy" => "whois.registry.gy", // Guyana
	"hk" => "whois.hkirc.hk", // Hong Kong
	// hm - Heard and McDonald Islands (Australia) - no whois server assigned
	"hn" => "whois.nic.hn", // Honduras
	"hr" => "whois.dns.hr", // Croatia
	"ht" => "whois.nic.ht", // Haiti
	"hu" => "whois.nic.hu", // Hungary
	// id - Indonesia - no whois server assigned
	"ie" => "whois.domainregistry.ie", // Ireland
	"il" => "whois.isoc.org.il", // Israel
	"im" => "whois.nic.im", // Isle of Man
	"in" => "whois.inregistry.net", // India
	"info" => "whois.afilias.net",
	"int" => "whois.iana.org",
	"io" => "whois.nic.io", // British Indian Ocean Territory
	"iq" => "whois.cmc.iq", // Iraq
	"ir" => "whois.nic.ir", // Iran, Islamic Republic Of
	"is" => "whois.isnic.is", // Iceland
	"it" => "whois.nic.it", // Italy
	"je" => "whois.je", // Jersey
	// jm - Jamaica - no whois server assigned
	// jo - Jordan - no whois server assigned
	"jobs" => "jobswhois.verisign-grs.com",
	"jp" => "whois.jprs.jp", // Japan
	"ke" => "whois.kenic.or.ke", // Kenya
	"kg" => "www.domain.kg", // Kyrgyzstan
	// kh - Cambodia - no whois server assigned
	"ki" => "whois.nic.ki", // Kiribati
	// km - Comoros - no whois server assigned
	// kn - Saint Kitts And Nevis - no whois server assigned
	// kp - Korea, Democratic People's Republic Of - no whois server assigned
	"kr" => "whois.kr", // Korea, Republic Of
	// kw - Kuwait - no whois server assigned
	// ky - Cayman Islands - no whois server assigned
	"kz" => "whois.nic.kz", // Kazakhstan
	"la" => "whois.nic.la", // Lao People's Democratic Republic
	// lb - Lebanon - no whois server assigned
	// lc - Saint Lucia - no whois server assigned
	"li" => "whois.nic.li", // Liechtenstein
	// lk - Sri Lanka - no whois server assigned
	"lt" => "whois.domreg.lt", // Lithuania
	"lu" => "whois.dns.lu", // Luxembourg
	"lv" => "whois.nic.lv", // Latvia
	"ly" => "whois.nic.ly", // Libya
	"ma" => "whois.iam.net.ma", // Morocco
	// mc - Monaco - no whois server assigned
	"md" => "whois.nic.md", // Moldova
	"me" => "whois.nic.me", // Montenegro
	"mg" => "whois.nic.mg", // Madagascar
	// mh - Marshall Islands - no whois server assigned
	"mil" => "whois.nic.mil",
	// mk - Macedonia, The Former Yugoslav Republic Of - no whois server assigned
	"ml" => "whois.dot.ml", // Mali
	// mm - Myanmar - no whois server assigned
	"mn" => "whois.nic.mn", // Mongolia
	"mo" => "whois.monic.mo", // Macao
	"mobi" => "whois.dotmobiregistry.net",
	"mp" => "whois.nic.mp", // Northern Mariana Islands
	// mq - Martinique (France) - no whois server assigned
	// mr - Mauritania - no whois server assigned
	"ms" => "whois.nic.ms", // Montserrat
	// mt - Malta - no whois server assigned
	"mu" => "whois.nic.mu", // Mauritius
	"museum" => "whois.museum",
	// mv - Maldives - no whois server assigned
	// mw - Malawi - no whois server assigned
	"mx" => "whois.mx", // Mexico
	"my" => "whois.domainregistry.my", // Malaysia
	// mz - Mozambique - no whois server assigned
	"na" => "whois.na-nic.com.na", // Namibia
	"name" => "whois.nic.name",
	"nc" => "whois.nc", // New Caledonia
	// ne - Niger - no whois server assigned
	"net" => "whois.verisign-grs.net",
	"nf" => "whois.nic.nf", // Norfolk Island
	"ng" => "whois.nic.net.ng", // Nigeria
	// ni - Nicaragua - no whois server assigned
	"nl" => "whois.domain-registry.nl", // Netherlands
	"no" => "whois.norid.no", // Norway
	// np - Nepal - no whois server assigned
	// nr - Nauru - no whois server assigned
	"nu" => "whois.nic.nu", // Niue
	"nz" => "whois.srs.net.nz", // New Zealand
	"om" => "whois.registry.om", // Oman
	"org" => "whois.pir.org",
	// pa - Panama - no whois server assigned
	"pe" => "kero.yachay.pe", // Peru
	"pf" => "whois.registry.pf", // French Polynesia
	// pg - Papua New Guinea - no whois server assigned
	// ph - Philippines - no whois server assigned
	// pk - Pakistan - no whois server assigned
	"pl" => "whois.dns.pl", // Poland
	"pm" => "whois.nic.pm", // Saint Pierre and Miquelon (France)
	// pn - Pitcairn (New Zealand) - no whois server assigned
	"post" => "whois.dotpostregistry.net",
	"pr" => "whois.nic.pr", // Puerto Rico
	"pro" => "whois.dotproregistry.net",
	// ps - Palestine, State of - no whois server assigned
	"pt" => "whois.dns.pt", // Portugal
	"pw" => "whois.nic.pw", // Palau
	// py - Paraguay - no whois server assigned
	"qa" => "whois.registry.qa", // Qatar
	"re" => "whois.nic.re", // Reunion (France)
	"ro" => "whois.rotld.ro", // Romania
	"rs" => "whois.rnids.rs", // Serbia
	"ru" => "whois.tcinet.ru", // Russian Federation
	// rw - Rwanda - no whois server assigned
	"sa" => "whois.nic.net.sa", // Saudi Arabia
	"sb" => "whois.nic.net.sb", // Solomon Islands
	"sc" => "whois2.afilias-grs.net", // Seychelles
	// sd - Sudan - no whois server assigned
	"se" => "whois.iis.se", // Sweden
	"sg" => "whois.sgnic.sg", // Singapore
	"sh" => "whois.nic.sh", // Saint Helena
	"si" => "whois.arnes.si", // Slovenia
	"sk" => "whois.sk-nic.sk", // Slovakia
	// sl - Sierra Leone - no whois server assigned
	"sm" => "whois.nic.sm", // San Marino
	"sn" => "whois.nic.sn", // Senegal
	"so" => "whois.nic.so", // Somalia
	// sr - Suriname - no whois server assigned
	"st" => "whois.nic.st", // Sao Tome And Principe
	"su" => "whois.tcinet.ru", // Russian Federation
	// sv - El Salvador - no whois server assigned
	"sx" => "whois.sx", // Sint Maarten (dutch Part)
	"sy" => "whois.tld.sy", // Syrian Arab Republic
	// sz - Swaziland - no whois server assigned
	"tc" => "whois.meridiantld.net", // Turks And Caicos Islands
	// td - Chad - no whois server assigned
	"tel" => "whois.nic.tel",
	"tf" => "whois.nic.tf", // French Southern Territories
	// tg - Togo - no whois server assigned
	"th" => "whois.thnic.co.th", // Thailand
	"tj" => "whois.nic.tj", // Tajikistan
	"tk" => "whois.dot.tk", // Tokelau
	"tl" => "whois.nic.tl", // Timor-leste
	"tm" => "whois.nic.tm", // Turkmenistan
	"tn" => "whois.ati.tn", // Tunisia
	"to" => "whois.tonic.to", // Tonga
	"tp" => "whois.nic.tl", // Timor-leste
	"tr" => "whois.nic.tr", // Turkey
	"travel" => "whois.nic.travel",
	// tt - Trinidad And Tobago - no whois server assigned
	"tv" => "tvwhois.verisign-grs.com", // Tuvalu
	"tw" => "whois.twnic.net.tw", // Taiwan
	"tz" => "whois.tznic.or.tz", // Tanzania, United Republic Of
	"ua" => "whois.ua", // Ukraine
	"ug" => "whois.co.ug", // Uganda
	"uk" => "whois.nic.uk", // United Kingdom
	"us" => "whois.nic.us", // United States
	"uy" => "whois.nic.org.uy", // Uruguay
	"uz" => "whois.cctld.uz", // Uzbekistan
	// va - Holy See (vatican City State) - no whois server assigned
	"vc" => "whois2.afilias-grs.net", // Saint Vincent And The Grenadines
	"ve" => "whois.nic.ve", // Venezuela
	"vg" => "whois.adamsnames.tc", // Virgin Islands, British
	// vi - Virgin Islands, US - no whois server assigned
	// vn - Viet Nam - no whois server assigned
	// vu - Vanuatu - no whois server assigned
	"wf" => "whois.nic.wf", // Wallis and Futuna
	"ws" => "whois.website.ws", // Samoa
	"xxx" => "whois.nic.xxx",
	// ye - Yemen - no whois server assigned
	"yt" => "whois.nic.yt", // Mayotte
	"yu" => "whois.ripe.net");

function LookupDomain($domain){
	global $whoisservers;
	$domain_parts = explode(".", $domain);
	$tld = strtolower(array_pop($domain_parts));
	$whoisserver = $whoisservers[$tld];
	if(!$whoisserver) {
		return "Error: No appropriate Whois server found for $domain domain!";
	}
	$result = QueryWhoisServer($whoisserver, $domain);
	if(!$result) {
		return "Error: No results retrieved from $whoisserver server for $domain domain!";
	}
	else {
		while(strpos($result, "Whois Server:") !== FALSE){
			preg_match("/Whois Server: (.*)/", $result, $matches);
			$secondary = $matches[1];
			if($secondary) {
				$result = QueryWhoisServer($secondary, $domain);
				$whoisserver = $secondary;
			}
		}
	}
	return "$domain domain lookup results from $whoisserver server:\n\n" . $result;
}

function LookupIP($ip) {
	$whoisservers = array(
		//"whois.afrinic.net", // Africa - returns timeout error :-(
		"whois.lacnic.net", // Latin America and Caribbean - returns data for ALL locations worldwide :-)
		"whois.apnic.net", // Asia/Pacific only
		"whois.arin.net", // North America only
		"whois.ripe.net" // Europe, Middle East and Central Asia only
	);
	$results = array();
	foreach($whoisservers as $whoisserver) {
		$result = QueryWhoisServer($whoisserver, $ip);
		if($result && !in_array($result, $results)) {
			$results[$whoisserver]= $result;
		}
	}
	$res = "RESULTS FOUND: " . count($results);
	foreach($results as $whoisserver=>$result) {
		$res .= "\n\n-------------\nLookup results for " . $ip . " from " . $whoisserver . " server:\n\n" . $result;
	}
	return $res;
}

function ValidateIP($ip) {
	$ipnums = explode(".", $ip);
	if(count($ipnums) != 4) {
		return false;
	}
	foreach($ipnums as $ipnum) {
		if(!is_numeric($ipnum) || ($ipnum > 255)) {
			return false;
		}
	}
	return $ip;
}

function ValidateDomain($domain) {
	if(!preg_match("/^([-a-z0-9]{2,100})\.([a-z\.]{2,8})$/i", $domain)) {
		return false;
	}
	return $domain;
}

function QueryWhoisServer($whoisserver, $domain) {
	$port = 43;
	$timeout = 10;
	$fp = @fsockopen($whoisserver, $port, $errno, $errstr, $timeout) or die("Socket Error " . $errno . " - " . $errstr);
	//if($whoisserver == "whois.verisign-grs.com") $domain = "=".$domain; // whois.verisign-grs.com requires the equals sign ("=") or it returns any result containing the searched string.
	fputs($fp, $domain . "\r\n");
	$out = "";
	while(!feof($fp)){
		$out .= fgets($fp);
	}
	fclose($fp);

	$res = "";
	if((strpos(strtolower($out), "error") === FALSE) && (strpos(strtolower($out), "not allocated") === FALSE)) {
		$rows = explode("\n", $out);
		foreach($rows as $row) {
			$row = trim($row);
			if(($row != '') && ($row{0} != '#') && ($row{0} != '%')) {
				$res .= $row."\n";
			}
		}
	}
	return $res;
}



if($domain) {
	$domain = trim($domain);
	if(substr(strtolower($domain), 0, 7) == "http://") $domain = substr($domain, 7);
	if(substr(strtolower($domain), 0, 4) == "www.") $domain = substr($domain, 4);
	if(ValidateIP($domain)) {
		$result = LookupIP($domain);
	}
	elseif(ValidateDomain($domain)) {
		$result = LookupDomain($domain);
	}
	else die("Invalid Input!");
	echo "<pre>\n" . $result . "\n</pre>\n";
}

}

  if(isset($c7)){
                     $url = trim($url); //remove space from start and end of domain
                if(substr(strtolower($url), 0, 7) == "http://") $url = substr($url, 7); // remove http:// if included
                if(substr(strtolower($url), 0, 8) == "https://") $url = substr($url, 8); // remove http:// if included
                if(substr(strtolower($url), 0, 4) == "www.") $url = substr($url, 4);//remove www from domain
               
               
               $url_parts = explode("/", $url);
                     $url = $url_parts[0];
                     
                  echo "<script type='text/javascript'>$.msg({ fadeIn : 500,fadeOut : 500, bgPath : 'dlgs/',  content : 'Generating Domain Typos!Please refer result section after this message'});</script>";
          echo "<p><b>Generating and Testing Domain Typs</b></p>";
          shell("");
          shell("urlcrazy $url");
            
 }
                 
  if(isset($c8)){
                   $url = trim($url); //remove space from start and end of domain
                if(substr(strtolower($url), 0, 7) == "http://") $url = substr($url, 7); // remove http:// if included
                if(substr(strtolower($url), 0, 8) == "https://") $url = substr($url, 8); // remove http:// if included
                if(substr(strtolower($url), 0, 4) == "www.") $url = substr($url, 4);//remove www from domain
               
               
               $url_parts = explode("/", $url);
                     $url = $url_parts[0];
                  echo "<script type='text/javascript'>$.msg({ fadeIn : 500,fadeOut : 500, bgPath : 'dlgs/',  content : ' investigating IP Addresses and URLs with the common web based tools'});</script>";
          shell("echo 'Investigating IP Addresses and URLs with  common web based tools' ");
      
          shell("sudo automater -t $url|sed -e'1,13d'");
                  }

                 
         echo '</div>
                                    <footer>
				<div align="left">
					
					<h3>Thank You!</h3>
				</div>
			</footer>
		</article><!-- end of styles article -->
                 <h4 class="alert_success">Scan Succeeded </h4>
                
            ';}
 else {
     echo "<script type='text/javascript'>$.msg({fadeIn : 500,fadeOut : 500,bgPath : 'dlgs/',  content : '!!!!You have not selected any option!!!!'});</script>";
                  
                die("!!!!You Have Not Selected any option!!!!");
            }
 }
         
  
                
 ?>
                

		
		<article class="module width_full">
			<header><h3>Tool Description</h3></header>
				<div class="module_content">
                                    <p><b> Domain Availaility Checker </b></p>
                                    <p>Domain Availability Checker is a tool that helps you find available domains that you can register. With a single query you get information about availability of tens of extensions for the specified domain names.</p>   
                                    <p> <b>Page Rank Checker</b> </p>
                                    <p>For entered URL, Page Rank Checker returns a single number from 0 to 10 that summarizes an importance of the given web page for the Google Search engine </p>
                                    <p><b> Domain Age Checker </b></p>
                                    <p>Checks the age of input domain</p>
                                    <p><b>Alexa</b></p>
                                    <p>Alexa is the leading provider of free, global web metrics.Vist <a href="http://www.alexa.com/" target="_blank">Alexa</a>for more information</p>
                                    <p><b>Automater</b></p>
                                    <p>Automator is a IP and URL Passive Analysis tool</p>

                                    <p><b>Urlcrazy</b></p>
                                    Generate and test domain typos and variations to detect and perform
                                    <ul><li> URL hijacking</li><li>phishing</li><li>corporate espionage.</li></ul>

Supports the following domain variations:
<ul><li>Character omission, character repeat, adjacent character swap,
    </li><li>adjacent character replacement, double 
        character replacement, adjacent character insertion</li><li> missing dot, strip dashes, singular or pluralise,
        common misspellings, vowel swaps, homophones</li><li>bit flipping (cosmic rays), homoglyphs, wrong top level 
domain, and wrong second level domain.
</li></ul>
                                </div>
		</article><!-- end of styles article -->
                

		<div class="spacer"></div>
	</section>
</body>
</html>
