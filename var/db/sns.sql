CREATE TABLE IF NOT EXISTS articles (
  id integer primary key,
  user_id,
  title,
  description,
  status,
  created,
  updated
);