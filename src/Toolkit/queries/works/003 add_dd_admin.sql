select * from hrtm.dropdowns where dropdown = 'STATUS_SELECT';
drop table admdb.dropdowns;
CREATE TABLE admdb.dropdowns (
   id INT(10) UNSIGNED AUTO_INCREMENT NOT NULL,
   dropdown VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
   name VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
   label VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
   dd_filter VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
   disactivated TINYINT(1),
  PRIMARY KEY (id)
) ENGINE = innodb ROW_FORMAT = DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

insert into admdb.dropdowns
(id, dropdown, name, label, dd_filter, disactivated) VALUES
(299, 'STATUS_SELECT', 'Active', 'Active', NULL, 0), 
(298, 'STATUS_SELECT', 'Inactive', 'Inactive', NULL, 0)