#!/bin/bash
#--------Check for memory--------#
MEM_DETAILS=$(cat /proc/meminfo)
echo -e "$D"
echo -e "Total RAM (/proc/meminfo) : "$(echo "$MEM_DETAILS"|grep MemTotal|awk '{print $2/1024}') "MB OR" $(echo "$MEM_DETAILS"|grep MemTotal|awk '{print $2/1024/1024}') "GB"
echo -e "Used RAM in MB : "$(free -m|grep -w Mem:|awk '{print $3}')", in GB : "$(free -m|grep -w Mem:|awk '{print $3/1024}')
echo -e "Free RAM in MB : "$(echo "$MEM_DETAILS"|grep -w MemFree|awk '{print $2/1024}')" , in GB : "$(echo "$MEM_DETAILS"|grep -w MemFree |awk '{print $2/1024/1024}')
