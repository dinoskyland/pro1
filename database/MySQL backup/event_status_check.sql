create event e_status_check
ON schedule
	every 1 minute 
DO
   call status_check;
