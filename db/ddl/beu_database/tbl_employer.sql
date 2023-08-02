CREATE TABLE beu_database.tbl_employer
(
    id             INT AUTO_INCREMENT
        PRIMARY KEY,
    user_id        INT                                    NOT NULL,
    employer_name  VARCHAR(255)                           NOT NULL,
    email          VARCHAR(255)                           NOT NULL,
    summary        MEDIUMTEXT                             NOT NULL,
    tradename      VARCHAR(255)                           NOT NULL,
    region         VARCHAR(255)                           NOT NULL,
    province       VARCHAR(255)                           NOT NULL,
    city           VARCHAR(255)                           NOT NULL,
    barangay       VARCHAR(255)                           NOT NULL,
    address        VARCHAR(255)                           NOT NULL,
    business_type  VARCHAR(255)                           NOT NULL,
    contact_number VARCHAR(11)                            NOT NULL,
    sss            VARCHAR(255)                           NOT NULL,
    tin            INT(12)                                NOT NULL,
    image          TINYTEXT                               NULL,
    is_verified    TINYINT(1) DEFAULT 0                   NOT NULL,
    date_created   DATETIME   DEFAULT CURRENT_TIMESTAMP() NOT NULL
)
    CHARSET = latin1;
