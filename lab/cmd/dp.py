#!/home/bin/python
#drupal modules scanner
import os,sys,socket, subprocess

__CMD__={
	#WGET
	"wget":" wget -q -O - ",
	"grep":" | grep modules",
	"output_file":" cat ",
	"help": "DRUPAL Modules Enumerator v0.1beta-- written by Ali Elouafiq 2012"
		"\n<ScriptName> [filename.txt]"
		"\n<ScriptName> [URL]"
		"\n<ScriptName> [URL] user password // FOR HTTP AUTHORIZATION"
	
}
__DEBUG_MODE__="off"
def call(command):
	p=subprocess.Popen([command], shell=True, stdin=subprocess.PIPE, stdout=subprocess.PIPE, stderr=subprocess.PIPE)
	if ( len(p.stdout.readlines()) + len( p.stderr.readlines()) ) > 0 :
		raise CommandFailure(command)
def main():
	#check options
	Modules_List=[]
	command=""
	if len(sys.argv)==1:
		print __CMD__["help"]
	else:
		if len(sys.argv) == 2 :
			url=sys.argv[1]
			if len(url.split(".txt")) > 1:
				command=""+__CMD__["output_file"]+url
			else: command=""+__CMD__["wget"]+url
		if len(sys.argv) == 4 :
			url=sys.argv[1]
			user=sys.argv[2]
			password=sys.argv[3]
			command=""+__CMD__["wget"]+url+" --http-user "+user+" --http-password "+password
	
		#Retrieves the Page
		command=command+__CMD__["grep"]
		#---Command:
		p=subprocess.Popen([command], shell=True, stdin=subprocess.PIPE, stdout=subprocess.PIPE, stderr=subprocess.PIPE)
		if __DEBUG_MODE__=="wget": print p.stdout
		#SCAN the page
		for line in p.stdout:
			line=line.split("modules")
			if len(line)>1 :
				Modules_List.append(line[1].split("/")[1])
		#Retrieve Results
		Modules_List=list(set(Modules_List))
		for module in Modules_List:
			print module

if __name__=="__main__":
	main()
