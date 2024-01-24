<?php require_once('../../Connections/idsconnection.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL =  "INSERT INTO credit_app_fullblown (credit_app_fullblown_id, applicant_did, applicant_sid, applicant_vid, applicant_cid, applicant_clid, applicant_app_token, applicant_sales_souce_lot, applicant_driver_licenses_number, applicant_driver_licenses_status, applicant_driver_state_issued, applicant_ssn, applicant_ssn4, applicant_dob, applicant_age, applicant_name, applicant_fname, applicant_mname, applicant_lname, applicant_other_name, applicant_maiden_name, applicant_main_phone, applicant_cell_phone, applicant_present_address1, applicant_present_address2, applicant_present_addr_city, applicant_present_addr_state, applicant_present_addr_zip, applicant_present_addr_county, applicant_addr_years, applicant_addr_months, applicant_addr_landlord_mortg, applicant_addr_landlord_address, applicant_addr_landlord_city, applicant_addr_landlord_state, applicant_addr_landlord_zip, applicant_addr_landlord_phone, applicant_name_oncurrent_lease, applicant_apart_or_house, applicant_buy_own_rent_other, applicant_house_payment, user_comments_app_notes, applicant_previous1_addr1, applicant_previous1_addr2, applicant_previous1_addr_city, applicant_previous1_addr_state, applicant_previous1_addr_zip, applicant_previous1_live_years, applicant_previous1_live_months, applicant_previous1_landlord_name, applicant_previous1_landlord_phone, applicant_previous2_addr1, applicant_previous2_addr2, applicant_previous2_addr_city, applicant_previous2_addr_state, applicant_previous2_addr_zip, applicant_previous2_live_years, applicant_previous2_live_months, applicant_previous2_landlord_name, applicant_previous2_landlord_phone, applicant_previous3_addr1, applicant_previous3_addr2, applicant_previous3_addr_city, applicant_previous3_addr_state, applicant_previous3_addr_zip, applicant_previous3_live_years, applicant_previous3_live_months, applicant_previous3_landlord_name, applicant_previous3_landlord_phone, applicant_employer1_name, applicant_employer1_addr, applicant_employer1_city, applicant_employer1_state, applicant_employer1_zip, applicant_employer1_phone, applicant_employer1_phone_ext, applicant_employer1_work_years, applicant_employer1_work_months, applicant_employer1_position, applicant_employer1_department, applicant_employer1_supervisors_name, applicant_employer1_supervisors_phone, applicant_employer1_hours_shift, applicant_employer1_salary_bringhome, applicant_employer1_payday_freq, applicant_employer_form_of_pymt, applicant_other_income_amount, applicant_other_income_source, applicant_other_income_when_rcvd, applicant_if_education_school_sys, user_applicant_employer_notes, applicant_employer2_name, applicant_employer2_addr, applicant_employer2_city, applicant_employer2_state, applicant_employer2_zip, applicant_employer2_phone, applicant_employer2_phone_ext, applicant_employer2_work_years, applicant_employer2_work_months, applicant_employer2_position, applicant_employer2_department, applicant_employer2_supervisors_name, applicant_employer2_supervisors_phone, applicant_employer2_hours_shift, applicant_employer2_salary_bringhome, applicant_employer2_payday_freq, applicant_employer2_form_of_pymt, applicant_employer3_name, applicant_employer3_addr, applicant_employer3_city, applicant_employer3_state, applicant_employer3_zip, applicant_employer3_phone, applicant_employer3_years, applicant_employer3_months, user_comments_employer_notes, co_applicant_name, co_applicant_fname, co_applicant_mname, co_applicant_lname, co_applicant_name_relationship, co_applicant_dob, co_applicant_age, co_applicant_ssn, co_applicant_ssn4, co_applicant_driver_licenses_no, co_applicant_driver_licenses_state, co_applicant_driver_licenses_status, co_applicant_home_phone, co_applicant_home_cell, co_applicant_email, co_applicant_present_addr1, co_applicant_present_addr2, co_applicant_present_addr_city, co_applicant_present_addr_state, co_applicant_present_addr_zip, co_applicant_home_pymt, co_applicant_present_addr_county, co_applicant_present_addr_live_years, co_applicant_present_addr_live_months, co_applicant_employer_name, co_applicant_employer_phone, co_applicant_employer_phone_ext, co_applicant_employer_addr, co_applicant_employer_addr2, co_applicant_employer_city, co_applicant_employer_state, co_applicant_employer_zip, co_applicant_employer_department, co_applicant_employer_postion, co_applicant_employer_supervisor_name, co_applicant_employer_supervisor_phone, co_applicant_employer_work_months, co_applicant_employer_work_years, co_applicant_employer_hours, co_applicant_employer_shift, co_applicant_income_source, co_applicant_other_income, co_applicant_income_bringhome, co_applicant_payday_frequency, applicant_last_vehicle_purchased, applicants_bank_name, applicants_checking_savings_acct#, applicant_initials_disclosure1, undersigned_authorization, federal_equal_act, applicant_initials_disclosure2, information_true_statement, applicant_signature, co_applicant_signature, salesperson_witness_signature, applicant_signed_input_date, loan_guarantor_signature, credit_app_last_modified, application_created_date, applicants_father_name, applicants_father_deceased, applicants_father_mainphone_number, applicants_father_address, applicants_mother_name, applicants_mother_deceased, applicants_mother_mainphone_number, applicants_mother_address, applicants_realative1_name, applicants_realative1_relationship, applicants_realative1_mainphone, applicants_realative1_address, applicants_realative1_address_city, applicants_realative1_address_state, applicants_realative1_address_zip, applicants_realative2_name, applicants_realative2_relationship, applicants_realative2_mainphone, applicants_realative2_address, applicants_realative3_name, applicants_realative3_relationship, applicants_realative3_mainphone, applicants_realative3_address, applicants_realative4_name, applicants_realative4_relationship, applicants_realative4_mainphone_number, applicants_realative4_address, applicants_realative5_name, applicants_realative5_relationship, applicants_realative5_mainphone_number, applicants_realative5_address, applicants_realative6_name, applicants_realative6_mainphone, applicants_realative6_address, applicants_realative7_name, applicants_realative7_relationship, applicants_realative7_mainphone, applicants_realative7_address, applicants_realative8_name, applicants_realative8_mainphone, applicants_realative8_address, applicants_realative9_name, applicants_realative9_mainphone, applicants_realative9_address, applicants_realative_comments, applicants_reposession, applicants_reposession_when, applicants_reposession_where, applicants_dependents_many, applicants_dependents1_name, applicants_dependents1_age, applicants_dependents1_grade, applicants_dependents1_school_name_location, applicants_dependents2_name, applicants_dependents2_age, applicants_dependents2_grade, applicants_dependents2_school_name_location, applicants_nondependents_many, applicants_nondependents1_name, applicants_nondependents1_age, applicants_nondependents1_cell_number, applicants_nondependents2_name, applicants_nondependents2_age, applicants_nondependents2_cell_number, applicant_email_address, co_applicants_email_address, applicant_have_a_computer, applicant_level_of_cpu_experience, applicant_acknowledge_equal_opportunity, applicant_hereby_authorize, equal_credit_opportunity_act, applicant_authorization, applicant_authorization_text, applicant_digital_signature, applicant_digital_signature_date, coapplicant_digital_signature, coapplicant_digital_signature_date) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['credit_app_fullblown_id'], "int"),
                       GetSQLValueString($_POST['applicant_did'], "int"),
                       GetSQLValueString($_POST['applicant_sid'], "int"),
                       GetSQLValueString($_POST['applicant_vid'], "int"),
                       GetSQLValueString($_POST['applicant_cid'], "int"),
                       GetSQLValueString($_POST['applicant_clid'], "int"),
                       GetSQLValueString($_POST['applicant_app_token'], "text"),
                       GetSQLValueString($_POST['applicant_sales_souce_lot'], "text"),
                       GetSQLValueString($_POST['applicant_driver_licenses_number'], "text"),
                       GetSQLValueString($_POST['applicant_driver_licenses_status'], "text"),
                       GetSQLValueString($_POST['applicant_driver_state_issued'], "text"),
                       GetSQLValueString($_POST['applicant_ssn'], "text"),
                       GetSQLValueString($_POST['applicant_ssn4'], "text"),
                       GetSQLValueString($_POST['applicant_dob'], "text"),
                       GetSQLValueString($_POST['applicant_age'], "text"),
                       GetSQLValueString($_POST['applicant_name'], "text"),
                       GetSQLValueString($_POST['applicant_fname'], "text"),
                       GetSQLValueString($_POST['applicant_mname'], "text"),
                       GetSQLValueString($_POST['applicant_lname'], "text"),
                       GetSQLValueString($_POST['applicant_other_name'], "text"),
                       GetSQLValueString($_POST['applicant_maiden_name'], "text"),
                       GetSQLValueString($_POST['applicant_main_phone'], "text"),
                       GetSQLValueString($_POST['applicant_cell_phone'], "text"),
                       GetSQLValueString($_POST['applicant_present_address1'], "text"),
                       GetSQLValueString($_POST['applicant_present_address2'], "text"),
                       GetSQLValueString($_POST['applicant_present_addr_city'], "text"),
                       GetSQLValueString($_POST['applicant_present_addr_state'], "text"),
                       GetSQLValueString($_POST['applicant_present_addr_zip'], "text"),
                       GetSQLValueString($_POST['applicant_present_addr_county'], "text"),
                       GetSQLValueString($_POST['applicant_addr_years'], "text"),
                       GetSQLValueString($_POST['applicant_addr_months'], "text"),
                       GetSQLValueString($_POST['applicant_addr_landlord_mortg'], "text"),
                       GetSQLValueString($_POST['applicant_addr_landlord_address'], "text"),
                       GetSQLValueString($_POST['applicant_addr_landlord_city'], "text"),
                       GetSQLValueString($_POST['applicant_addr_landlord_state'], "text"),
                       GetSQLValueString($_POST['applicant_addr_landlord_zip'], "text"),
                       GetSQLValueString($_POST['applicant_addr_landlord_phone'], "text"),
                       GetSQLValueString($_POST['applicant_name_oncurrent_lease'], "text"),
                       GetSQLValueString($_POST['applicant_apart_or_house'], "text"),
                       GetSQLValueString($_POST['applicant_buy_own_rent_other'], "text"),
                       GetSQLValueString($_POST['applicant_house_payment'], "text"),
                       GetSQLValueString($_POST['user_comments_app_notes'], "text"),
                       GetSQLValueString($_POST['applicant_previous1_addr1'], "text"),
                       GetSQLValueString($_POST['applicant_previous1_addr2'], "text"),
                       GetSQLValueString($_POST['applicant_previous1_addr_city'], "text"),
                       GetSQLValueString($_POST['applicant_previous1_addr_state'], "text"),
                       GetSQLValueString($_POST['applicant_previous1_addr_zip'], "text"),
                       GetSQLValueString($_POST['applicant_previous1_live_years'], "text"),
                       GetSQLValueString($_POST['applicant_previous1_live_months'], "text"),
                       GetSQLValueString($_POST['applicant_previous1_landlord_name'], "text"),
                       GetSQLValueString($_POST['applicant_previous1_landlord_phone'], "text"),
                       GetSQLValueString($_POST['applicant_previous2_addr1'], "text"),
                       GetSQLValueString($_POST['applicant_previous2_addr2'], "text"),
                       GetSQLValueString($_POST['applicant_previous2_addr_city'], "text"),
                       GetSQLValueString($_POST['applicant_previous2_addr_state'], "text"),
                       GetSQLValueString($_POST['applicant_previous2_addr_zip'], "text"),
                       GetSQLValueString($_POST['applicant_previous2_live_years'], "text"),
                       GetSQLValueString($_POST['applicant_previous2_live_months'], "text"),
                       GetSQLValueString($_POST['applicant_previous2_landlord_name'], "text"),
                       GetSQLValueString($_POST['applicant_previous2_landlord_phone'], "text"),
                       GetSQLValueString($_POST['applicant_previous3_addr1'], "text"),
                       GetSQLValueString($_POST['applicant_previous3_addr2'], "text"),
                       GetSQLValueString($_POST['applicant_previous3_addr_city'], "text"),
                       GetSQLValueString($_POST['applicant_previous3_addr_state'], "text"),
                       GetSQLValueString($_POST['applicant_previous3_addr_zip'], "text"),
                       GetSQLValueString($_POST['applicant_previous3_live_years'], "text"),
                       GetSQLValueString($_POST['applicant_previous3_live_months'], "text"),
                       GetSQLValueString($_POST['applicant_previous3_landlord_name'], "text"),
                       GetSQLValueString($_POST['applicant_previous3_landlord_phone'], "text"),
                       GetSQLValueString($_POST['applicant_employer1_name'], "text"),
                       GetSQLValueString($_POST['applicant_employer1_addr'], "text"),
                       GetSQLValueString($_POST['applicant_employer1_city'], "text"),
                       GetSQLValueString($_POST['applicant_employer1_state'], "text"),
                       GetSQLValueString($_POST['applicant_employer1_zip'], "text"),
                       GetSQLValueString($_POST['applicant_employer1_phone'], "text"),
                       GetSQLValueString($_POST['applicant_employer1_phone_ext'], "text"),
                       GetSQLValueString($_POST['applicant_employer1_work_years'], "text"),
                       GetSQLValueString($_POST['applicant_employer1_work_months'], "text"),
                       GetSQLValueString($_POST['applicant_employer1_position'], "text"),
                       GetSQLValueString($_POST['applicant_employer1_department'], "text"),
                       GetSQLValueString($_POST['applicant_employer1_supervisors_name'], "text"),
                       GetSQLValueString($_POST['applicant_employer1_supervisors_phone'], "text"),
                       GetSQLValueString($_POST['applicant_employer1_hours_shift'], "text"),
                       GetSQLValueString($_POST['applicant_employer1_salary_bringhome'], "text"),
                       GetSQLValueString($_POST['applicant_employer1_payday_freq'], "text"),
                       GetSQLValueString($_POST['applicant_employer_form_of_pymt'], "text"),
                       GetSQLValueString($_POST['applicant_other_income_amount'], "text"),
                       GetSQLValueString($_POST['applicant_other_income_source'], "text"),
                       GetSQLValueString($_POST['applicant_other_income_when_rcvd'], "text"),
                       GetSQLValueString($_POST['applicant_if_education_school_sys'], "text"),
                       GetSQLValueString($_POST['user_applicant_employer_notes'], "text"),
                       GetSQLValueString($_POST['applicant_employer2_name'], "text"),
                       GetSQLValueString($_POST['applicant_employer2_addr'], "text"),
                       GetSQLValueString($_POST['applicant_employer2_city'], "text"),
                       GetSQLValueString($_POST['applicant_employer2_state'], "text"),
                       GetSQLValueString($_POST['applicant_employer2_zip'], "text"),
                       GetSQLValueString($_POST['applicant_employer2_phone'], "text"),
                       GetSQLValueString($_POST['applicant_employer2_phone_ext'], "text"),
                       GetSQLValueString($_POST['applicant_employer2_work_years'], "text"),
                       GetSQLValueString($_POST['applicant_employer2_work_months'], "text"),
                       GetSQLValueString($_POST['applicant_employer2_position'], "text"),
                       GetSQLValueString($_POST['applicant_employer2_department'], "text"),
                       GetSQLValueString($_POST['applicant_employer2_supervisors_name'], "text"),
                       GetSQLValueString($_POST['applicant_employer2_supervisors_phone'], "text"),
                       GetSQLValueString($_POST['applicant_employer2_hours_shift'], "text"),
                       GetSQLValueString($_POST['applicant_employer2_salary_bringhome'], "text"),
                       GetSQLValueString($_POST['applicant_employer2_payday_freq'], "text"),
                       GetSQLValueString($_POST['applicant_employer2_form_of_pymt'], "text"),
                       GetSQLValueString($_POST['applicant_employer3_name'], "text"),
                       GetSQLValueString($_POST['applicant_employer3_addr'], "text"),
                       GetSQLValueString($_POST['applicant_employer3_city'], "text"),
                       GetSQLValueString($_POST['applicant_employer3_state'], "text"),
                       GetSQLValueString($_POST['applicant_employer3_zip'], "text"),
                       GetSQLValueString($_POST['applicant_employer3_phone'], "text"),
                       GetSQLValueString($_POST['applicant_employer3_years'], "text"),
                       GetSQLValueString($_POST['applicant_employer3_months'], "text"),
                       GetSQLValueString($_POST['user_comments_employer_notes'], "text"),
                       GetSQLValueString($_POST['co_applicant_name'], "text"),
                       GetSQLValueString($_POST['co_applicant_fname'], "text"),
                       GetSQLValueString($_POST['co_applicant_mname'], "text"),
                       GetSQLValueString($_POST['co_applicant_lname'], "text"),
                       GetSQLValueString($_POST['co_applicant_name_relationship'], "text"),
                       GetSQLValueString($_POST['co_applicant_dob'], "text"),
                       GetSQLValueString($_POST['co_applicant_age'], "text"),
                       GetSQLValueString($_POST['co_applicant_ssn'], "text"),
                       GetSQLValueString($_POST['co_applicant_ssn4'], "text"),
                       GetSQLValueString($_POST['co_applicant_driver_licenses_no'], "text"),
                       GetSQLValueString($_POST['co_applicant_driver_licenses_state'], "text"),
                       GetSQLValueString($_POST['co_applicant_driver_licenses_status'], "text"),
                       GetSQLValueString($_POST['co_applicant_home_phone'], "text"),
                       GetSQLValueString($_POST['co_applicant_home_cell'], "text"),
                       GetSQLValueString($_POST['co_applicant_email'], "text"),
                       GetSQLValueString($_POST['co_applicant_present_addr1'], "text"),
                       GetSQLValueString($_POST['co_applicant_present_addr2'], "text"),
                       GetSQLValueString($_POST['co_applicant_present_addr_city'], "text"),
                       GetSQLValueString($_POST['co_applicant_present_addr_state'], "text"),
                       GetSQLValueString($_POST['co_applicant_present_addr_zip'], "text"),
                       GetSQLValueString($_POST['co_applicant_home_pymt'], "text"),
                       GetSQLValueString($_POST['co_applicant_present_addr_county'], "text"),
                       GetSQLValueString($_POST['co_applicant_present_addr_live_years'], "text"),
                       GetSQLValueString($_POST['co_applicant_present_addr_live_months'], "text"),
                       GetSQLValueString($_POST['co_applicant_employer_name'], "text"),
                       GetSQLValueString($_POST['co_applicant_employer_phone'], "text"),
                       GetSQLValueString($_POST['co_applicant_employer_phone_ext'], "text"),
                       GetSQLValueString($_POST['co_applicant_employer_addr'], "text"),
                       GetSQLValueString($_POST['co_applicant_employer_addr2'], "text"),
                       GetSQLValueString($_POST['co_applicant_employer_city'], "text"),
                       GetSQLValueString($_POST['co_applicant_employer_state'], "text"),
                       GetSQLValueString($_POST['co_applicant_employer_zip'], "int"),
                       GetSQLValueString($_POST['co_applicant_employer_department'], "text"),
                       GetSQLValueString($_POST['co_applicant_employer_postion'], "text"),
                       GetSQLValueString($_POST['co_applicant_employer_supervisor_name'], "text"),
                       GetSQLValueString($_POST['co_applicant_employer_supervisor_phone'], "text"),
                       GetSQLValueString($_POST['co_applicant_employer_work_months'], "int"),
                       GetSQLValueString($_POST['co_applicant_employer_work_years'], "int"),
                       GetSQLValueString($_POST['co_applicant_employer_hours'], "int"),
                       GetSQLValueString($_POST['co_applicant_employer_shift'], "text"),
                       GetSQLValueString($_POST['co_applicant_income_source'], "text"),
                       GetSQLValueString($_POST['co_applicant_other_income'], "text"),
                       GetSQLValueString($_POST['co_applicant_income_bringhome'], "text"),
                       GetSQLValueString($_POST['co_applicant_payday_frequency'], "text"),
                       GetSQLValueString($_POST['applicant_last_vehicle_purchased'], "text"),
                       GetSQLValueString($_POST['applicants_bank_name'], "text"),
                       GetSQLValueString($_POST['applicants_checking_savings_acct'], "text"),
                       GetSQLValueString($_POST['applicant_initials_disclosure1'], "text"),
                       GetSQLValueString($_POST['undersigned_authorization'], "text"),
                       GetSQLValueString($_POST['federal_equal_act'], "text"),
                       GetSQLValueString($_POST['applicant_initials_disclosure2'], "text"),
                       GetSQLValueString($_POST['information_true_statement'], "text"),
                       GetSQLValueString($_POST['applicant_signature'], "text"),
                       GetSQLValueString($_POST['co_applicant_signature'], "text"),
                       GetSQLValueString($_POST['salesperson_witness_signature'], "text"),
                       GetSQLValueString($_POST['applicant_signed_input_date'], "text"),
                       GetSQLValueString($_POST['loan_guarantor_signature'], "text"),
                       GetSQLValueString($_POST['credit_app_last_modified'], "date"),
                       GetSQLValueString($_POST['application_created_date'], "date"),
                       GetSQLValueString($_POST['applicants_father_name'], "text"),
                       GetSQLValueString($_POST['applicants_father_deceased'], "text"),
                       GetSQLValueString($_POST['applicants_father_mainphone_number'], "text"),
                       GetSQLValueString($_POST['applicants_father_address'], "text"),
                       GetSQLValueString($_POST['applicants_mother_name'], "text"),
                       GetSQLValueString($_POST['applicants_mother_deceased'], "text"),
                       GetSQLValueString($_POST['applicants_mother_mainphone_number'], "text"),
                       GetSQLValueString($_POST['applicants_mother_address'], "text"),
                       GetSQLValueString($_POST['applicants_realative1_name'], "text"),
                       GetSQLValueString($_POST['applicants_realative1_relationship'], "text"),
                       GetSQLValueString($_POST['applicants_realative1_mainphone'], "text"),
                       GetSQLValueString($_POST['applicants_realative1_address'], "text"),
                       GetSQLValueString($_POST['applicants_realative1_address_city'], "text"),
                       GetSQLValueString($_POST['applicants_realative1_address_state'], "text"),
                       GetSQLValueString($_POST['applicants_realative1_address_zip'], "text"),
                       GetSQLValueString($_POST['applicants_realative2_name'], "text"),
                       GetSQLValueString($_POST['applicants_realative2_relationship'], "text"),
                       GetSQLValueString($_POST['applicants_realative2_mainphone'], "text"),
                       GetSQLValueString($_POST['applicants_realative2_address'], "text"),
                       GetSQLValueString($_POST['applicants_realative3_name'], "text"),
                       GetSQLValueString($_POST['applicants_realative3_relationship'], "text"),
                       GetSQLValueString($_POST['applicants_realative3_mainphone'], "text"),
                       GetSQLValueString($_POST['applicants_realative3_address'], "text"),
                       GetSQLValueString($_POST['applicants_realative4_name'], "text"),
                       GetSQLValueString($_POST['applicants_realative4_relationship'], "text"),
                       GetSQLValueString($_POST['applicants_realative4_mainphone_number'], "text"),
                       GetSQLValueString($_POST['applicants_realative4_address'], "text"),
                       GetSQLValueString($_POST['applicants_realative5_name'], "text"),
                       GetSQLValueString($_POST['applicants_realative5_relationship'], "text"),
                       GetSQLValueString($_POST['applicants_realative5_mainphone_number'], "text"),
                       GetSQLValueString($_POST['applicants_realative5_address'], "text"),
                       GetSQLValueString($_POST['applicants_realative6_name'], "text"),
                       GetSQLValueString($_POST['applicants_realative6_mainphone'], "text"),
                       GetSQLValueString($_POST['applicants_realative6_address'], "text"),
                       GetSQLValueString($_POST['applicants_realative7_name'], "text"),
                       GetSQLValueString($_POST['applicants_realative7_relationship'], "text"),
                       GetSQLValueString($_POST['applicants_realative7_mainphone'], "text"),
                       GetSQLValueString($_POST['applicants_realative7_address'], "text"),
                       GetSQLValueString($_POST['applicants_realative8_name'], "text"),
                       GetSQLValueString($_POST['applicants_realative8_mainphone'], "text"),
                       GetSQLValueString($_POST['applicants_realative8_address'], "text"),
                       GetSQLValueString($_POST['applicants_realative9_name'], "text"),
                       GetSQLValueString($_POST['applicants_realative9_mainphone'], "text"),
                       GetSQLValueString($_POST['applicants_realative9_address'], "text"),
                       GetSQLValueString($_POST['applicants_realative_comments'], "text"),
                       GetSQLValueString($_POST['applicants_reposession'], "text"),
                       GetSQLValueString($_POST['applicants_reposession_when'], "text"),
                       GetSQLValueString($_POST['applicants_reposession_where'], "text"),
                       GetSQLValueString($_POST['applicants_dependents_many'], "text"),
                       GetSQLValueString($_POST['applicants_dependents1_name'], "text"),
                       GetSQLValueString($_POST['applicants_dependents1_age'], "text"),
                       GetSQLValueString($_POST['applicants_dependents1_grade'], "text"),
                       GetSQLValueString($_POST['applicants_dependents1_school_name_location'], "text"),
                       GetSQLValueString($_POST['applicants_dependents2_name'], "text"),
                       GetSQLValueString($_POST['applicants_dependents2_age'], "text"),
                       GetSQLValueString($_POST['applicants_dependents2_grade'], "text"),
                       GetSQLValueString($_POST['applicants_dependents2_school_name_location'], "text"),
                       GetSQLValueString($_POST['applicants_nondependents_many'], "text"),
                       GetSQLValueString($_POST['applicants_nondependents1_name'], "text"),
                       GetSQLValueString($_POST['applicants_nondependents1_age'], "text"),
                       GetSQLValueString($_POST['applicants_nondependents1_cell_number'], "text"),
                       GetSQLValueString($_POST['applicants_nondependents2_name'], "text"),
                       GetSQLValueString($_POST['applicants_nondependents2_age'], "text"),
                       GetSQLValueString($_POST['applicants_nondependents2_cell_number'], "text"),
                       GetSQLValueString($_POST['applicant_email_address'], "text"),
                       GetSQLValueString($_POST['co_applicants_email_address'], "text"),
                       GetSQLValueString($_POST['applicant_have_a_computer'], "text"),
                       GetSQLValueString($_POST['applicant_level_of_cpu_experience'], "text"),
                       GetSQLValueString($_POST['applicant_acknowledge_equal_opportunity'], "text"),
                       GetSQLValueString($_POST['applicant_hereby_authorize'], "text"),
                       GetSQLValueString($_POST['equal_credit_opportunity_act'], "text"),
                       GetSQLValueString($_POST['applicant_authorization'], "text"),
                       GetSQLValueString($_POST['applicant_authorization_text'], "text"),
                       GetSQLValueString($_POST['applicant_digital_signature'], "text"),
                       GetSQLValueString($_POST['applicant_digital_signature_date'], "text"),
                       GetSQLValueString($_POST['coapplicant_digital_signature'], "text"),
                       GetSQLValueString($_POST['coapplicant_digital_signature_date'], "text"));

  mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
  $Result1 = mysqli_query($idsconnection_mysqli, $insertSQL);
}

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_slct_dlr = "SELECT * FROM dealers WHERE id = 19";
$slct_dlr = mysqli_query($idsconnection_mysqli, $query_slct_dlr);
$row_slct_dlr = mysqli_fetch_assoc($slct_dlr);
$totalRows_slct_dlr = mysqli_num_rows($slct_dlr);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_states = "SELECT * FROM states";
$states = mysqli_query($idsconnection_mysqli, $query_states);
$row_states = mysqli_fetch_assoc($states);
$totalRows_states = mysqli_num_rows($states);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_year_options = "SELECT * FROM year_options";
$year_options = mysqli_query($idsconnection_mysqli, $query_year_options);
$row_year_options = mysqli_fetch_assoc($year_options);
$totalRows_year_options = mysqli_num_rows($year_options);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_month_options = "SELECT * FROM months_options";
$month_options = mysqli_query($idsconnection_mysqli, $query_month_options);
$row_month_options = mysqli_fetch_assoc($month_options);
$totalRows_month_options = mysqli_num_rows($month_options);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Full blown wizard-made</title>
</head>

