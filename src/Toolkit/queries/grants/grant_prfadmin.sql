GRANT SELECT ON suitecrm.pqe_rdi TO `prfadmin`@`%`;
GRANT VIEW ON suitecrm.v_pqe_rdi_labeled TO `prfadmin`@`%`;

GRANT SELECT ON admdb.companies TO `prfadmin`@`%`;
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
--
