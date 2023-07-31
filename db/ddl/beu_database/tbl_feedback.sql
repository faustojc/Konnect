CREATE TABLE beu_database.tbl_feedback
(
    id           INT AUTO_INCREMENT
        PRIMARY KEY,
    user_id      INT                              NOT NULL,
    from_user_id INT                              NOT NULL,
    message      TEXT                             NOT NULL,
    rating       TINYINT(5)                       NOT NULL,
    date_created DATE DEFAULT CURRENT_TIMESTAMP() NOT NULL,
    CONSTRAINT fk_feedback_from_user_id
        FOREIGN KEY (from_user_id) REFERENCES beu_database.tbl_user (id)
            ON UPDATE CASCADE ON DELETE CASCADE,
    CONSTRAINT fk_feedback_user_id
        FOREIGN KEY (user_id) REFERENCES beu_database.tbl_user (id)
            ON UPDATE CASCADE ON DELETE CASCADE
)
    CHARSET = latin1;