<body>
<form method="post" name="form1" action="<?php echo $editFormAction; ?>">
  <table align="center">
    <tr valign="baseline">
      <td nowrap align="right">Applicant_driver_licenses_number:</td>
      <td><input type="text" name="applicant_driver_licenses_number" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_driver_licenses_status:</td>
      <td><select name="applicant_driver_licenses_status">
        <option value="" >Select Status</option>
        <option value="Valid" <?php if (!(strcmp("Valid", ""))) {echo "SELECTED";} ?>>Valid</option>
        <option value="Expired" <?php if (!(strcmp("Expired", ""))) {echo "SELECTED";} ?>>Expired</option>
        <option value="Suspended" <?php if (!(strcmp("Suspended", ""))) {echo "SELECTED";} ?>>Suspended</option>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_driver_state_issued:</td>
      <td><select name="applicant_driver_state_issued">
        <option value="" >Select State</option>
        <?php
do {  
?>
        <option value="<?php echo $row_states['state_abrv']?>"><?php echo $row_states['state_abrv']?></option>
        <?php
} while ($row_states = mysqli_fetch_assoc($states));
  $rows = mysqli_num_rows($states);
  if($rows > 0) {
      mysqli_data_seek($states, 0);
	  $row_states = mysqli_fetch_assoc($states);
  }
