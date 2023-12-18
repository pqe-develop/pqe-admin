use hrtm;
select username, id, team_id, concat('insert into team_user values(',id,',',team_id,');') as sql1
from users where team_id is not null;
