CREATE TABLE beu_database.tbl_notification
(
    id           INT AUTO_INCREMENT
        PRIMARY KEY,
    user_id      INT                                    NOT NULL,
    from_user_id INT                                    NOT NULL,
    title        TEXT                                   NOT NULL,
    message      TEXT                                   NOT NULL,
    link         TEXT                                   NULL,
    is_displayed TINYINT(1) DEFAULT 0                   NOT NULL,
    is_read      TINYINT(1) DEFAULT 0                   NOT NULL,
    date_created DATETIME   DEFAULT CURRENT_TIMESTAMP() NOT NULL,
    CONSTRAINT fk_notif_from_user_id
        FOREIGN KEY (from_user_id) REFERENCES beu_database.tbl_user (id)
            ON UPDATE CASCADE ON DELETE CASCADE,
    CONSTRAINT fk_notif_user_id
        FOREIGN KEY (user_id) REFERENCES beu_database.tbl_user (id)
            ON UPDATE CASCADE ON DELETE CASCADE
);
