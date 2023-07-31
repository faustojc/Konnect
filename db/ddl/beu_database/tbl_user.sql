CREATE TABLE beu_database.tbl_user
(
    id        INT AUTO_INCREMENT
        PRIMARY KEY,
    email     VARCHAR(255) NOT NULL,
    password  VARCHAR(255) NOT NULL,
    user_type VARCHAR(255) NOT NULL,
    locker    VARCHAR(255) NOT NULL,
    CONSTRAINT email
        UNIQUE (email)
)
    CHARSET = latin1;
