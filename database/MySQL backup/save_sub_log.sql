CREATE DEFINER=`root`@`localhost` PROCEDURE `save_sub_log`(in sub_id int(11))
BEGIN
  
	declare lsubscription_id int(11) default 0; 
    declare lrate_plan_id int(11) default 0; 
    declare luser_id int(11) default 0; 
    declare lactivated_at datetime; 
    declare lbilling_date datetime;
    declare lsuspended_date datetime;
    declare lresuming_date datetime;
    declare ltemp_date  datetime;
	declare lcurrent_balance varchar(191);
    declare lpayment_id int(11) default 0;
    declare ltime_unit_id int(11) default 0;
    declare lstatus varchar(30);
    declare ldescription varchar(255);
    declare lcreated_at datetime;
    declare lupdated_at datetime;
    declare lregister_id varchar(15);
          
  select subscription_id, rate_plan_id, user_id, activated_at, 
         billing_date, suspended_date, resuming_date, temp_date, 
         current_balance,payment_id,time_unit_id,status,description,created_at,updated_at,register_id 
          
  into  
         lsubscription_id, lrate_plan_id, luser_id, lactivated_at, 
         lbilling_date, lsuspended_date, lresuming_date, ltemp_date, 
         lcurrent_balance, lpayment_id, ltime_unit_id, lstatus, ldescription, lcreated_at, lupdated_at, lregister_id
  
  from subscriptions
  
  where subscription_id = sub_id;
  
  
  
  insert into subscription_logs(subscription_id, rate_plan_id, user_id, activated_at, 
          billing_date, suspended_date, resuming_date, temp_date, 
          current_balance,payment_id,time_unit_id,status,description,created_at,updated_at,register_id)
  values (lsubscription_id, lrate_plan_id, luser_id, lactivated_at, 
          lbilling_date, lsuspended_date, lresuming_date, ltemp_date, 
          lcurrent_balance, lpayment_id, ltime_unit_id, lstatus, ldescription, lcreated_at, lupdated_at, lregister_id);
  
END