CREATE DEFINER=`root`@`localhost` PROCEDURE `calc_billing`(in subcribe_id int(11))
BEGIN
	
    declare bill_date datetime default now();
    declare sub_id int(11) default 0;
    declare time_id int(11) default 0;
    declare act_date datetime default now();
    
    select subscription_id, time_unit_id, activated_at into sub_id, time_id, act_date from subscriptions 
    where subscription_id = subcribe_id;
    
    
    if time_id = 7 then

      set bill_date = date_add(act_date, interval 7 day);
      update subscriptions 
      set billing_date = bill_date
      where subscription_id = sub_id;    
    
    elseif time_id = 8 then
    
      set bill_date = date_add(act_date, interval 31 day);
      update subscriptions 
      set billing_date = bill_date
      where subscription_id = sub_id;    
    
    elseif time_id= 9  then
      set bill_date = date_add(act_date, interval 365 day);
      update subscriptions 
      set billing_date = bill_date
      where subscription_id = sub_id;    
    end if;   
END