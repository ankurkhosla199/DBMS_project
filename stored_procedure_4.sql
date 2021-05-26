DELIMITER $$

CREATE PROCEDURE addcomment (
	leave_id_button int(100),comment_button varchar(1000) 
)
BEGIN

   declare  faculty_id_button varchar(100);
         declare  comment_id_login int default 0; 
    DECLARE today date;
   declare pos int;
   
 
  select faculty_id into  faculty_id_button from leaves_in_process where leave_id=leave_id_button;
  
  select position into pos from faculty where faculty_id = faculty_id_button;

select CURDATE() into today;
    

    select max(comment_id) into comment_id_login  from leave_comment ;
   set comment_id_login =comment_id_login +1;
select position into pos from faculty where faculty_id = faculty_id_button;

    
 Insert into leave_comment values (comment_id_login, leave_id_button, faculty_id_button, pos, comment_button, pos-1, today);
 

  


   
end