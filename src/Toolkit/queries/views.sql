CREATE OR REPLACE VIEW prfdb.v_rdi AS select * from suitecrm.v_pqe_rdi_labeled;
-- users 
CREATE OR REPLACE VIEW bidnt_db.companies AS select * from admdb.companies;
CREATE OR REPLACE VIEW hrdb.companies AS select * from admdb.companies;
CREATE OR REPLACE VIEW hrtm.companies AS select * from admdb.companies;
CREATE OR REPLACE VIEW hrmc.companies AS select * from admdb.companies;
CREATE OR REPLACE VIEW prfdb.companies AS select * from admdb.companies;
CREATE OR REPLACE VIEW pqedb.companies AS select * from admdb.companies;
CREATE OR REPLACE VIEW tpa_db.companies AS select * from admdb.companies;
CREATE OR REPLACE VIEW template.companies AS select * from admdb.companies;
CREATE OR REPLACE VIEW travel_db.companies AS select * from admdb.companies;
-- 
CREATE OR REPLACE VIEW bidnt_db.time_dimension_company AS select * from admdb.time_dimension_company;
CREATE OR REPLACE VIEW hrdb.time_dimension_company AS select * from admdb.time_dimension_company;
CREATE OR REPLACE VIEW hrtm.time_dimension_company AS select * from admdb.time_dimension_company;
CREATE OR REPLACE VIEW hrmc.time_dimension_company AS select * from admdb.time_dimension_company;
CREATE OR REPLACE VIEW prfdb.time_dimension_company AS select * from admdb.time_dimension_company;
CREATE OR REPLACE VIEW pqedb.time_dimension_company AS select * from admdb.time_dimension_company;
CREATE OR REPLACE VIEW tpa_db.time_dimension_company AS select * from admdb.time_dimension_company;
CREATE OR REPLACE VIEW template.time_dimension_company AS select * from admdb.time_dimension_company;
CREATE OR REPLACE VIEW travel_db.time_dimension_company AS select * from admdb.time_dimension_company;
--
CREATE OR REPLACE VIEW bidnt_db.teams AS select * from admdb.teams;
CREATE OR REPLACE VIEW hrdb.teams AS select * from admdb.teams;
CREATE OR REPLACE VIEW hrtm.teams AS select * from admdb.teams;
CREATE OR REPLACE VIEW hrmc.teams AS select * from admdb.teams;
CREATE OR REPLACE VIEW prfdb.teams AS select * from admdb.teams;
CREATE OR REPLACE VIEW pqedb.teams AS select * from admdb.teams;
CREATE OR REPLACE VIEW tpa_db.teams AS select * from admdb.teams;
CREATE OR REPLACE VIEW template.teams AS select * from admdb.teams;
CREATE OR REPLACE VIEW travel_db.teams AS select * from admdb.teams;
--
CREATE OR REPLACE VIEW hrtm.salaries AS select * from hrdb.salaries;
--
CREATE OR REPLACE VIEW hrmc.resources AS SELECT * FROM hrdb.resources;
CREATE OR REPLACE VIEW hrtm.resources AS select * from hrdb.resources;
--
CREATE OR REPLACE VIEW pqedb.openai_cvs AS select * from hrtm.openai_cvs;
--
CREATE OR REPLACE VIEW hrmc.job_grades AS select * from hrdb.job_grades;
--
CREATE OR REPLACE VIEW bidnt_db.it_city_zipcode AS select * from admdb.it_city_zipcode;
CREATE OR REPLACE VIEW hrdb.it_city_zipcode AS select * from admdb.it_city_zipcode;
CREATE OR REPLACE VIEW hrtm.it_city_zipcode AS select * from admdb.it_city_zipcode;
CREATE OR REPLACE VIEW hrmc.it_city_zipcode AS select * from admdb.it_city_zipcode;
CREATE OR REPLACE VIEW prfdb.it_city_zipcode AS select * from admdb.it_city_zipcode;
CREATE OR REPLACE VIEW pqedb.it_city_zipcode AS select * from admdb.it_city_zipcode;
CREATE OR REPLACE VIEW tpa_db.it_city_zipcode AS select * from admdb.it_city_zipcode;
CREATE OR REPLACE VIEW template.it_city_zipcode AS select * from admdb.it_city_zipcode;
CREATE OR REPLACE VIEW travel_db.it_city_zipcode AS select * from admdb.it_city_zipcode;
--
CREATE OR REPLACE VIEW hrmc.grading AS select * from hrdb.grading;
--
CREATE OR REPLACE VIEW bidnt_db.currency_histories AS select * from admdb.currency_histories;
CREATE OR REPLACE VIEW hrdb.currency_histories AS select * from admdb.currency_histories;
CREATE OR REPLACE VIEW hrtm.currency_histories AS select * from admdb.currency_histories;
CREATE OR REPLACE VIEW hrmc.currency_histories AS select * from admdb.currency_histories;
CREATE OR REPLACE VIEW prfdb.currency_histories AS select * from admdb.currency_histories;
CREATE OR REPLACE VIEW pqedb.currency_histories AS select * from admdb.currency_histories;
CREATE OR REPLACE VIEW tpa_db.currency_histories AS select * from admdb.currency_histories;
CREATE OR REPLACE VIEW template.currency_histories AS select * from admdb.currency_histories;
CREATE OR REPLACE VIEW travel_db.currency_histories AS select * from admdb.currency_histories;
--
CREATE OR REPLACE VIEW bidnt_db.currencies AS select * from admdb.currencies;
CREATE OR REPLACE VIEW hrdb.currencies AS select * from admdb.currencies;
CREATE OR REPLACE VIEW hrtm.currencies AS select * from admdb.currencies;
CREATE OR REPLACE VIEW hrmc.currencies AS select * from admdb.currencies;
CREATE OR REPLACE VIEW prfdb.currencies AS select * from admdb.currencies;
CREATE OR REPLACE VIEW pqedb.currencies AS select * from admdb.currencies;
CREATE OR REPLACE VIEW tpa_db.currencies AS select * from admdb.currencies;
CREATE OR REPLACE VIEW template.currencies AS select * from admdb.currencies;
CREATE OR REPLACE VIEW travel_db.currencies AS select * from admdb.currencies;
--
CREATE OR REPLACE VIEW bidnt_db.countries AS select * from admdb.countries;
CREATE OR REPLACE VIEW hrdb.countries AS select * from admdb.countries;
CREATE OR REPLACE VIEW hrtm.countries AS select * from admdb.countries;
CREATE OR REPLACE VIEW hrmc.countries AS select * from admdb.countries;
CREATE OR REPLACE VIEW prfdb.countries AS select * from admdb.countries;
CREATE OR REPLACE VIEW pqedb.countries AS select * from admdb.countries;
CREATE OR REPLACE VIEW tpa_db.countries AS select * from admdb.countries;
CREATE OR REPLACE VIEW template.countries AS select * from admdb.countries;
CREATE OR REPLACE VIEW travel_db.countries AS select * from admdb.countries;
--
CREATE OR REPLACE VIEW hrtm.contracts AS select * from hrdb.contracts;
--
CREATE OR REPLACE VIEW hrtm.contract_details AS select * from hrdb.contract_details;
--
CREATE OR REPLACE VIEW bidnt_db.company_country AS select * from admdb.company_country;
CREATE OR REPLACE VIEW hrdb.company_country AS select * from admdb.company_country;
CREATE OR REPLACE VIEW hrtm.company_country AS select * from admdb.company_country;
CREATE OR REPLACE VIEW hrmc.company_country AS select * from admdb.company_country;
CREATE OR REPLACE VIEW prfdb.company_country AS select * from admdb.company_country;
CREATE OR REPLACE VIEW pqedb.company_country AS select * from admdb.company_country;
CREATE OR REPLACE VIEW tpa_db.company_country AS select * from admdb.company_country;
CREATE OR REPLACE VIEW template.company_country AS select * from admdb.company_country;
CREATE OR REPLACE VIEW travel_db.company_country AS select * from admdb.company_country;
--
CREATE OR REPLACE VIEW bidnt_db.companies_bank_holidays AS select * from admdb.companies_bank_holidays;
CREATE OR REPLACE VIEW hrdb.companies_bank_holidays AS select * from admdb.companies_bank_holidays;
CREATE OR REPLACE VIEW hrtm.companies_bank_holidays AS select * from admdb.companies_bank_holidays;
CREATE OR REPLACE VIEW hrmc.companies_bank_holidays AS select * from admdb.companies_bank_holidays;
CREATE OR REPLACE VIEW prfdb.companies_bank_holidays AS select * from admdb.companies_bank_holidays;
CREATE OR REPLACE VIEW pqedb.companies_bank_holidays AS select * from admdb.companies_bank_holidays;
CREATE OR REPLACE VIEW tpa_db.companies_bank_holidays AS select * from admdb.companies_bank_holidays;
CREATE OR REPLACE VIEW template.companies_bank_holidays AS select * from admdb.companies_bank_holidays;
CREATE OR REPLACE VIEW travel_db.companies_bank_holidays AS select * from admdb.companies_bank_holidays;
--
CREATE OR REPLACE VIEW bidnt_db.companies AS select * from admdb.companies;
CREATE OR REPLACE VIEW hrdb.companies AS select * from admdb.companies;
CREATE OR REPLACE VIEW hrtm.companies AS select * from admdb.companies;
CREATE OR REPLACE VIEW hrmc.companies AS select * from admdb.companies;
CREATE OR REPLACE VIEW prfdb.companies AS select * from admdb.companies;
CREATE OR REPLACE VIEW pqedb.companies AS select * from admdb.companies;
CREATE OR REPLACE VIEW tpa_db.companies AS select * from admdb.companies;
CREATE OR REPLACE VIEW template.companies AS select * from admdb.companies;
CREATE OR REPLACE VIEW travel_db.companies AS select * from admdb.companies;
--
CREATE OR REPLACE VIEW bidnt_db.cities AS select * from admdb.cities;
CREATE OR REPLACE VIEW hrdb.cities AS select * from admdb.cities;
CREATE OR REPLACE VIEW hrtm.cities AS select * from admdb.cities;
CREATE OR REPLACE VIEW hrmc.cities AS select * from admdb.cities;
CREATE OR REPLACE VIEW prfdb.cities AS select * from admdb.cities;
CREATE OR REPLACE VIEW pqedb.cities AS select * from admdb.cities;
CREATE OR REPLACE VIEW tpa_db.cities AS select * from admdb.cities;
CREATE OR REPLACE VIEW template.cities AS select * from admdb.cities;
CREATE OR REPLACE VIEW travel_db.cities AS select * from admdb.cities;
--