?>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_ssn:</td>
      <td><input type="text" name="applicant_ssn" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_ssn4:</td>
      <td><input type="text" name="applicant_ssn4" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_dob:</td>
      <td><input type="text" name="applicant_dob" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_age:</td>
      <td><input type="text" name="applicant_age" id="applicant_age"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_name:</td>
      <td><input type="text" name="applicant_name" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_fname:</td>
      <td><input type="text" name="applicant_fname" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_mname:</td>
      <td><input type="text" name="applicant_mname" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_lname:</td>
      <td><input type="text" name="applicant_lname" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_other_name:</td>
      <td><input type="text" name="applicant_other_name" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_maiden_name:</td>
      <td><input type="text" name="applicant_maiden_name" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_main_phone:</td>
      <td><input type="text" name="applicant_main_phone" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_cell_phone:</td>
      <td><input type="text" name="applicant_cell_phone" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_present_address1:</td>
      <td><input type="text" name="applicant_present_address1" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_present_address2:</td>
      <td><input type="text" name="applicant_present_address2" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_present_addr_city:</td>
      <td><input type="text" name="applicant_present_addr_city" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_present_addr_state:</td>
      <td><select name="applicant_present_addr_state">
        <option value="" >Select State</option>
        <?php
do {  
?>
        <option value="<?php echo $row_states['state_abrv']?>"><?php echo $row_states['state_abrv']?></option>
        <?php
} while ($row_states = mysqli_fetch_assoc($states));
  $rows = mysqli_num_rows($states);
  if($rows > 0) {
      mysqli_data_seek($states, 0);
	  $row_states = mysqli_fetch_assoc($states);
  }
