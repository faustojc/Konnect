CREATE TABLE beu_database.tbl_employment
(
    id              INT(255) AUTO_INCREMENT
        PRIMARY KEY,
    employer_id     INT                                    NOT NULL,
    employee_id     INT                                    NOT NULL,
    job_title       VARCHAR(255)                           NOT NULL,
    start_date      DATETIME   DEFAULT CURRENT_TIMESTAMP() NOT NULL,
    end_date        DATE                                   NULL,
    status          VARCHAR(255)                           NOT NULL,
    job_description VARCHAR(255)                           NOT NULL,
    show_status     TINYINT(1)                             NOT NULL,
    is_verified     TINYINT(1) DEFAULT 0                   NULL,
    CONSTRAINT fk_employment_employee_id
        FOREIGN KEY (employee_id) REFERENCES beu_database.tbl_employee (ID)
            ON UPDATE CASCADE ON DELETE CASCADE,
    CONSTRAINT fk_employment_employer_id
        FOREIGN KEY (employer_id) REFERENCES beu_database.tbl_employer (id)
            ON UPDATE CASCADE ON DELETE CASCADE
)
    CHARSET = latin1;

CREATE INDEX employee_id
    ON beu_database.tbl_employment (employee_id);
