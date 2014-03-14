CREATE OR REPLACE FUNCTION create_tweet(tweet_text varchar(140), creator_id integer, created_at timestamp)
RETURNS void AS $$
  BEGIN
    INSERT INTO tweets(tweet_text, creator_id, created_at) VALUES (tweet_text, creator_id, created_at);
  END; $$
LANGUAGE PLPGSQL;

CREATE OR REPLACE FUNCTION delete_tweet(tweet_id integer)
RETURNS void AS $$
  BEGIN
    DELETE FROM tweets T WHERE T.id = tweet_id;
  END; $$
LANGUAGE PLPGSQL;

CREATE OR REPLACE FUNCTION get_tweet(tweet_id integer)
RETURNS refcursor AS $$
DECLARE cursor refcursor := 'cur';
  BEGIN
    OPEN cursor FOR
    SELECT * FROM tweets T WHERE T.id = tweet_id ;
    RETURN cursor;
  END; $$
LANGUAGE PLPGSQL;

CREATE OR REPLACE FUNCTION get_tweets(user_id integer)
RETURNS refcursor AS $$
DECLARE cursor refcursor := 'cur';
  BEGIN
    OPEN cursor FOR
    SELECT * FROM tweets T INNER JOIN users U ON T.creator_id = U.id
    WHERE T.creator_id = user_id
    ORDER BY T.created_at DESC;
    RETURN cursor;
  END; $$
LANGUAGE PLPGSQL;

CREATE OR REPLACE FUNCTION favourite_tweet(tweet_id integer, user_id integer, created_at timestamp)
RETURNS void AS $$
  BEGIN
    INSERT INTO favorites(tweet_id, user_id, created_at) VALUES (tweet_id, user_id, created_at);
  END; $$
LANGUAGE PLPGSQL;

CREATE OR REPLACE FUNCTION unfavourite_tweet(tweet_id integer, user_id integer)
RETURNS void AS $$
  BEGIN
    DELETE FROM favorites F WHERE F.tweet_id = $1 AND F.user_id = $2;
  END; $$
LANGUAGE PLPGSQL;

CREATE OR REPLACE FUNCTION retweet_tweet(tweet_id integer, user_id integer, created_at timestamp)
RETURNS void AS $$
  BEGIN
    INSERT INTO retweets(tweet_id, user_id, created_at) VALUES (tweet_id, user_id, created_at);
  END; $$
LANGUAGE PLPGSQL;

CREATE OR REPLACE FUNCTION unretweet_tweet(tweet_id integer, user_id integer)
RETURNS void AS $$
  BEGIN
    DELETE FROM retweets R WHERE R.tweet_id = $1 AND R.user_id = $2;
  END; $$
LANGUAGE PLPGSQL;

CREATE OR REPLACE FUNCTION get_retweets_count(tweet_id integer)
RETURNS integer AS $$
  BEGIN
    SELECT count(*) FROM retweets R WHERE R.tweet_id = $1; 
  END; $$
LANGUAGE PLPGSQL;

CREATE OR REPLACE FUNCTION get_favorites_count(tweet_id integer)
RETURNS integer AS $$
  BEGIN
    SELECT count(*) FROM favorites F WHERE F.tweet_id = $1; 
  END; $$
LANGUAGE PLPGSQL;

CREATE OR REPLACE FUNCTION get_retweets(tweet_id integer)
RETURNS refcursor AS $$
DECLARE cursor refcursor := 'cur';
  BEGIN
    OPEN cursor FOR
    SELECT U.username, U.name, U.avatar_file_name
    FROM retweets R INNER JOIN users U ON R.user_id = U.id
    WHERE R.tweet_id = $1;
    RETURN cursor;
  END; $$
LANGUAGE PLPGSQL;

CREATE OR REPLACE FUNCTION get_favorites(tweet_id integer)
RETURNS refcursor AS $$
DECLARE cursor refcursor := 'cur';
  BEGIN
    OPEN cursor FOR
    SELECT U.username, U.name, U.avatar_file_name
    FROM favorites F INNER JOIN users U ON F.user_id = U.id
    WHERE F.tweet_id = $1;
    RETURN cursor;
  END; $$
LANGUAGE PLPGSQL;

-- ???????????????????????????????????????????????????????????????????????
CREATE OR REPLACE FUNCTION reply(tweet_id integer, tweet_text varchar(140), created_at timestamp)
RETURNS void AS $$
  BEGIN
    SELECT create_tweet(tweet_text, $3);
    INSERT INTO replies VALUES (tweet_id, reply_id, created_at);
  END; $$
LANGUAGE PLPGSQL;

CREATE OR REPLACE FUNCTION report_tweet(reported_id integer, creator_id integer, created_at timestamp)
RETURNS void AS $$
  BEGIN
    INSERT INTO reports(reported_id, creator_id, created_at) VALUES (reported_id, creator_id, created_at);
  END; $$
LANGUAGE PLPGSQL;
