
select * from roles ;

insert into roles select 1, title, now(), now() from roles where id = 16;
update permission_role set role_id = 1 where role_id = 16;
update role_user set role_id = 1 where role_id = 16;
delete from roles where id = 16;

