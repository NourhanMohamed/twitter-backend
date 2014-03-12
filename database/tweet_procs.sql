CREATE OR REPLACE FUNCTION create_tweet(tweet_text varchar(140), created_at timestamp)
RETURNS void AS $$
  BEGIN
    INSERT INTO tweets(tweet_text, created_at) VALUES (tweet_text, created_at);
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
    SELECT * FROM tweets T INNER JOIN users U ON T.creator_id = U.id WHERE T.creator_id = user_id ORDER BY T.created_at DESC;
    RETURN cursor;
  END; $$
LANGUAGE PLPGSQL;
