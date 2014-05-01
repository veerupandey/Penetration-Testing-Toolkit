

import sys
import re
import httplib

def banner():
	print "";
 
def usage():
	banner()
        print "\n"
        print "Usage:"
        print "       python geoedge.py host/ip\n"
        return

if len(sys.argv) < 2:
        usage()
        sys.exit()

host=sys.argv[1]
cmd=sys.argv[1]

banner()
body="ips="+host

try:
	h = httplib.HTTP("www.maxmind.com")
	h.putrequest('POST',"/app/locate_ip" )
	h.putheader('content-type',"application/x-www-form-urlencoded")
	h.putheader('content-length', str(len(body)))
	h.endheaders()
	h.send(body)
	errcode, errmsg, headers = h.getreply()
	response=h.file.read()

	limit=re.compile("reached.*")
	if limit.findall(response)!=[]:
		print "Limit reached in maxmind :(\n"
	else:
		res=re.compile("<td><font size=\"-1\">.*</font>")
		results=res.findall(response)
		res=[]
		for x in results:
			x=x.replace("<td><font size=\"-1\">","")
			x=x.replace("</font>","")
			res.append(x)

		print "Information for "+host+ " by Maxmind"
		print "===========================================\n"
		print "IP/Host: "+host
		country=re.sub("<.*nk>\">","",res[1])
		country2=country.replace("</a>","")
		country=re.sub("<.*middle\" >","",country2)
		print "Country: " +country  +","+res[2]
		print "City: " + res[4] +","+res[5]
		print "Coordinates: "+ res[7] + "," + res[8]
		print "Provider: "+ res[9] + "," + res[10]
		print "Google Maps Link: " + "http://maps.google.com/maps?q="+res[7]+", "+res[8]
		print "Mapquest Link: " + "http://www.mapquest.es/mq/maps/latlong.do?pageId=latlong&latLongType=decimal&txtLatitude="+res[7]+"&txtLongitude="+res[8]
		print "\n"
except:
	print "Connection error...\n"

try:

	h = httplib.HTTP("www.geoiptool.com")
	h.putrequest('GET',"/es/?IP="+host )
	h.putheader('Host', 'www.geoiptool.com')
	h.putheader('User-agent', 'Internet Explorer 6.0 ')
	h.endheaders()
	returncode, returnmsg, headers = h.getreply()
	response=h.file.read()

	res=re.compile("<td align=\"left\" class=\"arial_bold\">.*</td>")
	results=res.findall(response)
	res=[]

	for x in results:
		x=x.replace("<td align=\"left\" class=\"arial_bold\">","")
		x=x.replace("</td>","")
		res.append(x)

	print "Information by Geoiptool"
	print "========================\n"
	print "IP/Host: "+res[0]
	country=re.sub("<.*nk\">","",res[1])
	country=country.replace("</a>","")
	country=re.sub("<.*middle\" >","",country)
	print "Country: " + country + ","+ res[2]
	city=re.sub("<.*nk\">","",res[3])
	city=city.replace("</a>","")
	print "City: " + city + ","+ res[4]
	print "Coordinates: " + res[8] + ","+res[7]
	print "\n"
except:
	print "Connection error..\n"


