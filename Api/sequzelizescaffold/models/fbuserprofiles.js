const Sequelize = require('sequelize');
module.exports = function(sequelize, DataTypes) {
  return sequelize.define('fbuserprofiles', {
    fbuser_id: {
      autoIncrement: true,
      type: DataTypes.BIGINT,
      allowNull: false,
      primaryKey: true
    },
    fbuser_primary_did: {
      type: DataTypes.INTEGER,
      allowNull: true,
      comment: "Dealer ID"
    },
    fbuser_primary_sid: {
      type: DataTypes.INTEGER,
      allowNull: true,
      comment: "Sales Person ID"
    },
    sales_person_nametxt: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    fbuser_primary_vid: {
      type: DataTypes.INTEGER,
      allowNull: true,
      comment: "Vehicle ID"
    },
    fbuser_primary_cid: {
      type: DataTypes.INTEGER,
      allowNull: true,
      comment: "Customer ID"
    },
    fbuser_primary_clid: {
      type: DataTypes.INTEGER,
      allowNull: true,
      comment: "Customer Lead ID"
    },
    fbuser_fbid: {
      type: DataTypes.STRING(250),
      allowNull: true
    },
    fbuser_fbsessionid: {
      type: DataTypes.STRING(250),
      allowNull: true
    },
    fbuser_fbpicture: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    fbuser_tokenid: {
      type: DataTypes.STRING(500),
      allowNull: true,
      comment: "Private Token"
    },
    fbfullname: {
      type: DataTypes.STRING(100),
      allowNull: true
    },
    fbsex: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    fbprofile_last_ip: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    fbprofile_broswer: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    fbprofile_mobile: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    fb_desired_carpayment: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    fb_income_years: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    fb_income_months: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    fb_monthly_income: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    fbuser_email_address: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    fbuser_fbemail: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    fbuser_username: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    fbuser_password: {
      type: DataTypes.STRING(20),
      allowNull: false
    },
    fbuser_verified: {
      type: DataTypes.INTEGER,
      allowNull: true,
      comment: "verified email verification"
    },
    fbuser_status: {
      type: DataTypes.INTEGER,
      allowNull: true,
      comment: "1=yes 2=no Agreed to terms and is active"
    },
    fb_onlinetime: {
      type: DataTypes.DATE,
      allowNull: true
    },
    fbuser_appt_set: {
      type: DataTypes.TEXT,
      allowNull: true,
      comment: "set_by facebook user"
    },
    joint_or_invidividual: {
      type: DataTypes.INTEGER,
      allowNull: true,
      comment: "1 = Joint, 0 = Individual"
    },
    credit_app_type: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    app_approval_status: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    credit_app_source: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicant_bestapptdatetime: {
      type: DataTypes.DATE,
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
    applicant_ssn: {
      type: DataTypes.STRING(20),
      allowNull: true
    },
    applicant_ssn4: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    applicant_dob: {
      type: DataTypes.TEXT,
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
      allowNull: true
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
    applicant_employer1_name: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    applicant_employer1_addr: {
      type: DataTypes.STRING(50),
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
    applicant_if_education_school_sys: {
      type: DataTypes.STRING(150),
      allowNull: true,
      comment: "School Or School System"
    },
    user_applicant_employer_notes: {
      type: DataTypes.TEXT,
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
    co_applicant_home_cell: {
      type: DataTypes.STRING(20),
      allowNull: true
    },
    co_applicant_email: {
      type: DataTypes.STRING(150),
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
      type: DataTypes.INTEGER,
      allowNull: true
    },
    co_applicant_employer_work_years: {
      type: DataTypes.INTEGER,
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
    co_applicant_other_income: {
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
    applicant_last_vehicle_purchased: {
      type: DataTypes.STRING(10),
      allowNull: true,
      comment: "dealer, city, & state"
    },
    applicants_bank_name: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    'applicants_checking_savings_acct#': {
      type: DataTypes.STRING(50),
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
    applicants_realative1_name: {
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
    applicants_realative2_name: {
      type: DataTypes.STRING(150),
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
    applicants_realative3_name: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicants_realative3_relationship: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicants_realative3_mainphone: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicants_realative3_address: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicants_realative4_name: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicants_realative4_relationship: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicants_realative4_mainphone_number: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicants_realative4_address: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicants_realative5_name: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicants_realative5_relationship: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicants_realative5_mainphone_number: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicants_realative5_address: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicants_realative6_name: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicants_realative6_mainphone: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicants_realative6_address: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicants_realative7_name: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicants_realative7_relationship: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicants_realative7_mainphone: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicants_realative7_address: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicants_realative8_name: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicants_realative8_mainphone: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicants_realative8_address: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicants_realative9_name: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicants_realative9_mainphone: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    applicants_realative9_address: {
      type: DataTypes.STRING(150),
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
    tableName: 'fbuserprofiles',
    timestamps: false,
    indexes: [
      {
        name: "PRIMARY",
        unique: true,
        using: "BTREE",
        fields: [
          { name: "fbuser_id" },
        ]
      },
      {
        name: "applicant_app_token",
        using: "BTREE",
        fields: [
          { name: "fbuser_tokenid", length: 333 },
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
