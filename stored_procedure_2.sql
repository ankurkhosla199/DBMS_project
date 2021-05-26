DELIMITER //

CREATE PROCEDURE nextbutton (
	leave_id_button int(100),comment_button varchar(1000), action_taken int(100) 
)

BEGIN

    DECLARE  directed_to_button INT DEFAULT 0;
    declare  faculty_id_button varchar(100) default 0;
    declare  comment_id_login int default 0;
	declare  leave_start date;
    declare retro BOOLEAN;
    declare pos int default 0;
    declare pos_online int default 0;
    declare online_faculty_id varchar(100);
    declare self BOOLEAN;
   	declare status_button int default 0;
    declare applied_on_button date;
    declare total_leaves int default 0;
    
    DECLARE today date;
    select CURDATE() into today;
    
	
    select directed_to into directed_to_button from leaves_in_process where leave_id=leave_id_button;
    select faculty_id into  faculty_id_button from leaves_in_process where leave_id=leave_id_button;
    select  leave_start_date into  leave_start from leaves_in_process where leave_id=leave_id_button;
    select position into pos from faculty where faculty_id = faculty_id_button;
    select faculty_id into online_faculty_id from current_users;
    select position into pos_online from faculty where faculty_id=online_faculty_id ;
    select status  into  status_button from leaves_in_process where leave_id=leave_id_button;
    select  applied_on into  applied_on_button from leaves_in_process where leave_id=leave_id_button;
    select  number_of_leaves into total_leaves from leaves_in_process where leave_id=leave_id_button;
    
    if   online_faculty_id= faculty_id_button then set self = true; else set self=false; end if;
    
    If leave_start >= today THEN set retro = false;
    else set retro=true;
    end if;
    
    select max(comment_id) into comment_id_login  from leave_comment ;
   set comment_id_login =comment_id_login +1;
    
if self=false and (status_button=1 or status_button =0) then
IF directed_to_button = 2 THEN     
    
   		IF  action_taken = 1 THEN
        	update leaves_in_process set directed_to = 1 where leave_id=leave_id_button;
            Insert into leave_comment values (comment_id_login, leave_id_button, faculty_id_button, 2, comment_button, 1, today);
        ELSEIF action_taken=3 THEN
       		update leaves_in_process set directed_to = 3 where leave_id=leave_id_button;
            Insert into leave_comment values (comment_id_login, leave_id_button, faculty_id_button, 2, comment_button, 3, today);
		end if ;
        

   
elseif directed_to_button = 1 THEN     
    
   		IF  action_taken = 1  and  retro = true then 
        	update leaves_in_process set directed_to = 0 where leave_id=leave_id_button;
            Insert into leave_comment values (comment_id_login, leave_id_button, faculty_id_button, 1, comment_button, 0, today);
        ELSEIF action_taken=1 and retro = false THEN
        	insert into leave_data values ( leave_id_button,faculty_id_button, 2, applied_on_button, today,leave_start,total_leaves);
       		update leaves_in_process set status=2 where leave_id=leave_id_button;
            Insert into leave_comment values (comment_id_login, leave_id_button, faculty_id_button, 1, comment_button, 3, today);
 		ELSEIF action_taken=3 THEN
       		update leaves_in_process set directed_to = 3 where leave_id=leave_id_button;
            Insert into leave_comment values (comment_id_login, leave_id_button, faculty_id_button, 1, comment_button, 3, today);
         
        end if  ; 
        
        
elseif directed_to_button = 0 THEN     -- 3 is faculty --2 is hod --1 is dean  --0 is director
    
        IF action_taken=1  THEN
        	insert into leave_data values ( leave_id_button,faculty_id_button, 2, applied_on_button, today,leave_start,total_leaves);
       		update leaves_in_process set status=2 where leave_id=leave_id_button;
            Insert into leave_comment values (comment_id_login, leave_id_button, faculty_id_button, 0, comment_button,pos , today);
 		ELSEIF action_taken=3 THEN
       		update leaves_in_process set directed_to = pos where leave_id=leave_id_button;
            Insert into leave_comment values (comment_id_login, leave_id_button, faculty_id_button, 0, comment_button, pos, today);
         
        end if   ;
 end if  ;
 
if action_taken=0 then 
	insert into leave_data values ( leave_id_button,faculty_id_button, 5, applied_on_button, today,leave_start,total_leaves);
    update leaves_in_process set status=5 where leave_id=leave_id_button;
    Insert into leave_comment values (comment_id_login, leave_id_button, faculty_id_button,pos_online , comment_button, pos, today);
    update faculty set pending_leaves = pending_leaves+ (select number_of_leaves  from leaves_in_process where leave_id=leave_id_button) where faculty_id= faculty_id_button;
end if ;
    
end if ;-- end of not self

if self=true and (status_button=1 or status_button=0) THEN
IF action_taken=1 and (pos_online = 3)THEN
       		update leaves_in_process set directed_to = 2 where leave_id=leave_id_button;
            Insert into leave_comment values (comment_id_login, leave_id_button, faculty_id_button, 3, comment_button, 2, today);
elseif action_taken=1 THEN
       		update leaves_in_process set directed_to = 0 where leave_id=leave_id_button;
            Insert into leave_comment values (comment_id_login, leave_id_button, faculty_id_button,pos_online , comment_button, 0, today);
end if;
end if;
END