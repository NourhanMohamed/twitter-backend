CREATE OR REPLACE FUNCTION create_user(username varchar(30),
  email varchar(100),
  password varchar(150),
  name varchar(100),
  created_at timestamp)
RETURNS void AS $$
  BEGIN
    INSERT INTO users(username, email, encrypted_password, name, created_at)
    VALUES (username, email, password, name, created_at);
  END; $$
LANGUAGE PLPGSQL;

--?????????????????????????????????????????????????????????????????????
CREATE OR REPLACE FUNCTION edit_user()
RETURNS void AS $$
  BEGIN

  END; $$
LANGUAGE PLPGSQL;

CREATE OR REPLACE FUNCTION get_user(user_id integer)
RETURNS refcursor AS $$
DECLARE cursor refcursor := 'cur';
  BEGIN
    OPEN cursor FOR
    SELECT * FROM users U WHERE U.id = user_id LIMIT 1;
    RETRUN cursor; 
  END; $$
LANGUAGE PLPGSQL;

CREATE OR REPLACE FUNCTION get_users(user_substring integer)
RETURNS refcursor AS $$
DECLARE cursor refcursor := 'cur';
  BEGIN
    OPEN cursor FOR
    SELECT U.username, U.name, U.avatar_file_name FROM users U
    WHERE U.name LIKE '%'+$1+'%' OR U.username LIKE '%'+$1+'%';
    RETURN cursor;
  END; $$
LANGUAGE PLPGSQL;

CREATE OR REPLACE FUNCTION follow(user_id integer, follower_id integer,
  created_at timestamp)
RETURNS void AS $$
  BEGIN
    DECLARE private_user boolean;
    SELECT U.private INTO private_user FROM users U
    WHERE U.id = $1;

    IF private_user THEN
      INSERT INTO followships(user_id, follower_id, confirmed, created_at)
      VALUES (user_id, follower_id, '0', created_at);
    ELSE
      INSERT INTO followships(user_id, follower_id, created_at)
      VALUES (user_id, follower_id, created_at);
    END IF;
  END; $$
LANGUAGE PLPGSQL;

CREATE OR REPLACE FUNCTION unfollow(user_id integer, follower_id integer)
RETURNS void AS $$
  BEGIN
    DELETE FROM followships F WHERE F.user_id = $1 AND F.follower_id = $2;
  END; $$
LANGUAGE PLPGSQL;

CREATE OR REPLACE FUNCTION confirm_follow(user_id integer, follower_id integer)
RETURNS void AS $$
  BEGIN
    UPDATE followships F SET F.confirmed = '1'
    WHERE F.user_id = $1 AND F.follower_id = $2;
  END; $$
LANGUAGE PLPGSQL;

CREATE OR REPLACE FUNCTION get_followers(user_id integer)
RETURNS refcursor AS $$
DECLARE cursor refcursor := 'cur';
  BEGIN
    OPEN cursor FOR
    SELECT U.username, U.name, U.avatar_file_name
    FROM users U INNER JOIN followships F ON U.id = F.follower_id
    WHERE F.user_id = $1 AND F.confirmed = '1';
    RETURN cursor;
  END; $$
LANGUAGE PLPGSQL;

CREATE OR REPLACE FUNCTION get_following(user_id integer)
RETURNS refcursor AS $$
DECLARE cursor refcursor := 'cur';
  BEGIN
    OPEN cursor FOR
    SELECT U.username, U.name, U.avatar_file_name
    FROM users U INNER JOIN followships F ON U.id = F.user_id
    WHERE F.follower_id = $1 AND F.confirmed = '1';
    RETRUN cursor;
  END; $$
LANGUAGE PLPGSQL;

CREATE OR REPLACE FUNCTION get_tweets(user_id integer)
RETURNS refcursor AS $$
DECLARE cursor refcursor := 'cur';
  BEGIN
    OPEN cursor FOR
    SELECT T.id, T.text, T.image_url, U.name, U.username, U.avatar_file_name
    FROM tweets T INNER JOIN users U ON T.creator_id = U.id
    WHERE T.creator_id = user_id
    ORDER BY T.created_at DESC;
    RETURN cursor;
  END; $$
LANGUAGE PLPGSQL;

CREATE OR REPLACE FUNCTION get_user_retweets(user_id integer)
RETURNS refcursor AS $$
DECLARE cursor refcursor := 'cur';
  BEGIN
    OPEN cursor FOR
    SELECT T.id, T.text, T.image_url, U.name, U.username, U.avatar_file_name 
    FROM tweets T INNER JOIN retweets R ON T.id = R.tweet_id
      INNER JOIN users U ON R.user_id = U.id
    WHERE U.id = $1
    ORDER BY R.created_at DESC;
    RETURN cursor;
  END; $$
LANGUAGE PLPGSQL;

CREATE OR REPLACE FUNCTION get_user_favorites(user_id integer)
RETURNS refcursor AS $$
DECLARE cursor refcursor := 'cur';
  BEGIN
    OPEN cursor FOR
    SELECT T.id, T.text, T.image_url, U.name, U.username, U.avatar_file_name 
    FROM tweets T INNER JOIN favorites F ON T.id = F.tweet_id
      INNER JOIN users U ON F.user_id = U.id
    WHERE U.id = $1
    ORDER BY F.created_at DESC;
    RETURN cursor;
  END; $$
LANGUAGE PLPGSQL;

-- Should be changed to fetch my subscribed lists, too
CREATE OR REPLACE FUNCTION get_user_lists(user_id integer)
RETURNS refcursor AS $$
DECLARE cursor refcursor := 'cur';
  BEGIN
    OPEN cursor FOR
    SELECT L.id, L.name, L.description, U.name, U.username, U.avatar_file_name 
    FROM lists L INNER JOIN users U ON L.creator_id = U.id
    WHERE U.id = $1;
    RETURN cursor;
  END; $$
LANGUAGE PLPGSQL;

CREATE OR REPLACE FUNCTION get_mentions(username varchar(30))
RETURNS refcursor AS $$
DECLARE cursor refcursor := 'cur';
  BEGIN
    OPEN cursor FOR
    SELECT T.id, T.text, T.image_url, U.name, U.username, U.avatar_file_name
    FROM tweets T INNER JOIN users U ON T.creator_id = U.id
    WHERE T.text LIKE '%@'+$1+'%'
    ORDER BY T.created_at DESC;
  END; $$
LANGUAGE PLPGSQL;

CREATE OR REPLACE FUNCTION report_user(reported_id integer, creator_id integer, created_at timestamp)
RETURNS void AS $$
  BEGIN
    INSERT INTO reports(reported_id, creator_id, created_at, type)
    VALUES (reported_id, creator_id, created_at, 'users');
  END; $$
LANGUAGE PLPGSQL;
