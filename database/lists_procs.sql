CREATE OR REPLACE FUNCTION create_list(name varchar(50), description varchar(140),
creator_id integer, private boolean, created_at timestamp)
RETURNS void AS $$
DECLARE list_id integer;
  BEGIN
    INSERT INTO lists(name, description, creator_id, private, created_at)
    VALUES (name, description, creator_id, private, created_at);

    SELECT L.id INTO list_id FROM lists L
    WHERE L.name = $1 AND L.creator_id = $3;

    SELECT subscribe(list_id, creator_id, created_at);
  END; $$
LANGUAGE PLPGSQL;

CREATE OR REPLACE FUNCTION delete_list(list_id integer)
RETURNS void AS $$
  BEGIN
    DELETE FROM lists L WHERE L.id = $1;
  END; $$
LANGUAGE PLPGSQL;

CREATE OR REPLACE FUNCTION update_list(id integer, name varchar(50),
  description varchar(140), private boolean)
RETURNS void AS $$
  BEGIN
    UPDATE lists L
    SET name = $2, description = $3, private = $4
    WHERE L.id = $1;
  END; $$
LANGUAGE PLPGSQL;

CREATE OR REPLACE FUNCTION subscribe(user_id integer, list_id integer, created_at timestamp)
RETURNS void AS $$
  BEGIN
    INSERT INTO subscriptions(subscriber_id, list_id, created_at)
    VALUES (user_id, list_id, created_at);
  END; $$
LANGUAGE PLPGSQL;

CREATE OR REPLACE FUNCTION unsubscribe(user_id integer, list_id integer)
RETURNS void AS $$
  BEGIN
    DELETE FROM subscriptions S
    WHERE S.subscriber_id = $1 AND S.list_id = $2;
  END; $$
LANGUAGE PLPGSQL;

CREATE OR REPLACE FUNCTION add_member(user_id integer, list_id integer)
RETURNS void AS $$
  BEGIN
    INSERT INTO memberships(member_id, list_id, created_at)
    VALUES (user_id, list_id, created_at);
  END; $$
LANGUAGE PLPGSQL;

CREATE OR REPLACE FUNCTION delete_member(user_id integer, list_id integer)
RETURNS void AS $$
  BEGIN
    DELETE FROM memberships M
    WHERE M.member_id = $1 AND S.list_id = $2;
  END; $$
LANGUAGE PLPGSQL;

CREATE OR REPLACE FUNCTION get_list_subscribers(list_id integer)
RETURNS refcursor AS $$
DECLARE cursor refcursor := 'cur';
  BEGIN
    OPEN cursor FOR
    SELECT U.name, U.username, U.avatar_file_name
    FROM lists L INNER JOIN subscriptions S ON L.id = S.list_id
      INNER JOIN users U ON U.id = S.subscriber_id
    WHERE L.id = list_id;
    RETURN cursor;
  END; $$
LANGUAGE PLPGSQL;

CREATE OR REPLACE FUNCTION get_list_members(list_id integer)
RETURNS refcursor AS $$
DECLARE cursor refcursor := 'cur';
  BEGIN
    OPEN cursor FOR
    SELECT U.name, U.username, U.avatar_file_name
    FROM lists L INNER JOIN memberships M ON L.id = M.list_id
      INNER JOIN users U ON U.id = M.member_id
    WHERE L.id = list_id;
    RETURN cursor;
  END; $$
LANGUAGE PLPGSQL;

-- Get list feeds