?>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_present_addr_zip:</td>
      <td><input type="text" name="applicant_present_addr_zip" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_present_addr_county:</td>
      <td><input type="text" name="applicant_present_addr_county" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_addr_years:</td>
      <td><select name="applicant_addr_years">
        <option value="" >Select Years</option>
        <?php
do {  
?>
        <option value="<?php echo $row_year_options['year_value']?>"><?php echo $row_year_options['year_name']?></option>
        <?php
} while ($row_year_options = mysqli_fetch_assoc($year_options));
  $rows = mysqli_num_rows($year_options);
  if($rows > 0) {
      mysqli_data_seek($year_options, 0);
	  $row_year_options = mysqli_fetch_assoc($year_options);
  }
?>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_addr_months:</td>
      <td><select name="applicant_addr_months">
        <option value="" >Select Months</option>
        <?php
do {  
?>
        <option value="<?php echo $row_month_options['month_value']?>"><?php echo $row_month_options['month_name']?></option>
        <?php
} while ($row_month_options = mysqli_fetch_assoc($month_options));
  $rows = mysqli_num_rows($month_options);
  if($rows > 0) {
      mysqli_data_seek($month_options, 0);
	  $row_month_options = mysqli_fetch_assoc($month_options);
  }
?>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_addr_landlord_mortg:</td>
      <td><input type="text" name="applicant_addr_landlord_mortg" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_addr_landlord_address:</td>
      <td><input type="text" name="applicant_addr_landlord_address" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_addr_landlord_city:</td>
      <td><input type="text" name="applicant_addr_landlord_city" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_addr_landlord_state:</td>
      <td><select name="applicant_addr_landlord_state">
        <option value="" >Select State</option>
        <?php
