#!/bin/bash
#-------------- Load average -------------#
echo -e "Load Average Actuel : $(uptime|grep -o "load average.*"|awk '{print $3" " $4" " $5}')"



#-------- Information sur le systeme -------#
printf "Hostname :" $(hostname -f > /dev/null 2>&1) && printf " $(hostname -f)" || printf " $(hostname -s)"

[ -x /usr/bin/lsb_release ] &&  echo -e "\nO.S :" $(lsb_release -d|awk -F: '{print $2}'|sed -e 's/^[ \t]*//')  || echo -e "\n O.S" $(cat /etc/system-release)
echo -e "Version du Kernel :" $(uname -r) 

#-------- Temps serveur -------#
UPTIME=$(uptime)
echo $UPTIME|grep day 2>&1 > /dev/null
if [ $? != 0 ]
then
  echo $UPTIME|grep -w min 2>&1 > /dev/null && echo -e "En route depuis : "$(echo $UPTIME|awk '{print $2" by "$3}'|sed -e 's/,.*//g')" minutes"  || echo -e "System Uptime : "$(echo $UPTIME|awk '{print $2" by "$3" "$4}'|sed -e 's/,.*//g')" hours" 
else
  echo -e "En route depuis :" $(echo $UPTIME|awk '{print $2" by "$3" "$4" "$5" hours"}'|sed -e 's/,//g') 
fi
echo -e "Date acctuel : "$(date +%c)
