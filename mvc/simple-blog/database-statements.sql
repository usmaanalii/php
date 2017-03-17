-- make database
CREATE DATABASE nettuts_blog;

-- create table blog_posts
CREATE TABLE blog_posts (
    id INT NOT NULL AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    post TEXT NOT NULL,
    author_id INT NOT NULL,
    date_posted DATE NOT NULL,

    PRIMARY KEY (id)
);


-- create table people
CREATE TABLE people (
    id INT NOT NULL AUTO_INCREMENT,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    url VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,

    PRIMARY KEY (id)
);

-- create table tags
CREATE TABLE tags (
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,

    PRIMARY KEY (id)
);

-- create table blog_post_tags
CREATE TABLE blog_post_tags (
    blog_post_id INT NOT NULL,
    tag_id INT NOT NULL
);

-- insert test data
INSERT INTO `blog_posts` (`id`, `title`, `post`, `author_id`, `date_posted`) VALUES (

    1,
    'My First Blog Post!',
    'This is my first post on my new simple blog!',
    1,
    '2008-10-17'),

    (2,
    'Web design!',
    'This post is all about web design! I love web design!',
    1,
    '2008-10-17'),

    (3,
    'The Importance of UX',
    'This post is all about user experience and how important it is while designing for the web.',
    1,
    '2008-10-18'
);

INSERT INTO `blog_post_tags` (`blog_post_id`, `tag_id`)
    VALUES (2, 1), (3, 2);

    INSERT INTO `tags` (`id`, `name`)
        VALUES (1, 'Web Design'), (2, 'User Experience');