do {  
?>
        <option value="<?php echo $row_states['state_abrv']?>"><?php echo $row_states['state_abrv']?></option>
        <?php
} while ($row_states = mysqli_fetch_assoc($states));
  $rows = mysqli_num_rows($states);
  if($rows > 0) {
      mysqli_data_seek($states, 0);
	  $row_states = mysqli_fetch_assoc($states);
  }
?>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_addr_landlord_zip:</td>
      <td><input type="text" name="applicant_addr_landlord_zip" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_addr_landlord_phone:</td>
      <td><input type="text" name="applicant_addr_landlord_phone" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_name_oncurrent_lease:</td>
      <td><input type="text" name="applicant_name_oncurrent_lease" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_apart_or_house:</td>
      <td><input type="text" name="applicant_apart_or_house" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_buy_own_rent_other:</td>
      <td valign="baseline"><table>
        <tr>
          <td><input type="radio" name="applicant_buy_own_rent_other" value="Buy" >
            Buy</td>
        </tr>
        <tr>
          <td><input type="radio" name="applicant_buy_own_rent_other" value="Own" >
            Own</td>
        </tr>
        <tr>
          <td><input type="radio" name="applicant_buy_own_rent_other" value="Rent" >
            Rent</td>
        </tr>
        <tr>
          <td><input type="radio" name="applicant_buy_own_rent_other" value="Other" >
            Other</td>
        </tr>
      </table></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_house_payment:</td>
      <td><input type="text" name="applicant_house_payment" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_previous1_addr1:</td>
      <td><input type="text" name="applicant_previous1_addr1" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_previous1_addr2:</td>
      <td><input type="text" name="applicant_previous1_addr2" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_previous1_addr_city:</td>
      <td><input type="text" name="applicant_previous1_addr_city" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_previous1_addr_state:</td>
      <td><select name="applicant_previous1_addr_state">
        <option value="" >Select State</option>
        <?php
do {  
?>
        <option value="<?php echo $row_states['state_abrv']?>"><?php echo $row_states['state_abrv']?></option>
        <?php
} while ($row_states = mysqli_fetch_assoc($states));
  $rows = mysqli_num_rows($states);
  if($rows > 0) {
      mysqli_data_seek($states, 0);
	  $row_states = mysqli_fetch_assoc($states);
  }
?>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_previous1_addr_zip:</td>
      <td><input type="text" name="applicant_previous1_addr_zip" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_previous1_live_years:</td>
      <td><select name="applicant_previous1_live_years">
        <option value="" >Select Years</option>
        <?php
do {  
?>
        <option value="<?php echo $row_year_options['year_value']?>"><?php echo $row_year_options['year_name']?></option>
        <?php
} while ($row_year_options = mysqli_fetch_assoc($year_options));
  $rows = mysqli_num_rows($year_options);
  if($rows > 0) {
      mysqli_data_seek($year_options, 0);
	  $row_year_options = mysqli_fetch_assoc($year_options);
  }
?>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_previous1_live_months:</td>
      <td><select name="applicant_previous1_live_months">
        <option value="" >Select Months</option>
        <?php
do {  
?>
        <option value="<?php echo $row_month_options['month_value']?>"><?php echo $row_month_options['month_name']?></option>
        <?php
} while ($row_month_options = mysqli_fetch_assoc($month_options));
  $rows = mysqli_num_rows($month_options);
  if($rows > 0) {
      mysqli_data_seek($month_options, 0);
	  $row_month_options = mysqli_fetch_assoc($month_options);
  }
?>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_previous1_landlord_name:</td>
      <td><input type="text" name="applicant_previous1_landlord_name" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_previous1_landlord_phone:</td>
      <td><input type="text" name="applicant_previous1_landlord_phone" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_previous2_addr1:</td>
      <td><input type="text" name="applicant_previous2_addr1" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_previous2_addr2:</td>
      <td><input type="text" name="applicant_previous2_addr2" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_previous2_addr_city:</td>
      <td><input type="text" name="applicant_previous2_addr_city" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_previous2_addr_state:</td>
      <td><select name="applicant_previous2_addr_state">
        <option value="" >Select State</option>
        <?php
do {  
?>
        <option value="<?php echo $row_states['state_abrv']?>"><?php echo $row_states['state_abrv']?></option>
        <?php
} while ($row_states = mysqli_fetch_assoc($states));
  $rows = mysqli_num_rows($states);
  if($rows > 0) {
      mysqli_data_seek($states, 0);
	  $row_states = mysqli_fetch_assoc($states);
  }
?>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_previous2_addr_zip:</td>
      <td><input type="text" name="applicant_previous2_addr_zip" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_previous2_live_years:</td>
      <td><select name="applicant_previous2_live_years">
        <option value="" >Select Years</option>
        <?php
do {  
?>
        <option value="<?php echo $row_year_options['year_value']?>"><?php echo $row_year_options['year_name']?></option>
        <?php
} while ($row_year_options = mysqli_fetch_assoc($year_options));
  $rows = mysqli_num_rows($year_options);
  if($rows > 0) {
      mysqli_data_seek($year_options, 0);
	  $row_year_options = mysqli_fetch_assoc($year_options);
  }
?>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_previous2_live_months:</td>
      <td><select name="applicant_previous2_live_months">
        <option value="" >Select Months</option>
        <?php
do {  
?>
        <option value="<?php echo $row_month_options['month_value']?>"><?php echo $row_month_options['month_name']?></option>
        <?php
} while ($row_month_options = mysqli_fetch_assoc($month_options));
  $rows = mysqli_num_rows($month_options);
  if($rows > 0) {
      mysqli_data_seek($month_options, 0);
	  $row_month_options = mysqli_fetch_assoc($month_options);
  }
?>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_previous2_landlord_name:</td>
      <td><input type="text" name="applicant_previous2_landlord_name" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_previous2_landlord_phone:</td>
      <td><input type="text" name="applicant_previous2_landlord_phone" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_previous3_addr1:</td>
      <td><input type="text" name="applicant_previous3_addr1" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_previous3_addr2:</td>
      <td><input type="text" name="applicant_previous3_addr2" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_previous3_addr_city:</td>
      <td><input type="text" name="applicant_previous3_addr_city" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_previous3_addr_state:</td>
      <td><select name="applicant_previous3_addr_state">
        <option value="" >Select State</option>
        <?php
do {  
?>
        <option value="<?php echo $row_states['state_abrv']?>"><?php echo $row_states['state_abrv']?></option>
        <?php
} while ($row_states = mysqli_fetch_assoc($states));
  $rows = mysqli_num_rows($states);
  if($rows > 0) {
      mysqli_data_seek($states, 0);
	  $row_states = mysqli_fetch_assoc($states);
  }
?>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_previous3_addr_zip:</td>
      <td><input type="text" name="applicant_previous3_addr_zip" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_previous3_live_years:</td>
      <td><select name="applicant_previous3_live_years">
        <option value="" >Select Years</option>
        <?php
do {  
?>
        <option value="<?php echo $row_year_options['year_value']?>"><?php echo $row_year_options['year_name']?></option>
        <?php
} while ($row_year_options = mysqli_fetch_assoc($year_options));
  $rows = mysqli_num_rows($year_options);
  if($rows > 0) {
      mysqli_data_seek($year_options, 0);
	  $row_year_options = mysqli_fetch_assoc($year_options);
  }
?>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_previous3_live_months:</td>
      <td><select name="applicant_previous3_live_months">
        <option value="" >Select Months</option>
        <?php
do {  
?>
        <option value="<?php echo $row_month_options['month_value']?>"><?php echo $row_month_options['month_name']?></option>
        <?php
} while ($row_month_options = mysqli_fetch_assoc($month_options));
  $rows = mysqli_num_rows($month_options);
  if($rows > 0) {
      mysqli_data_seek($month_options, 0);
	  $row_month_options = mysqli_fetch_assoc($month_options);
  }
