CREATE TABLE beu_database.tbl_jobposting
(
    id          INT AUTO_INCREMENT
        PRIMARY KEY,
    employer_id INT                                  NOT NULL,
    title       VARCHAR(255)                         NOT NULL,
    description MEDIUMTEXT                           NOT NULL,
    location    VARCHAR(255)                         NOT NULL,
    date_posted DATETIME DEFAULT CURRENT_TIMESTAMP() NOT NULL,
    start_date  DATE                                 NULL,
    filled      VARCHAR(255)                         NULL,
    salary      VARCHAR(255)                         NOT NULL,
    shift       VARCHAR(255)                         NOT NULL,
    job_type    VARCHAR(255)                         NOT NULL,
    skills_req  VARCHAR(255)                         NOT NULL,
    CONSTRAINT fk_jobposting_employer_id
        FOREIGN KEY (employer_id) REFERENCES beu_database.tbl_employer (id)
            ON UPDATE CASCADE ON DELETE CASCADE
)
    CHARSET = latin1;
