#!/bin/bash

#--------Check for Processor Utilization (current data)--------#
echo -e "\n\nUtilisation Du processeur"
echo -e "$D"
echo -e $(top -bn1 | grep "Cpu(s)" |  sed "s/.*, *\([0-9.]*\)%* id.*/\1/" | awk '{print 100 - $1}')
