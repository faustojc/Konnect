CREATE TABLE beu_database.tbl_employed
(
    id              INT AUTO_INCREMENT
        PRIMARY KEY,
    employer_id     INT                                    NOT NULL,
    employee_id     INT                                    NOT NULL,
    job_title       VARCHAR(255)                           NOT NULL,
    job_type        VARCHAR(100)                           NOT NULL,
    job_description TEXT                                   NULL,
    is_active       TINYINT(1) DEFAULT 1                   NOT NULL,
    is_verified     TINYINT(1) DEFAULT 0                   NOT NULL,
    date_started    DATE       DEFAULT CURRENT_TIMESTAMP() NOT NULL,
    date_ended      DATE                                   NULL,
    CONSTRAINT fk_employed_employee_id
        FOREIGN KEY (employee_id) REFERENCES beu_database.tbl_employee (ID)
            ON UPDATE CASCADE ON DELETE CASCADE,
    CONSTRAINT fk_employed_employer_id
        FOREIGN KEY (employer_id) REFERENCES beu_database.tbl_employer (id)
            ON UPDATE CASCADE ON DELETE CASCADE
);
