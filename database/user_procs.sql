CREATE OR REPLACE FUNCTION report_user(, created_at timestamp)
RETURNS void AS $$
  BEGIN
    INSERT INTO users() VALUES ();
  END; $$
LANGUAGE PLPGSQL;

CREATE OR REPLACE FUNCTION report_user(, created_at timestamp)
RETURNS void AS $$
  BEGIN
    
  END; $$
LANGUAGE PLPGSQL;

CREATE OR REPLACE FUNCTION report_user(reported_id integer, creator_id integer, created_at timestamp)
RETURNS void AS $$
  BEGIN
    INSERT INTO reports(reported_id, creator_id, created_at, type) VALUES (reported_id, creator_id, created_at, 'users');
  END; $$
LANGUAGE PLPGSQL;
