#!/bin/bash
grep -i warn /var/log/syslog
grep -i alert /var/log/syslog
grep -i crit /var/log/syslog
grep -i info /var/log/syslog
grep -i debug /var/log/syslog
grep -i mysql.service /var/log/syslog
cat /var/log/auth.log
cat /var/log/kern.log