?>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_previous3_landlord_name:</td>
      <td><input type="text" name="applicant_previous3_landlord_name" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_previous3_landlord_phone:</td>
      <td><input type="text" name="applicant_previous3_landlord_phone" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_employer1_name:</td>
      <td><input type="text" name="applicant_employer1_name" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_employer1_addr:</td>
      <td><input type="text" name="applicant_employer1_addr" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_employer1_city:</td>
      <td><input type="text" name="applicant_employer1_city" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_employer1_state:</td>
      <td><select name="applicant_employer1_state">
        <option value="" >Select State</option>
        <?php
do {  
?>
        <option value="<?php echo $row_states['state_abrv']?>"><?php echo $row_states['state_abrv']?></option>
        <?php
} while ($row_states = mysqli_fetch_assoc($states));
  $rows = mysqli_num_rows($states);
  if($rows > 0) {
      mysqli_data_seek($states, 0);
	  $row_states = mysqli_fetch_assoc($states);
  }
?>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_employer1_zip:</td>
      <td><input type="text" name="applicant_employer1_zip" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_employer1_phone:</td>
      <td><input type="text" name="applicant_employer1_phone" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_employer1_phone_ext:</td>
      <td><input type="text" name="applicant_employer1_phone_ext" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_employer1_work_years:</td>
      <td><select name="applicant_employer1_work_years">
        <option value="" >Select Years</option>
        <?php
do {  
?>
        <option value="<?php echo $row_year_options['year_value']?>"><?php echo $row_year_options['year_name']?></option>
        <?php
} while ($row_year_options = mysqli_fetch_assoc($year_options));
  $rows = mysqli_num_rows($year_options);
  if($rows > 0) {
      mysqli_data_seek($year_options, 0);
	  $row_year_options = mysqli_fetch_assoc($year_options);
  }
?>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_employer1_work_months:</td>
      <td><select name="applicant_employer1_work_months">
        <option value="" >Select Months</option>
        <?php
do {  
?>
        <option value="<?php echo $row_month_options['month_value']?>"><?php echo $row_month_options['month_name']?></option>
        <?php
} while ($row_month_options = mysqli_fetch_assoc($month_options));
  $rows = mysqli_num_rows($month_options);
  if($rows > 0) {
      mysqli_data_seek($month_options, 0);
	  $row_month_options = mysqli_fetch_assoc($month_options);
  }
?>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_employer1_position:</td>
      <td><input type="text" name="applicant_employer1_position" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_employer1_department:</td>
      <td><input type="text" name="applicant_employer1_department" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_employer1_supervisors_name:</td>
      <td><input type="text" name="applicant_employer1_supervisors_name" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_employer1_supervisors_phone:</td>
      <td><input type="text" name="applicant_employer1_supervisors_phone" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_employer1_hours_shift:</td>
      <td><input type="text" name="applicant_employer1_hours_shift" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_employer1_salary_bringhome:</td>
      <td><input type="text" name="applicant_employer1_salary_bringhome" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_employer1_payday_freq:</td>
      <td valign="baseline"><table>
        <tr>
          <td><input type="radio" name="applicant_employer1_payday_freq" value="Daily" >
            Daily</td>
        </tr>
        <tr>
          <td><input type="radio" name="applicant_employer1_payday_freq" value="Weekly" >
            Weekly</td>
        </tr>
        <tr>
          <td><input type="radio" name="applicant_employer1_payday_freq" value="Bi-Weekly" >
            Bi-Weekly</td>
        </tr>
        <tr>
          <td><input type="radio" name="applicant_employer1_payday_freq" value="Monthly" >
            Monthly</td>
        </tr>
        <tr>
          <td><input type="radio" name="applicant_employer1_payday_freq" value="Annually" >
            Annually</td>
        </tr>
      </table></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_employer_form_of_pymt:</td>
      <td><input type="text" name="applicant_employer_form_of_pymt" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_other_income_amount:</td>
      <td><input type="text" name="applicant_other_income_amount" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_other_income_source:</td>
      <td><input type="text" name="applicant_other_income_source" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_other_income_when_rcvd:</td>
      <td><input type="text" name="applicant_other_income_when_rcvd" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_if_education_school_sys:</td>
      <td><input type="text" name="applicant_if_education_school_sys" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">User_applicant_employer_notes:</td>
      <td><input type="text" name="user_applicant_employer_notes" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_employer2_name:</td>
      <td><input type="text" name="applicant_employer2_name" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_employer2_addr:</td>
      <td><input type="text" name="applicant_employer2_addr" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_employer2_city:</td>
      <td><input type="text" name="applicant_employer2_city" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_employer2_state:</td>
      <td><select name="applicant_employer2_state" id="applicant_employer2_state">
        <option value="">Select State</option>
        <?php
do {  
?>
        <option value="<?php echo $row_states['state_abrv']?>"><?php echo $row_states['state_abrv']?></option>
        <?php
} while ($row_states = mysqli_fetch_assoc($states));
  $rows = mysqli_num_rows($states);
  if($rows > 0) {
      mysqli_data_seek($states, 0);
	  $row_states = mysqli_fetch_assoc($states);
  }
?>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_employer2_zip:</td>
      <td><input type="text" name="applicant_employer2_zip" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_employer2_phone:</td>
      <td><input type="text" name="applicant_employer2_phone" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_employer2_phone_ext:</td>
      <td><input type="text" name="applicant_employer2_phone_ext" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_employer2_work_years:</td>
      <td><select name="applicant_employer2_work_years" id="applicant_employer2_work_years">
        <option value="">Select Year</option>
        <?php
do {  
?>
        <option value="<?php echo $row_year_options['year_value']?>"><?php echo $row_year_options['year_name']?></option>
        <?php
} while ($row_year_options = mysqli_fetch_assoc($year_options));
  $rows = mysqli_num_rows($year_options);
  if($rows > 0) {
      mysqli_data_seek($year_options, 0);
	  $row_year_options = mysqli_fetch_assoc($year_options);
  }
?>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_employer2_work_months:</td>
      <td><select name="applicant_employer2_work_months" id="applicant_employer2_work_months">
        <option value="">Select Months</option>
        <?php
do {  
?>
        <option value="<?php echo $row_month_options['month_value']?>"><?php echo $row_month_options['month_name']?></option>
        <?php
} while ($row_month_options = mysqli_fetch_assoc($month_options));
  $rows = mysqli_num_rows($month_options);
  if($rows > 0) {
      mysqli_data_seek($month_options, 0);
	  $row_month_options = mysqli_fetch_assoc($month_options);
  }
?>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_employer2_position:</td>
      <td><input type="text" name="applicant_employer2_position" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_employer2_department:</td>
      <td><input type="text" name="applicant_employer2_department" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_employer2_supervisors_name:</td>
      <td><input type="text" name="applicant_employer2_supervisors_name" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_employer2_supervisors_phone:</td>
      <td><input type="text" name="applicant_employer2_supervisors_phone" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_employer2_hours_shift:</td>
      <td><input type="text" name="applicant_employer2_hours_shift" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_employer2_salary_bringhome:</td>
      <td><input type="text" name="applicant_employer2_salary_bringhome" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_employer2_payday_freq:</td>
      <td><input type="text" name="applicant_employer2_payday_freq" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_employer2_form_of_pymt:</td>
      <td><input type="text" name="applicant_employer2_form_of_pymt" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_employer3_name:</td>
      <td><input type="text" name="applicant_employer3_name" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_employer3_addr:</td>
      <td><input type="text" name="applicant_employer3_addr" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_employer3_city:</td>
      <td><input type="text" name="applicant_employer3_city" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_employer3_state:</td>
      <td><select name="applicant_employer3_state" id="applicant_employer3_state">
        <option value="">Select State</option>
        <?php
do {  
?>
        <option value="<?php echo $row_states['state_abrv']?>"><?php echo $row_states['state_abrv']?></option>
        <?php
} while ($row_states = mysqli_fetch_assoc($states));
  $rows = mysqli_num_rows($states);
  if($rows > 0) {
      mysqli_data_seek($states, 0);
	  $row_states = mysqli_fetch_assoc($states);
  }
?>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_employer3_zip:</td>
      <td><input type="text" name="applicant_employer3_zip" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_employer3_phone:</td>
      <td><input type="text" name="applicant_employer3_phone" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_employer3_years:</td>
      <td><select name="applicant_employer3_years" id="applicant_employer3_years">
        <option value="">Select Year</option>
        <?php
