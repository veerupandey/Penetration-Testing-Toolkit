Penetration Testing Toolkit
=======================
A Web Interface for  ethical hacking tools 

Developed by Rakesh Pandey,rakeshpandey@karunya.edu.in

https://github.com/veerupandey/Penetration-Testing-Toolkit

Released under GPL see LICENSE for more information


Installing    
=======================

    git clone https://github.com/veerupandey/Penetration-Testing-Toolkit.git

Option 1(install.sh):
----------------------
	cd Penetration-Testing-Toolkit-master
	
	chmod +x the install.sh
	
	./install.sh .

most of the dependencies will be installed but to use some modules(URL FUZZER and to Check if domain uses load balancing) you may  need to install 
'lbd' and 'uniscan' manually.

If you want you can add kali linux official repos (/etc/sources.list) in your Ubuntu (/etc/sources.list) just to install all the dependencies

Option 2(Manually):
--------------------

1.Unzip the downloaded zip file 

2.Go to the the directory where you extracted your file

   	cd Penetration Testing Toolkit-master
	
3.Add user 'www-data' into /etc/sudoers file
 
   	echo "www-data ALL=(ALL:ALL) NOPASSWD:ALL">>/etc/sudoers

4a.Add the Backbox and Backtrack repositories if you are running Ubuntu

4b.If you are running kali linux,You don't need to add any repositories,but if you want you can add backbox linux repos

   Install automater in kali :

	wget https://launchpad.net/~backbox/+archive/three/+files/automater_1.2.1-0backbox1_all.deb

	dpkg -i automater_1.2.1-0backbox1_all.deb

5.Install apache2 and php

	apt-get install apache2 php5 libapache2-mod-php5

6.Copy 'lab' folder to your web root (/var/www)
	
	cp -r lab /var/www

7.Install the dependencies listed below by using apt-get or manually   
    

Dependencies
=======================
nmap, mingw32,siege, metasploit(msf), nikto, whatweb, sslyze, wapiti, amap, xprobe, dmitry, wpscan, joomscan, blindelephant, dnstracer, curl, lynx, mtr, fping, urlcrazy, automater, shellinabox, nbtscan,uniscan,lbd

How To Use	
=======================
open http://yourip/lab in your web browser


Features	
=======================

* Includes web interface for different tools for web scanning like nmap,uniscan,lbd,wapiti,nikto,whatweb,sslyze etc
* Generates metasploit payload for almost all operating systems (windows,linux,Apple osx,Android)
* Generate backdoors for debian packages,exe files and pdf
* Includes web interface for theharvester
* Google hacking
* Collect various types of datas from a URL
* Includes cms-explorer i.e..scan wordpress,joomla,drpal,blindelephant scan etc
* Includes DNS-related tools,IP tools,ping test,link extractor and     checker,traceroute etc
* Domain tools such as domain availability checker,page rank checker,domain age checker,alexa rank,whois lookup etc
* Includes web interface for urlcrazy to generate and test domain typos
* And much more.....

