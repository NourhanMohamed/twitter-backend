-- JAVA / JSON DONE
CREATE OR REPLACE FUNCTION create_list(name varchar(50), description varchar(140),
creator_id integer, private boolean, created_at timestamp)
RETURNS void AS $$
DECLARE list_id integer;
  BEGIN
    INSERT INTO lists(name, description, creator_id, private, created_at)
    VALUES (name, description, creator_id, private, created_at) RETURNING id INTO list_id;

    PERFORM subscribe(creator_id, list_id, created_at);
  END; $$
LANGUAGE PLPGSQL;

-- JAVA / JSON DONE
CREATE OR REPLACE FUNCTION delete_list(list_id integer)
RETURNS void AS $$
  BEGIN
    DELETE FROM lists L WHERE L.id = $1;
  END; $$
LANGUAGE PLPGSQL;

-- JAVA / JSON DONE
CREATE OR REPLACE FUNCTION update_list(list_id integer, params TEXT[][2])
RETURNS void AS $$
BEGIN
  FOR i IN array_lower(params, 1)..array_upper(params, 1) LOOP
    EXECUTE 'UPDATE lists' ||
      ' SET ' || quote_ident(params[i][1]) || ' = ' || quote_literal(params[i][2]) ||
      ' WHERE id = ' || list_id || ';';
  END LOOP;
END; $$
LANGUAGE PLPGSQL;

-- JAVA / JSON DONE
CREATE OR REPLACE FUNCTION subscribe(user_id integer, list_id integer, created_at timestamp)
RETURNS void AS $$
  BEGIN
    INSERT INTO subscriptions(subscriber_id, list_id, created_at)
    VALUES (user_id, list_id, created_at);
  END; $$
LANGUAGE PLPGSQL;

-- JAVA / JSON DONE
CREATE OR REPLACE FUNCTION unsubscribe(user_id integer, list_id integer)
RETURNS void AS $$
  BEGIN
    DELETE FROM subscriptions S
    WHERE S.subscriber_id = $1 AND S.list_id = $2;
  END; $$
LANGUAGE PLPGSQL;

-- JAVA / JSON DONE
CREATE OR REPLACE FUNCTION add_member(user_id integer, list_id integer, created_at timestamp)
RETURNS void AS $$
  BEGIN
    INSERT INTO memberships(member_id, list_id, created_at)
    VALUES (user_id, list_id, created_at);
  END; $$
LANGUAGE PLPGSQL;

-- JAVA / JSON DONE
CREATE OR REPLACE FUNCTION delete_member(user_id integer, list_id integer)
RETURNS void AS $$
  BEGIN
    DELETE FROM memberships M
    WHERE M.member_id = $1 AND M.list_id = $2;
  END; $$
LANGUAGE PLPGSQL;

CREATE OR REPLACE FUNCTION get_list_subscribers(list_id integer)
RETURNS refcursor AS $$
DECLARE cursor refcursor := 'cur';
  BEGIN
    OPEN cursor FOR
    SELECT U.name, U.username, U.avatar_url
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
    SELECT U.name, U.username, U.avatar_url
    FROM lists L INNER JOIN memberships M ON L.id = M.list_id
      INNER JOIN users U ON U.id = M.member_id
    WHERE L.id = list_id;
    RETURN cursor;
  END; $$
LANGUAGE PLPGSQL;

-- Get list feeds