do {  
?>
        <option value="<?php echo $row_year_options['year_value']?>"><?php echo $row_year_options['year_name']?></option>
        <?php
} while ($row_year_options = mysqli_fetch_assoc($year_options));
  $rows = mysqli_num_rows($year_options);
  if($rows > 0) {
      mysqli_data_seek($year_options, 0);
	  $row_year_options = mysqli_fetch_assoc($year_options);
  }
?>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_employer3_months:</td>
      <td><select name="applicant_employer3_months" id="applicant_employer3_months">
        <option value="">Select Months</option>
        <?php
do {  
?>
        <option value="<?php echo $row_month_options['month_value']?>"><?php echo $row_month_options['month_name']?></option>
        <?php
} while ($row_month_options = mysqli_fetch_assoc($month_options));
  $rows = mysqli_num_rows($month_options);
  if($rows > 0) {
      mysqli_data_seek($month_options, 0);
	  $row_month_options = mysqli_fetch_assoc($month_options);
  }
?>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">User_comments_employer_notes:</td>
      <td><input type="text" name="user_comments_employer_notes" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Co_applicant_name:</td>
      <td><input type="text" name="co_applicant_name" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Co_applicant_fname:</td>
      <td><input type="text" name="co_applicant_fname" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Co_applicant_mname:</td>
      <td><input type="text" name="co_applicant_mname" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Co_applicant_lname:</td>
      <td><input type="text" name="co_applicant_lname" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Co_applicant_name_relationship:</td>
      <td><input type="text" name="co_applicant_name_relationship" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Co_applicant_dob:</td>
      <td><input type="text" name="co_applicant_dob" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Co_applicant_age:</td>
      <td><input type="text" name="co_applicant_age" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Co_applicant_ssn:</td>
      <td><input type="text" name="co_applicant_ssn" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Co_applicant_ssn4:</td>
      <td><input type="text" name="co_applicant_ssn4" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Co_applicant_driver_licenses_no:</td>
      <td><input type="text" name="co_applicant_driver_licenses_no" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Co_applicant_driver_licenses_state:</td>
      <td><select name="co_applicant_driver_licenses_state" id="co_applicant_driver_licenses_state">
        <option value="">Select State</option>
        <?php
do {  
?>
        <option value="<?php echo $row_states['state_abrv']?>"><?php echo $row_states['state_abrv']?></option>
        <?php
} while ($row_states = mysqli_fetch_assoc($states));
  $rows = mysqli_num_rows($states);
  if($rows > 0) {
      mysqli_data_seek($states, 0);
	  $row_states = mysqli_fetch_assoc($states);
  }
?>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Co_applicant_driver_licenses_status:</td>
      <td><input type="text" name="co_applicant_driver_licenses_status" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Co_applicant_home_phone:</td>
      <td><input type="text" name="co_applicant_home_phone" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Co_applicant_home_cell:</td>
      <td><input type="text" name="co_applicant_home_cell" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Co_applicant_email:</td>
      <td><input type="text" name="co_applicant_email" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Co_applicant_present_addr1:</td>
      <td><input type="text" name="co_applicant_present_addr1" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Co_applicant_present_addr2:</td>
      <td><input type="text" name="co_applicant_present_addr2" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Co_applicant_present_addr_city:</td>
      <td><input type="text" name="co_applicant_present_addr_city" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Co_applicant_present_addr_state:</td>
      <td><select name="co_applicant_present_addr_state" id="co_applicant_present_addr_state">
        <option value="">Select State</option>
        <?php
do {  
?>
        <option value="<?php echo $row_states['state_abrv']?>"><?php echo $row_states['state_abrv']?></option>
        <?php
} while ($row_states = mysqli_fetch_assoc($states));
  $rows = mysqli_num_rows($states);
  if($rows > 0) {
      mysqli_data_seek($states, 0);
	  $row_states = mysqli_fetch_assoc($states);
  }
?>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Co_applicant_present_addr_zip:</td>
      <td><input type="text" name="co_applicant_present_addr_zip" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Co_applicant_home_pymt:</td>
      <td><input type="text" name="co_applicant_home_pymt" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Co_applicant_present_addr_county:</td>
      <td><input type="text" name="co_applicant_present_addr_county" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Co_applicant_present_addr_live_years:</td>
      <td><input type="text" name="co_applicant_present_addr_live_years" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Co_applicant_present_addr_live_months:</td>
      <td><input type="text" name="co_applicant_present_addr_live_months" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Co_applicant_employer_name:</td>
      <td><input type="text" name="co_applicant_employer_name" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Co_applicant_employer_phone:</td>
      <td><input type="text" name="co_applicant_employer_phone" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Co_applicant_employer_phone_ext:</td>
      <td><input type="text" name="co_applicant_employer_phone_ext" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Co_applicant_employer_addr:</td>
      <td><input type="text" name="co_applicant_employer_addr" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Co_applicant_employer_addr2:</td>
      <td><input type="text" name="co_applicant_employer_addr2" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Co_applicant_employer_city:</td>
      <td><input type="text" name="co_applicant_employer_city" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Co_applicant_employer_state:</td>
      <td><select name="co_applicant_employer_state" id="co_applicant_employer_state">
        <option value="">Select State</option>
        <?php
do {  
?>
        <option value="<?php echo $row_states['state_abrv']?>"><?php echo $row_states['state_abrv']?></option>
        <?php
} while ($row_states = mysqli_fetch_assoc($states));
  $rows = mysqli_num_rows($states);
  if($rows > 0) {
      mysqli_data_seek($states, 0);
	  $row_states = mysqli_fetch_assoc($states);
  }
?>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Co_applicant_employer_zip:</td>
      <td><input type="text" name="co_applicant_employer_zip" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Co_applicant_employer_department:</td>
      <td><input type="text" name="co_applicant_employer_department" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Co_applicant_employer_postion:</td>
      <td><input type="text" name="co_applicant_employer_postion" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Co_applicant_employer_supervisor_name:</td>
      <td><input type="text" name="co_applicant_employer_supervisor_name" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Co_applicant_employer_supervisor_phone:</td>
      <td><input type="text" name="co_applicant_employer_supervisor_phone" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Co_applicant_employer_work_months:</td>
      <td><input type="text" name="co_applicant_employer_work_months" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Co_applicant_employer_work_years:</td>
      <td><input type="text" name="co_applicant_employer_work_years" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Co_applicant_employer_hours:</td>
      <td><input type="text" name="co_applicant_employer_hours" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Co_applicant_employer_shift:</td>
      <td><input type="text" name="co_applicant_employer_shift" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Co_applicant_income_source:</td>
      <td><input type="text" name="co_applicant_income_source" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Co_applicant_other_income:</td>
      <td><input type="text" name="co_applicant_other_income" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Co_applicant_income_bringhome:</td>
      <td><input type="text" name="co_applicant_income_bringhome" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Co_applicant_payday_frequency:</td>
      <td><input type="text" name="co_applicant_payday_frequency" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_last_vehicle_purchased:</td>
      <td><input type="text" name="applicant_last_vehicle_purchased" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicants_bank_name:</td>
      <td><input type="text" name="applicants_bank_name" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicants_checking_savings_acct#:</td>
      <td><input type="text" name="applicants_checking_savings_acct" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_initials_disclosure1:</td>
      <td><input type="text" name="applicant_initials_disclosure1" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Undersigned_authorization:</td>
      <td><input type="text" name="undersigned_authorization" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Federal_equal_act:</td>
      <td><input type="text" name="federal_equal_act" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_initials_disclosure2:</td>
      <td><input type="text" name="applicant_initials_disclosure2" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Information_true_statement:</td>
      <td><input type="text" name="information_true_statement" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_signature:</td>
      <td><input type="text" name="applicant_signature" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Co_applicant_signature:</td>
      <td><input type="text" name="co_applicant_signature" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Salesperson_witness_signature:</td>
      <td><input type="text" name="salesperson_witness_signature" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_signed_input_date:</td>
      <td><input type="text" name="applicant_signed_input_date" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Loan_guarantor_signature:</td>
      <td><input type="text" name="loan_guarantor_signature" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Credit_app_last_modified:</td>
      <td><input type="text" name="credit_app_last_modified" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Application_created_date:</td>
      <td><input type="text" name="application_created_date" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicants_father_name:</td>
      <td><input type="text" name="applicants_father_name" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicants_father_deceased:</td>
      <td><input type="text" name="applicants_father_deceased" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicants_father_mainphone_number:</td>
      <td><input type="text" name="applicants_father_mainphone_number" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicants_father_address:</td>
      <td><input type="text" name="applicants_father_address" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicants_mother_name:</td>
      <td><input type="text" name="applicants_mother_name" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicants_mother_deceased:</td>
      <td><input type="text" name="applicants_mother_deceased" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicants_mother_mainphone_number:</td>
      <td><input type="text" name="applicants_mother_mainphone_number" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicants_mother_address:</td>
      <td><input type="text" name="applicants_mother_address" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicants_realative1_name:</td>
      <td><input type="text" name="applicants_realative1_name" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicants_realative1_relationship:</td>
      <td><input type="text" name="applicants_realative1_relationship" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicants_realative1_mainphone:</td>
      <td><input type="text" name="applicants_realative1_mainphone" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicants_realative1_address:</td>
      <td><input type="text" name="applicants_realative1_address" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicants_realative1_address_city:</td>
      <td><input type="text" name="applicants_realative1_address_city" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicants_realative1_address_state:</td>
      <td><select name="select" id="select">
        <option value="">Select State</option>
        <?php
