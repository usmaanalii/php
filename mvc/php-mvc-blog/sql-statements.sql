CREATE database php_mvc;

CREATE TABLE posts (
    id INT AUTO_INCREMENT,
    author VARCHAR(255),
    content TEXT,

    PRIMARY KEY (id)
);

INSERT INTO posts VALUES (
    1,
    'Jon Snow',
    'The Wall will fall'
);

INSERT INTO posts VALUES (
    2,
    'Khal Drogo',
    'Khaleesi my bitch'
);
