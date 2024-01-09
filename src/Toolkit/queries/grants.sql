-- bidnt_admin
GRANT SELECT ON admdb.cities TO `bidnt_admin`@`%`;
GRANT SELECT ON admdb.companies TO `bidnt_admin`@`%`;
GRANT SELECT ON admdb.companies_bank_holidays TO `bidnt_admin`@`%`;
GRANT SELECT ON admdb.company_country TO `bidnt_admin`@`%`;
GRANT SELECT ON admdb.countries TO `bidnt_admin`@`%`;
GRANT SELECT ON admdb.currencies TO `bidnt_admin`@`%`;
GRANT SELECT ON admdb.currency_histories TO `bidnt_admin`@`%`;
GRANT SELECT ON admdb.time_dimension_company TO `bidnt_admin`@`%`;
GRANT SELECT ON admdb.teams TO `bidnt_admin`@`%`;
GRANT SELECT ON admdb.users TO `bidnt_admin`@`%`;
-- hradmin
GRANT SELECT ON admdb.cities TO `hradmin`@`%`;
GRANT SELECT ON admdb.companies TO `hradmin`@`%`;
GRANT SELECT ON admdb.companies_bank_holidays TO `hradmin`@`%`;
GRANT SELECT ON admdb.company_country TO `hradmin`@`%`;
GRANT SELECT ON admdb.countries TO `hradmin`@`%`;
GRANT SELECT ON admdb.currencies TO `hradmin`@`%`;
GRANT SELECT ON admdb.currency_histories TO `hradmin`@`%`;
GRANT SELECT ON admdb.teams TO `hradmin`@`%`;
GRANT SELECT ON admdb.time_dimension_company TO `hradmin`@`%`;
GRANT SELECT ON admdb.users TO `hradmin`@`%`;
--
GRANT SELECT ON hrdb.contracts TO `hradmin`@`%`;
GRANT SELECT ON hrdb.salaries TO `hradmin`@`%`;
GRANT SELECT, INSERT, UPDATE, DELETE ON hrdb.resources TO `hradmin`@`%`;
-- pqeadmin
GRANT SELECT, INSERT, UPDATE, DELETE ON hrtm.openai_cvs TO `pqeadmin`@`%`;
GRANT SELECT, INSERT, UPDATE, DELETE ON hrdb.resources TO `pqeadmin`@`%`;
GRANT SELECT ON admdb.cities TO `pqeadmin`@`%`;
GRANT SELECT ON admdb.companies TO `pqeadmin`@`%`;
GRANT SELECT ON admdb.companies_bank_holidays TO `pqeadmin`@`%`;
GRANT SELECT ON admdb.company_country TO `pqeadmin`@`%`;
GRANT SELECT ON admdb.countries TO `pqeadmin`@`%`;
GRANT SELECT ON admdb.currencies TO `pqeadmin`@`%`;
GRANT SELECT ON admdb.currency_histories TO `pqeadmin`@`%`;
GRANT SELECT ON admdb.time_dimension_company TO `pqeadmin`@`%`;
GRANT SELECT ON admdb.teams TO `pqeadmin`@`%`;
GRANT SELECT ON admdb.users TO `pqeadmin`@`%`;
-- prfadmin
GRANT SELECT ON suitecrm.pqe_rdi TO `prfadmin`@`%`;
GRANT SELECT ON suitecrm.v_pqe_rdi_labeled TO `prfadmin`@`%`;

GRANT SELECT ON admdb.cities TO `prfadmin`@`%`;
GRANT SELECT ON admdb.companies TO `prfadmin`@`%`;
GRANT SELECT ON admdb.companies_bank_holidays TO `prfadmin`@`%`;
GRANT SELECT ON admdb.company_country TO `prfadmin`@`%`;
GRANT SELECT ON admdb.countries TO `prfadmin`@`%`;
GRANT SELECT ON admdb.currencies TO `prfadmin`@`%`;
GRANT SELECT ON admdb.currency_histories TO `prfadmin`@`%`;
GRANT SELECT ON admdb.teams TO `prfadmin`@`%`;
GRANT SELECT ON admdb.time_dimension_company TO `prfadmin`@`%`;
GRANT SELECT ON admdb.users TO `prfadmin`@`%`;
--
GRANT SELECT ON hrdb.contracts TO `prfadmin`@`%`;
GRANT SELECT ON hrdb.salaries TO `prfadmin`@`%`;
GRANT SELECT, INSERT, UPDATE, DELETE ON hrdb.resources TO `prfadmin`@`%`;
-- subsadmin
GRANT SELECT ON admdb.cities TO `subsadmin`@`%`;
GRANT SELECT ON admdb.companies TO `subsadmin`@`%`;
GRANT SELECT ON admdb.companies_bank_holidays TO `subsadmin`@`%`;
GRANT SELECT ON admdb.company_country TO `subsadmin`@`%`;
GRANT SELECT ON admdb.countries TO `subsadmin`@`%`;
GRANT SELECT ON admdb.currencies TO `subsadmin`@`%`;
GRANT SELECT ON admdb.currency_histories TO `subsadmin`@`%`;
GRANT SELECT ON admdb.time_dimension_company TO `subsadmin`@`%`;
GRANT SELECT ON admdb.teams TO `subsadmin`@`%`;
GRANT SELECT ON admdb.users TO `subsadmin`@`%`;
-- tpaadmin
GRANT SELECT ON admdb.cities TO `tpaadmin`@`%`;
GRANT SELECT ON admdb.companies TO `tpaadmin`@`%`;
GRANT SELECT ON admdb.companies_bank_holidays TO `tpaadmin`@`%`;
GRANT SELECT ON admdb.company_country TO `tpaadmin`@`%`;
GRANT SELECT ON admdb.countries TO `tpaadmin`@`%`;
GRANT SELECT ON admdb.currencies TO `tpaadmin`@`%`;
GRANT SELECT ON admdb.currency_histories TO `tpaadmin`@`%`;
GRANT SELECT ON admdb.teams TO `tpaadmin`@`%`;
GRANT SELECT ON admdb.time_dimension_company TO `tpaadmin`@`%`;
GRANT SELECT ON admdb.users TO `tpaadmin`@`%`;
-- trvadmin
GRANT SELECT ON admdb.cities TO `trvadmin`@`%`;
GRANT SELECT ON admdb.companies TO `trvadmin`@`%`;
GRANT SELECT ON admdb.companies_bank_holidays TO `trvadmin`@`%`;
GRANT SELECT ON admdb.company_country TO `trvadmin`@`%`;
GRANT SELECT ON admdb.countries TO `trvadmin`@`%`;
GRANT SELECT ON admdb.currencies TO `trvadmin`@`%`;
GRANT SELECT ON admdb.currency_histories TO `trvadmin`@`%`;
GRANT SELECT ON admdb.teams TO `trvadmin`@`%`;
GRANT SELECT ON admdb.time_dimension_company TO `trvadmin`@`%`;
GRANT SELECT ON admdb.users TO `trvadmin`@`%`;
--