do {  
?>
        <option value="<?php echo $row_states['state_abrv']?>"><?php echo $row_states['state_abrv']?></option>
        <?php
} while ($row_states = mysqli_fetch_assoc($states));
  $rows = mysqli_num_rows($states);
  if($rows > 0) {
      mysqli_data_seek($states, 0);
	  $row_states = mysqli_fetch_assoc($states);
  }
?>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicants_realative1_address_zip:</td>
      <td><input type="text" name="applicants_realative1_address_zip" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicants_realative2_name:</td>
      <td><input type="text" name="applicants_realative2_name" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicants_realative2_relationship:</td>
      <td><input type="text" name="applicants_realative2_relationship" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicants_realative2_mainphone:</td>
      <td><input type="text" name="applicants_realative2_mainphone" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicants_realative2_address:</td>
      <td><input type="text" name="applicants_realative2_address" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicants_realative3_name:</td>
      <td><input type="text" name="applicants_realative3_name" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicants_realative3_relationship:</td>
      <td><input type="text" name="applicants_realative3_relationship" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicants_realative3_mainphone:</td>
      <td><input type="text" name="applicants_realative3_mainphone" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicants_realative3_address:</td>
      <td><input type="text" name="applicants_realative3_address" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicants_realative4_name:</td>
      <td><input type="text" name="applicants_realative4_name" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicants_realative4_relationship:</td>
      <td><input type="text" name="applicants_realative4_relationship" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicants_realative4_mainphone_number:</td>
      <td><input type="text" name="applicants_realative4_mainphone_number" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicants_realative4_address:</td>
      <td><input type="text" name="applicants_realative4_address" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicants_realative5_name:</td>
      <td><input type="text" name="applicants_realative5_name" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicants_realative5_relationship:</td>
      <td><input type="text" name="applicants_realative5_relationship" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicants_realative5_mainphone_number:</td>
      <td><input type="text" name="applicants_realative5_mainphone_number" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicants_realative5_address:</td>
      <td><input type="text" name="applicants_realative5_address" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicants_realative6_name:</td>
      <td><input type="text" name="applicants_realative6_name" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicants_realative6_mainphone:</td>
      <td><input type="text" name="applicants_realative6_mainphone" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicants_realative6_address:</td>
      <td><input type="text" name="applicants_realative6_address" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicants_realative7_name:</td>
      <td><input type="text" name="applicants_realative7_name" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicants_realative7_relationship:</td>
      <td><input type="text" name="applicants_realative7_relationship" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicants_realative7_mainphone:</td>
      <td><input type="text" name="applicants_realative7_mainphone" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicants_realative7_address:</td>
      <td><input type="text" name="applicants_realative7_address" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicants_realative8_name:</td>
      <td><input type="text" name="applicants_realative8_name" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicants_realative8_mainphone:</td>
      <td><input type="text" name="applicants_realative8_mainphone" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicants_realative8_address:</td>
      <td><input type="text" name="applicants_realative8_address" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicants_realative9_name:</td>
      <td><input type="text" name="applicants_realative9_name" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicants_realative9_mainphone:</td>
      <td><input type="text" name="applicants_realative9_mainphone" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicants_realative9_address:</td>
      <td><input type="text" name="applicants_realative9_address" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicants_realative_comments:</td>
      <td><input type="text" name="applicants_realative_comments" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicants_reposession:</td>
      <td><input type="text" name="applicants_reposession" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicants_reposession_when:</td>
      <td><input type="text" name="applicants_reposession_when" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicants_reposession_where:</td>
      <td><input type="text" name="applicants_reposession_where" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicants_dependents_many:</td>
      <td><input type="text" name="applicants_dependents_many" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicants_dependents1_name:</td>
      <td><input type="text" name="applicants_dependents1_name" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicants_dependents1_age:</td>
      <td><input type="text" name="applicants_dependents1_age" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicants_dependents1_grade:</td>
      <td><input type="text" name="applicants_dependents1_grade" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicants_dependents1_school_name_location:</td>
      <td><input type="text" name="applicants_dependents1_school_name_location" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicants_dependents2_name:</td>
      <td><input type="text" name="applicants_dependents2_name" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicants_dependents2_age:</td>
      <td><input type="text" name="applicants_dependents2_age" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicants_dependents2_grade:</td>
      <td><input type="text" name="applicants_dependents2_grade" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicants_dependents2_school_name_location:</td>
      <td><input type="text" name="applicants_dependents2_school_name_location" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicants_nondependents_many:</td>
      <td><input type="text" name="applicants_nondependents_many" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicants_nondependents1_name:</td>
      <td><input type="text" name="applicants_nondependents1_name" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicants_nondependents1_age:</td>
      <td><input type="text" name="applicants_nondependents1_age" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicants_nondependents1_cell_number:</td>
      <td><input type="text" name="applicants_nondependents1_cell_number" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicants_nondependents2_name:</td>
      <td><input type="text" name="applicants_nondependents2_name" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicants_nondependents2_age:</td>
      <td><input type="text" name="applicants_nondependents2_age" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicants_nondependents2_cell_number:</td>
      <td><input type="text" name="applicants_nondependents2_cell_number" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_email_address:</td>
      <td><input type="text" name="applicant_email_address" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Co_applicants_email_address:</td>
      <td><input type="text" name="co_applicants_email_address" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_have_a_computer:</td>
      <td><input type="text" name="applicant_have_a_computer" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_level_of_cpu_experience:</td>
      <td><input type="text" name="applicant_level_of_cpu_experience" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_acknowledge_equal_opportunity:</td>
      <td><input type="text" name="applicant_acknowledge_equal_opportunity" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_hereby_authorize:</td>
      <td><input type="text" name="applicant_hereby_authorize" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Equal_credit_opportunity_act:</td>
      <td><input type="text" name="equal_credit_opportunity_act" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_authorization:</td>
      <td><input type="text" name="applicant_authorization" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_authorization_text:</td>
      <td><input type="text" name="applicant_authorization_text" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_digital_signature:</td>
      <td><input type="text" name="applicant_digital_signature" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Applicant_digital_signature_date:</td>
      <td><input type="text" name="applicant_digital_signature_date" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Coapplicant_digital_signature:</td>
      <td><input type="text" name="coapplicant_digital_signature" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Coapplicant_digital_signature_date:</td>
      <td><input type="text" name="coapplicant_digital_signature_date" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td><input type="submit" value="Insert record"></td>
    </tr>
  </table>
  <input type="hidden" name="credit_app_fullblown_id" value="">
  <input type="hidden" name="applicant_did" value="">
  <input type="hidden" name="applicant_sid" value="">
  <input type="hidden" name="applicant_vid" value="">
  <input type="hidden" name="applicant_cid" value="">
  <input type="hidden" name="applicant_clid" value="">
  <input type="hidden" name="applicant_app_token" value="">
  <input type="hidden" name="applicant_sales_souce_lot" value="">
  <input type="hidden" name="user_comments_app_notes" value="">
  <input type="hidden" name="MM_insert" value="form1">
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysqli_free_result($slct_dlr);

mysqli_free_result($states);

mysqli_free_result($year_options);

mysqli_free_result($month_options);
?>
