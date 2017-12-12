CREATE DEFINER=`root`@`localhost` PROCEDURE `status_check`()
BEGIN
	Declare bill_date datetime;
    Declare lstatus varchar(30) default '';
    Declare sub_id, max_count, i int(11) default 0;
    
    select max(subscription_id) into max_count from subscriptions;  
    set i = 1;
    while max_count >= i do
    
      select billing_date, status into bill_date, lstatus from subscriptions
      where subscription_id = i;
      
      if bill_date < now() and lstatus != 'Expired' then
        update subscriptions
        set status = 'Expired'
        where subscription_id = i;
        call save_sub_log(i);
      end if;
    
      set i = i + 1;
    end while;
END