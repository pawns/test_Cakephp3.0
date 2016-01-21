DROP TABLE IF EXISTS `users`,`relationships`, `articles`, `tags`,`articles_tags`,`articles_authors`, `authors`, `comments`, `profiles`;
CREATE TABLE articles (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50),
    body TEXT,
    created DATETIME DEFAULT NULL,
    modified DATETIME DEFAULT NULL
);

CREATE TABLE authors (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50),
    last_name VARCHAR(50)
);

/*
    one to many articles 1 * comments
*/
CREATE TABLE comments (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    body TEXT,
    article_id INT
);

CREATE TABLE tags (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name TEXT
);

/*
    one to one profile 1 1 author
*/
CREATE TABLE profiles (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    author_id INT
);


/*
    many to many with though
*/
CREATE TABLE articles_tags (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    article_id INT,
    tag_id INT,
    starred INT
);

/*
    many to many without though
*/
CREATE TABLE articles_authors (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    article_id INT,
    author_id INT
);




/* Then insert some articles for testing: */
INSERT INTO articles (id,title,body,created)
VALUES (1,'The title', 'This is the article body.', NOW());
INSERT INTO articles (id,title,body,created)
VALUES (2,'A title once again', 'And the article body follows.', NOW());
INSERT INTO articles (id,title,body,created)
VALUES (3,'Title strikes back', 'This is really exciting! Not.', NOW());


INSERT INTO authors (id,first_name,last_name)
VALUES (1, 'first foo','last foo');
INSERT INTO profiles (id,username,author_id)
VALUES (1, 'first last foo', 1);

INSERT INTO authors (id,first_name,last_name)
VALUES (2, 'first bar','last bar');
INSERT INTO authors (id,first_name,last_name)
VALUES (3, 'first koo','last koo');


INSERT INTO comments (body,article_id)
VALUES ('body content1', 1);
INSERT INTO comments (body,article_id)
VALUES ('body content2', 1);
INSERT INTO comments (body,article_id)
VALUES ('body content3', 1);


INSERT INTO tags (id,name)
VALUES (1, 'foo');
INSERT INTO tags (id,name)
VALUES (2, 'bar');
INSERT INTO tags (id,name)
VALUES (3, 'coo');
INSERT INTO tags (id,name)
VALUES (4, 'tee');

 
INSERT INTO articles_tags (article_id,tag_id,starred)
VALUES (1,1,1);
INSERT INTO articles_tags (article_id,tag_id,starred)
VALUES (1,2,1);
INSERT INTO articles_tags (article_id,tag_id,starred)
VALUES (1,3,1);
INSERT INTO articles_tags (article_id,tag_id,starred)
VALUES (2,3,0);
INSERT INTO articles_tags (article_id,tag_id,starred)
VALUES (2,2,0);
INSERT INTO articles_tags (article_id,tag_id,starred)
VALUES (3,2,1);

INSERT INTO articles_authors (article_id,author_id)
VALUES (1,1);


/*
    many to many self referencial with though
*/
CREATE TABLE `users` (
  `id` INT UNSIGNED  AUTO_INCREMENT PRIMARY KEY , 
 `name` VARCHAR(50) , 
 `username` VARCHAR(50),
 `email` VARCHAR(50), 
 `password` VARCHAR(255), 
 `api_key` VARCHAR(255) , 
 `api_key_plain` VARCHAR(255) 
);


CREATE TABLE `relationships` (
 `id` INT  UNSIGNED AUTO_INCREMENT PRIMARY KEY , 
 `follower_id` INT, 
 `followed_id` INT, 
 `count` INT
);



