const Sequelize = require('sequelize');
module.exports = function(sequelize, DataTypes) {
  return sequelize.define('credit_app_fullblown', {
    credit_app_fullblown_id: {
      autoIncrement: true,
      type: DataTypes.BIGINT,
      allowNull: false,
      primaryKey: true
    },
    credit_app_locked: {
      type: DataTypes.INTEGER,
      allowNull: true,
      comment: "App Can't Be Changed"
    },
    app_number: {
      type: DataTypes.INTEGER,
      allowNull: true,
      comment: "Application number related to dealer from 1000"
    },
    app_deal_number: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    app_deal_id: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    app_appointment_id: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    datetimeDeleted: {
      type: DataTypes.STRING(30),
      allowNull: true,
      comment: "Date This App Was Deleted"
    },
    dealerwhoDeleted: {
      type: DataTypes.INTEGER,
      allowNull: true,
      comment: "Dealer Who Deleted"
    },
    applicant_did: {
      type: DataTypes.INTEGER,
      allowNull: true,
      comment: "Dealer ID"
    },
    applicant_sid: {
      type: DataTypes.INTEGER,
      allowNull: true,
      comment: "Sales Person ID"
    },
    applicant_sid_name: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    applicant_sid2: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    applicant_sid2_name: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    applicant_vid: {
      type: DataTypes.INTEGER,
      allowNull: true,
      comment: "Vehicle ID"
    },
    applicant_cid: {
      type: DataTypes.INTEGER,
      allowNull: true,
      comment: "Customer ID"
    },
    applicant_clid: {
      type: DataTypes.INTEGER,
      allowNull: true,
      comment: "Customer Lead ID"
    },
    applicant_ip: {
      type: DataTypes.STRING(20),
      allowNull: true
    },
    applicant_broswer: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    applicant_mobile: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    applicant_referer: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    chat_visitor_id: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    applicant_app_token: {
      type: DataTypes.STRING(500),
      allowNull: true,
      comment: "Private Token"
    },
    joint_or_invidividual: {
      type: DataTypes.INTEGER,
      allowNull: true,
      comment: "1 = Joint, 0 = Individual"
    },
    applicant_app_joint_token: {
      type: DataTypes.STRING(500),
      allowNull: true
    },
    applicant_app_joint_fullname: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    credit_app_type: {
      type: DataTypes.INTEGER,
      allowNull: true,
      comment: "finance_type"
    },
    credit_app_source: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicant_driver_licenses_number: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    applicant_driver_licenses_status: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    applicant_driver_state_issued: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    applicant_driver_licenses_expdate: {
      type: DataTypes.STRING(20),
      allowNull: true
    },
    applicant_ssn: {
      type: DataTypes.STRING(20),
      allowNull: true
    },
    applicant_ssn4: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    applicant_dob: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    applicant_age: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    applicant_sales_souce_lot: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    applicant_titlename: {
      type: DataTypes.STRING(10),
      allowNull: true,
      comment: "Applicants Title Name Mr. Mrs Dr. etc."
    },
    applicant_name: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    applicant_fname: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    applicant_mname: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    applicant_lname: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    applicant_suffixname: {
      type: DataTypes.STRING(10),
      allowNull: true,
      comment: "Applicants Suffix Name"
    },
    applicant_other_name: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    applicant_maiden_name: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    applicant_main_phone: {
      type: DataTypes.STRING(20),
      allowNull: true
    },
    applicant_cell_phone: {
      type: DataTypes.STRING(20),
      allowNull: true
    },
    applicant_residence_changes: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    applicant_present_address1: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicant_present_address2: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicant_present_addr_city: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    applicant_present_addr_state: {
      type: DataTypes.STRING(20),
      allowNull: true
    },
    applicant_present_addr_zip: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    applicant_present_addr_county: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    applicant_present_movindate: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    applicant_addr_years: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    applicant_addr_months: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    applicant_addr_landlord_mortg: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    applicant_addr_landlord_address: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    applicant_addr_landlord_city: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    applicant_addr_landlord_state: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    applicant_addr_landlord_zip: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    applicant_addr_landlord_phone: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    applicant_name_oncurrent_lease: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    applicant_apart_or_house: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    applicant_buy_own_rent_other: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    applicant_house_payment: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    user_comments_app_notes: {
      type: DataTypes.TEXT,
      allowNull: true,
      comment: "Comments About Applicant User\/Dealer\/Customer"
    },
    applicant_previous1_addr1: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    applicant_previous1_addr2: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    applicant_previous1_addr_city: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    applicant_previous1_addr_state: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    applicant_previous1_addr_zip: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    applicant_previous1_live_years: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    applicant_previous1_live_months: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    applicant_previous1_landlord_name: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    applicant_previous1_landlord_phone: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    applicant_previous2_addr1: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    applicant_previous2_addr2: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    applicant_previous2_addr_city: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    applicant_previous2_addr_state: {
      type: DataTypes.STRING(20),
      allowNull: true
    },
    applicant_previous2_addr_zip: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    applicant_previous2_live_years: {
      type: DataTypes.STRING(15),
      allowNull: true
    },
    applicant_previous2_live_months: {
      type: DataTypes.STRING(15),
      allowNull: true
    },
    applicant_previous2_landlord_name: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    applicant_previous2_landlord_phone: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    applicant_previous3_addr1: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    applicant_previous3_addr2: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    applicant_previous3_addr_city: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    applicant_previous3_addr_state: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    applicant_previous3_addr_zip: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    applicant_previous3_live_years: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    applicant_previous3_live_months: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    applicant_previous3_landlord_name: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    applicant_previous3_landlord_phone: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    user_comments_previousaddr_notes: {
      type: DataTypes.TEXT,
      allowNull: true,
      comment: "Notes about the customers previous addresses"
    },
    applicant_job_changes2yr: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    applicant_employment_type: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    applicant_employment_status: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    applicant_employer1_dateofhire: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    applicant_employer1_name: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    applicant_employer1_addr: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    applicant_employer1_addr2: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicant_employer1_city: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    applicant_employer1_state: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    applicant_employer1_zip: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    applicant_employer1_phone: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    applicant_employer1_phone_ext: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    applicant_employer1_work_years: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    applicant_employer1_work_months: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    applicant_employer1_position: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicant_employer1_department: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicant_employer1_supervisors_name: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicant_employer1_supervisors_phone: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicant_employer1_supervisors_phone_ext: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    applicant_employer1_hours_shift: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicant_employer1_salary_bringhome: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicant_employer1_payday_freq: {
      type: DataTypes.STRING(150),
      allowNull: true,
      comment: "monthly, bi-weekly, weekly, daily"
    },
    applicant_employer_form_of_pymt: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicant_other_income_amount: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicant_other_income_source: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicant_other_income_when_rcvd: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicant_alimonyamt: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    applicant_if_education_school_sys: {
      type: DataTypes.STRING(150),
      allowNull: true,
      comment: "School Or School System"
    },
    user_applicant_employer_notes: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    applicant_appt_startunixtime: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    applicant_employer2_name: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    applicant_employer2_addr: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    applicant_employer2_addr2: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicant_employer2_city: {
      type: DataTypes.STRING(20),
      allowNull: true
    },
    applicant_employer2_state: {
      type: DataTypes.STRING(20),
      allowNull: true
    },
    applicant_employer2_zip: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    applicant_employer2_phone: {
      type: DataTypes.STRING(20),
      allowNull: true
    },
    applicant_employer2_phone_ext: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    applicant_employer2_work_years: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    applicant_employer2_work_months: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    applicant_employer2_position: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicant_employer2_department: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicant_employer2_supervisors_name: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicant_employer2_supervisors_phone: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicant_employer2_hours_shift: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicant_employer2_salary_bringhome: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicant_employer2_payday_freq: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicant_employer2_form_of_pymt: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicant_employer3_name: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    applicant_employer3_addr: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    applicant_employer3_city: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    applicant_employer3_state: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    applicant_employer3_zip: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    applicant_employer3_phone: {
      type: DataTypes.STRING(20),
      allowNull: true
    },
    applicant_employer3_years: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    applicant_employer3_months: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    user_comments_employer_notes: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    co_applicant_titlename: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    co_applicant_name: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    co_applicant_fname: {
      type: DataTypes.STRING(150),
      allowNull: true,
      comment: "First Name"
    },
    co_applicant_mname: {
      type: DataTypes.STRING(150),
      allowNull: true,
      comment: "Middle Name"
    },
    co_applicant_lname: {
      type: DataTypes.STRING(150),
      allowNull: true,
      comment: "Last Name"
    },
    co_applicant_suffixname: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    co_applicant_name_relationship: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    co_applicant_dob: {
      type: DataTypes.STRING(20),
      allowNull: true
    },
    co_applicant_age: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    co_applicant_ssn: {
      type: DataTypes.STRING(15),
      allowNull: true
    },
    co_applicant_ssn4: {
      type: DataTypes.STRING(15),
      allowNull: true
    },
    co_applicant_driver_licenses_no: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    co_applicant_driver_licenses_state: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    co_applicant_driver_licenses_status: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    co_applicant_home_phone: {
      type: DataTypes.STRING(20),
      allowNull: true
    },
    co_applicant_cell_phone: {
      type: DataTypes.STRING(20),
      allowNull: true
    },
    co_applicant_email: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    co_applicant_email2: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    co_applicant_present_addr1: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    co_applicant_present_addr2: {
      type: DataTypes.STRING(20),
      allowNull: true
    },
    co_applicant_present_addr_city: {
      type: DataTypes.STRING(20),
      allowNull: true
    },
    co_applicant_present_addr_state: {
      type: DataTypes.STRING(20),
      allowNull: true
    },
    co_applicant_present_addr_zip: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    co_applicant_home_pymt: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    co_applicant_present_addr_county: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    co_applicant_present_addr_live_years: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    co_applicant_present_addr_live_months: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    co_applicant_previous1_addr1: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    co_applicant_previous1_addr2: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    co_applicant_previous1_addr_city: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    co_applicant_previous1_addr_state: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    co_applicant_previous1_addr_zip: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    co_applicant_previous1_live_years: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    co_applicant_previous1_live_months: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    co_applicant_apart_or_house: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    co_applicant_buy_own_rent_other: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    co_applicant_employment_type: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    co_applicant_employment_status: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    co_applicant_employer_position: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    co_applicant_employer_name: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    co_applicant_employer_phone: {
      type: DataTypes.STRING(20),
      allowNull: true
    },
    co_applicant_employer_phone_ext: {
      type: DataTypes.STRING(20),
      allowNull: true
    },
    co_applicant_employer_addr: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    co_applicant_employer_addr2: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    co_applicant_employer_city: {
      type: DataTypes.STRING(20),
      allowNull: true
    },
    co_applicant_employer_state: {
      type: DataTypes.STRING(20),
      allowNull: true
    },
    co_applicant_employer_zip: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    co_applicant_employer_department: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    co_applicant_employer_postion: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    co_applicant_employer_supervisor_name: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    co_applicant_employer_supervisor_phone: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    co_applicant_employer_work_months: {
      type: DataTypes.STRING(15),
      allowNull: true
    },
    co_applicant_employer_work_years: {
      type: DataTypes.STRING(15),
      allowNull: true
    },
    co_applicant_employer_hours: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    co_applicant_employer_shift: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    co_applicant_income_source: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    co_applicant_other_income_amount: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    co_applicant_other_income_when_rcvd: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    co_applicant_income_bringhome: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    co_applicant_payday_frequency: {
      type: DataTypes.STRING(10),
      allowNull: true,
      comment: "monthly\/bi-weekly\/weekly\/daily"
    },
    coapplicant_alimonyamt: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    co_applicant_employer2_name: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    co_applicant_employer2_work_years: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    co_applicant_employer2_work_months: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    co_applicant_addr_landlord_mortg: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    co_applicant_addr_landlord_mortgphoneno: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    co_applicant_employer2_addr: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    co_applicant_employer2_addr2: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    co_applicant_employer2_city: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    co_applicant_employer2_state: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    co_applicant_employer2_zip: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    co_applicant_employer2_position: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    co_applicant_employer2_phone: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    co_applicant_house_payment: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    co_applicants_bank_name: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    co_applicants_checking_savings_type: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    co_applicant_creditreference1: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    co_applicant_creditreference1bal: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    co_applicant_creditreference1monpay: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    co_applicant_creditreference2: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    co_applicant_creditreference2bal: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    co_applicant_creditreference2monpay: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    co_applicant_open_autoloan_cname: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    co_applicant_open_autoloan_acctno: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    co_applicant_open_autoloan_presntbal: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    co_applicant_open_autoloan_pymt: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    applicant_last_vehicle_purchased: {
      type: DataTypes.STRING(10),
      allowNull: true,
      comment: "dealer, city, & state"
    },
    applicant_open_to_refinanceautoloan: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    applilcant_v_ymkmd_txt: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    applilcant_v_asset_type: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    applilcant_v_intendeduse: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    applilcant_v_neworused: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    applilcant_v_stockno: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    applilcant_v_vin: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    applilcant_v_year: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    applilcant_v_make: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    applilcant_v_model: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    applilcant_v_style: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    applilcant_v_inception_miles: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    applicant_open_to_trading: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    applilcant_v_trade_year: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    applilcant_v_trade_make: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    applilcant_v_trade_model: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    applilcant_v_trade_vin: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    applilcant_v_trade_lien_holder_name: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    applilcant_v_cashprice: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    applilcant_v_taxes: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    applilcant_v_doc_fees: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    title_lic_reg_other_fees: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    applicant_desired_mo_payment: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    applilcant_v_cash_down: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    applilcant_v_rebate: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    applilcant_v_trade_allowance: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    applilcant_v_trade_owed: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    user_comments_trade_notes: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    applilcant_v_gap: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    applilcant_v_srvc_contract: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    applilcant_v_credit_life: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    applilcant_v_disability: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    applilcant_v_other_ins_svc: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    applilcant_v_financed_amount: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    applilcant_v_term_months: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    applilcant_v_cust_rate: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    applilcant_v_total_monthpmts_est: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    applilcant_v_wholesale_invoice: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    applilcant_v_msrp: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    applilcant_v_creditbureau_preferred: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    applicants_bank_name: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    applicants_checking_savings_type: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    'applicants_checking_savings_acct#': {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    applicant_creditreference1: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicant_creditreference1bal: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicant_creditreference1monpay: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicant_creditreference2: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicant_creditreference2bal: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicant_creditreference2monpay: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicant_open_autoloan: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    applicant_open_autoloan_cname: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicant_open_autoloan_acctno: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicant_open_autoloan_presntbal: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicant_open_autoloan_pymt: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicant_open_autoloan_pymthistry: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    applicant_initials_disclosure1: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    undersigned_authorization: {
      type: DataTypes.TEXT,
      allowNull: true,
      comment: "Defined Authorized Dealer "
    },
    federal_equal_act: {
      type: DataTypes.TEXT,
      allowNull: true,
      comment: "federal credit act"
    },
    applicant_initials_disclosure2: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    information_true_statement: {
      type: DataTypes.TEXT,
      allowNull: true,
      comment: "This Was Read by Customer Information True"
    },
    applicant_signature: {
      type: DataTypes.STRING(100),
      allowNull: true
    },
    co_applicant_signature: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    salesperson_witness_signature: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    applicant_signed_input_date: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    loan_guarantor_signature: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    credit_app_last_modified: {
      type: DataTypes.DATE,
      allowNull: true
    },
    application_created_date: {
      type: DataTypes.DATE,
      allowNull: true,
      defaultValue: Sequelize.Sequelize.literal('CURRENT_TIMESTAMP')
    },
    applicants_father_name: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    applicants_father_deceased: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    applicants_father_mainphone_number: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    applicants_father_address: {
      type: DataTypes.STRING(250),
      allowNull: true
    },
    applicants_mother_name: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    applicants_mother_deceased: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    applicants_mother_mainphone_number: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    applicants_mother_address: {
      type: DataTypes.STRING(250),
      allowNull: true
    },
    applicants_realative1_fname: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    applicants_realative1_lname: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    applicants_realative1_relationship: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicants_realative1_mainphone: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicants_realative1_address: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicants_realative1_address2: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    applicants_realative1_address_city: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicants_realative1_address_state: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicants_realative1_address_zip: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicants_realative2_lname: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicants_realative2_fname: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    applicants_realative2_relationship: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicants_realative2_mainphone: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicants_realative2_address: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicants_realative2_city: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    applicants_realative2_state: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    applicants_realative2_zip: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    applicants_realative_comments: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicants_reposession: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicants_reposession_when: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicants_reposession_where: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicants_dependents_many: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicants_dependents1_name: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicants_dependents1_age: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicants_dependents1_grade: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicants_dependents1_school_name_location: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicants_dependents2_name: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicants_dependents2_age: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicants_dependents2_grade: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicants_dependents2_school_name_location: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicants_nondependents_many: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicants_nondependents1_name: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicants_nondependents1_age: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicants_nondependents1_cell_number: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicants_nondependents2_name: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicants_nondependents2_age: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicants_nondependents2_cell_number: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicant_email_address: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicant_email_address2: {
      type: DataTypes.STRING(250),
      allowNull: true,
      comment: "business\/work\/ extra email address for primary applicant"
    },
    co_applicants_email_address: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicant_have_a_computer: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    applicant_level_of_cpu_experience: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    applicant_acknowledge_equal_opportunity: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    applicant_hereby_authorize: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    equal_credit_opportunity_act: {
      type: DataTypes.TEXT,
      allowNull: true,
      comment: "The Equal Credit Opportunity Text"
    },
    co_applicant_hereby_authorize: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    co_equal_credit_opportunity_act: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    applicant_authorization: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    applicant_authorization_text: {
      type: DataTypes.TEXT,
      allowNull: true,
      comment: "The Authorization Text Agreed Too:"
    },
    applicant_digital_signature: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    applicant_digital_signature_date: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    coapplicant_digital_signature: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    coapplicant_digital_signature_date: {
      type: DataTypes.TEXT,
      allowNull: true
    }
  }, {
    sequelize,
    tableName: 'credit_app_fullblown',
    timestamps: false,
    indexes: [
      {
        name: "PRIMARY",
        unique: true,
        using: "BTREE",
        fields: [
          { name: "credit_app_fullblown_id" },
        ]
      },
      {
        name: "applicant_app_token",
        using: "BTREE",
        fields: [
          { name: "applicant_app_token", length: 333 },
        ]
      },
      {
        name: "applicant_suffixname",
        using: "BTREE",
        fields: [
          { name: "applicant_suffixname" },
        ]
      },
      {
        name: "applicant_titlename",
        using: "BTREE",
        fields: [
          { name: "applicant_titlename" },
        ]
      },
      {
        name: "applicant_employment_status",
        using: "BTREE",
        fields: [
          { name: "applicant_employment_status" },
        ]
      },
      {
        name: "applicant_employment_type",
        using: "BTREE",
        fields: [
          { name: "applicant_employment_type" },
        ]
      },
      {
        name: "applicant_employer1_addr2",
        using: "BTREE",
        fields: [
          { name: "applicant_employer1_addr2" },
        ]
      },
      {
        name: "applicant_email_address2",
        using: "BTREE",
        fields: [
          { name: "applicant_email_address2" },
        ]
      },
      {
        name: "applicant_employer2_addr2",
        using: "BTREE",
        fields: [
          { name: "applicant_employer2_addr2" },
        ]
      },
      {
        name: "applicants_checking_savings_type",
        using: "BTREE",
        fields: [
          { name: "applicants_checking_savings_type" },
        ]
      },
      {
        name: "applicants_realative1_lname",
        using: "BTREE",
        fields: [
          { name: "applicants_realative1_lname" },
        ]
      },
      {
        name: "applicants_realative1_address2",
        using: "BTREE",
        fields: [
          { name: "applicants_realative1_address2" },
        ]
      },
      {
        name: "undersigned_authorization",
        type: "FULLTEXT",
        fields: [
          { name: "undersigned_authorization" },
        ]
      },
      {
        name: "federal_equal_act",
        type: "FULLTEXT",
        fields: [
          { name: "federal_equal_act" },
        ]
      },
      {
        name: "information_true_statement",
        type: "FULLTEXT",
        fields: [
          { name: "information_true_statement" },
        ]
      },
      {
        name: "equal_credit_opportunity_act",
        type: "FULLTEXT",
        fields: [
          { name: "equal_credit_opportunity_act" },
        ]
      },
      {
        name: "applicant_authorization_text",
        type: "FULLTEXT",
        fields: [
          { name: "applicant_authorization_text" },
        ]
      },
      {
        name: "user_comments_app_notes",
        type: "FULLTEXT",
        fields: [
          { name: "user_comments_app_notes" },
        ]
      },
      {
        name: "user_comments_previousaddr_notes",
        type: "FULLTEXT",
        fields: [
          { name: "user_comments_previousaddr_notes" },
        ]
      },
      {
        name: "user_comments_employer_notes",
        type: "FULLTEXT",
        fields: [
          { name: "user_comments_employer_notes" },
        ]
      },
    ]
  });
};
