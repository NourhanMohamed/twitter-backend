CREATE OR REPLACE FUNCTION create_dm(sender_id integer, reciever_id integer,
  dm_text varchar(140), image_url varchar(100), created_at timestamp)
RETURNS void AS $$
  BEGIN
    INSERT INTO direct_messages(sender_id, reciever_id, dm_text, image_url, created_at)
    VALUES (sender_id, reciever_id, dm_text, image_url, created_at);
  END; $$
LANGUAGE PLPGSQL;

CREATE OR REPLACE FUNCTION delete_dm(dm_id integer)
RETURNS void AS $$
  BEGIN
    DELETE FROM direct_messages D WHERE D.id = $1;
  END; $$
LANGUAGE PLPGSQL;

CREATE OR REPLACE FUNCTION get_conversation(user_id integer, partner_id integer)
RETURNS refcursor AS $$
DECLARE cursor refcursor := 'cur';
  BEGIN
    OPEN cursor FOR
    SELECT * FROM direct_messages D
    WHERE (D.sender_id = $1 AND D.reciever_id = $2) OR
      (D.sender_id = $2 AND D.reciever_id = $1);
    RETRUN cursor;
  END; $$
LANGUAGE PLPGSQL;

-- ?????????????????????????????????????? fix multiple conversations
CREATE OR REPLACE FUNCTION get_conversations(user_id integer)
RETURNS refcursor AS $$
DECLARE cursor refcursor := 'cur';
  BEGIN
    OPEN cursor FOR
    SELECT * FROM direct_messages D
    WHERE D.sender_id = $1 OR D.reciever_id = $1
    ORDER BY D.created_at DESC; 
    RETRUN cursor;
  END; $$
LANGUAGE PLPGSQL;