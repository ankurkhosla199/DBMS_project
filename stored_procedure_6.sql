DELIMITER $$

CREATE PROCEDURE change_por (
	faculty_id_new varchar(1000), ide int 
)

BEGIN
declare por_id_button int;
DECLARE today date;
declare  faculty_id_button varchar(100) default 0;

select max(por_id) into por_id_button  from por_table ;
   set por_id_button =por_id_button +1;
   
select CURDATE() into today;

if (ide =1) THEN
select faculty_id into faculty_id_button from faculty where position =1; 
update faculty set position = 3 where faculty_id=faculty_id_button ;
update faculty set position = 1 where faculty_id=faculty_id_new ;
update por_table set end_date=today where identifier=ide and faculty_id=faculty_id_button;
insert into por_table values (por_id_button,faculty_id_new,ide,today,NULL);
ELSEIF (ide=2) THEN
select faculty_id into faculty_id_button from faculty where position =2 and department ='ME'; 
if (select department from faculty where faculty_id=faculty_id_new)='ME' then
update faculty set position = 3 where faculty_id=faculty_id_button ;
update faculty set position = 2 where faculty_id=faculty_id_new ;
update por_table set end_date=today where identifier=ide and faculty_id=faculty_id_button;
insert into por_table values (por_id_button,faculty_id_new,ide,today,NULL);
end if;
ELSEIF (ide=3) THEN
select faculty_id into faculty_id_button from faculty where position =2 and department ='EE';
if (select department from faculty where faculty_id=faculty_id_new)='EE' then
update faculty set position = 3 where faculty_id=faculty_id_button ;
update faculty set position = 2 where faculty_id=faculty_id_new ;
update por_table set end_date=today where identifier=ide and faculty_id=faculty_id_button;
insert into por_table values (por_id_button,faculty_id_new,ide,today,NULL);
end if;
elseif (ide=4) THEN
select faculty_id into faculty_id_button from faculty where position =2 and department ='CSE';
if (select department from faculty where faculty_id=faculty_id_new)='CSE' then
update faculty set position = 3 where faculty_id=faculty_id_button ;
update faculty set position = 2 where faculty_id=faculty_id_new ;
update por_table set end_date=today where identifier=ide and faculty_id=faculty_id_button;
insert into por_table values (por_id_button,faculty_id_new,ide,today,NULL);
end if;
end if;







end