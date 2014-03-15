CREATE OR REPLACE FUNCTION create_list(name varchar(50), description varchar(140),
creator_id integer, private boolean, created_at timestamp)
RETURNS void AS $$
  BEGIN
    INSERT INTO lists(name, description, creator_id, private, created_at)
    VALUES (name, description, creator_id, private, created_at);
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

-- subscribe/unsubscribe
-- add/remove members
-- list members/subscribers