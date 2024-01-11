var DataTypes = require("sequelize").DataTypes;
var _account_person = require("./account_person");
var _account_person_photos = require("./account_person_photos");
var _articles = require("./articles");
var _auto_years = require("./auto_years");
var _body_styles = require("./body_styles");
var _busines_hours = require("./busines_hours");
var _calendar|timezones = require("./calendar|timezones");
var _car_make = require("./car_make");
var _car_model = require("./car_model");
var _car_years = require("./car_years");
var _colors_hex = require("./colors_hex");
var _credit_app_emp_types = require("./credit_app_emp_types");
var _credit_app_fullblown = require("./credit_app_fullblown");
var _credit_app_income_intervals = require("./credit_app_income_intervals");
var _credit_app_notes = require("./credit_app_notes");
var _credit_app_residence_intervals = require("./credit_app_residence_intervals");
var _credit_app_types = require("./credit_app_types");
var _cust_lead_notes = require("./cust_lead_notes");
var _cust_lead_source = require("./cust_lead_source");
var _cust_leads = require("./cust_leads");
var _cust_leads_emails = require("./cust_leads_emails");
var _customer_notes = require("./customer_notes");
var _customers = require("./customers");
var _dealer_depts = require("./dealer_depts");
var _dealer_types = require("./dealer_types");
var _dealers = require("./dealers");
var _dealers_appointments = require("./dealers_appointments");
var _dealers_news = require("./dealers_news");
var _dealers_news_response = require("./dealers_news_response");
var _dealers_pending = require("./dealers_pending");
var _dealers_photos = require("./dealers_photos");
var _dealers_tasks = require("./dealers_tasks");
var _dealers_teams = require("./dealers_teams");
var _dealers_teams_photos = require("./dealers_teams_photos");
var _dealers_unsubscribed = require("./dealers_unsubscribed");
var _deals_bydealer = require("./deals_bydealer");
var _dudes = require("./dudes");
var _dudes_dlr_notes = require("./dudes_dlr_notes");
var _dudes_sys_htmlemail_templates = require("./dudes_sys_htmlemail_templates");
var _email_dealer_templates = require("./email_dealer_templates");
var _email_dealer_templates_types = require("./email_dealer_templates_types");
var _email_dealers_htmlsent = require("./email_dealers_htmlsent");
var _engines = require("./engines");
var _fbuserprofiles = require("./fbuserprofiles");
var _ferrari_dm = require("./ferrari_dm");
var _ids_chargestoinvoice = require("./ids_chargestoinvoice");
var _ids_credits = require("./ids_credits");
var _ids_fees = require("./ids_fees");
var _ids_toinvoices = require("./ids_toinvoices");
var _ids_toinvoices_log_cat = require("./ids_toinvoices_log_cat");
var _ids_toinvoices_recurring = require("./ids_toinvoices_recurring");
var _ids_toinvoices_sent = require("./ids_toinvoices_sent");
var _income_interval_options = require("./income_interval_options");
var _log_cat = require("./log_cat");
var _makes = require("./makes");
var _manager_person = require("./manager_person");
var _manager_person_photos = require("./manager_person_photos");
var _markets = require("./markets");
var _markets_dm = require("./markets_dm");
var _markets_sub_dm = require("./markets_sub_dm");
var _messages = require("./messages");
var _messages_css = require("./messages_css");
var _mobile_carriers = require("./mobile_carriers");
var _months = require("./months");
var _months_options = require("./months_options");
var _on_off = require("./on_off");
var _options_task = require("./options_task");
var _optionsyn = require("./optionsyn");
var _phone_types = require("./phone_types");
var _repair_shops = require("./repair_shops");
var _repair_shops_photos = require("./repair_shops_photos");
var _repairshops_dealers_relationships = require("./repairshops_dealers_relationships");
var _sales_person = require("./sales_person");
var _sales_person_contacts = require("./sales_person_contacts");
var _sales_person_photos = require("./sales_person_photos");
var _states = require("./states");
var _system_messages = require("./system_messages");
var _testimonials = require("./testimonials");
var _ticket_submit_dlr = require("./ticket_submit_dlr");
var _time_hours_1 = require("./time_hours_1");
var _time_minutes_5 = require("./time_minutes_5");
var _vehicle_options = require("./vehicle_options");
var _vehicle_photos = require("./vehicle_photos");
var _vehicle_videos = require("./vehicle_videos");
var _vehicles = require("./vehicles");
var _vehicles_transfer = require("./vehicles_transfer");
var _visitor_bdc_dealer = require("./visitor_bdc_dealer");
var _vvin_ten = require("./vvin_ten");
var _vvin_three = require("./vvin_three");
var _vvin_two = require("./vvin_two");
var _vvin_wmifivesixseven_model = require("./vvin_wmifivesixseven_model");
var _vvin_wmionetwothree = require("./vvin_wmionetwothree");
var _wfh_dealer_types = require("./wfh_dealer_types");
var _wfh_dealers = require("./wfh_dealers");
var _wfhuser_approvals = require("./wfhuser_approvals");
var _wfhuserprofile = require("./wfhuserprofile");
var _year_options = require("./year_options");

function initModels(sequelize) {
  var account_person = _account_person(sequelize, DataTypes);
  var account_person_photos = _account_person_photos(sequelize, DataTypes);
  var articles = _articles(sequelize, DataTypes);
  var auto_years = _auto_years(sequelize, DataTypes);
  var body_styles = _body_styles(sequelize, DataTypes);
  var busines_hours = _busines_hours(sequelize, DataTypes);
  var calendar|timezones = _calendar|timezones(sequelize, DataTypes);
  var car_make = _car_make(sequelize, DataTypes);
  var car_model = _car_model(sequelize, DataTypes);
  var car_years = _car_years(sequelize, DataTypes);
  var colors_hex = _colors_hex(sequelize, DataTypes);
  var credit_app_emp_types = _credit_app_emp_types(sequelize, DataTypes);
  var credit_app_fullblown = _credit_app_fullblown(sequelize, DataTypes);
  var credit_app_income_intervals = _credit_app_income_intervals(sequelize, DataTypes);
  var credit_app_notes = _credit_app_notes(sequelize, DataTypes);
  var credit_app_residence_intervals = _credit_app_residence_intervals(sequelize, DataTypes);
  var credit_app_types = _credit_app_types(sequelize, DataTypes);
  var cust_lead_notes = _cust_lead_notes(sequelize, DataTypes);
  var cust_lead_source = _cust_lead_source(sequelize, DataTypes);
  var cust_leads = _cust_leads(sequelize, DataTypes);
  var cust_leads_emails = _cust_leads_emails(sequelize, DataTypes);
  var customer_notes = _customer_notes(sequelize, DataTypes);
  var customers = _customers(sequelize, DataTypes);
  var dealer_depts = _dealer_depts(sequelize, DataTypes);
  var dealer_types = _dealer_types(sequelize, DataTypes);
  var dealers = _dealers(sequelize, DataTypes);
  var dealers_appointments = _dealers_appointments(sequelize, DataTypes);
  var dealers_news = _dealers_news(sequelize, DataTypes);
  var dealers_news_response = _dealers_news_response(sequelize, DataTypes);
  var dealers_pending = _dealers_pending(sequelize, DataTypes);
  var dealers_photos = _dealers_photos(sequelize, DataTypes);
  var dealers_tasks = _dealers_tasks(sequelize, DataTypes);
  var dealers_teams = _dealers_teams(sequelize, DataTypes);
  var dealers_teams_photos = _dealers_teams_photos(sequelize, DataTypes);
  var dealers_unsubscribed = _dealers_unsubscribed(sequelize, DataTypes);
  var deals_bydealer = _deals_bydealer(sequelize, DataTypes);
  var dudes = _dudes(sequelize, DataTypes);
  var dudes_dlr_notes = _dudes_dlr_notes(sequelize, DataTypes);
  var dudes_sys_htmlemail_templates = _dudes_sys_htmlemail_templates(sequelize, DataTypes);
  var email_dealer_templates = _email_dealer_templates(sequelize, DataTypes);
  var email_dealer_templates_types = _email_dealer_templates_types(sequelize, DataTypes);
  var email_dealers_htmlsent = _email_dealers_htmlsent(sequelize, DataTypes);
  var engines = _engines(sequelize, DataTypes);
  var fbuserprofiles = _fbuserprofiles(sequelize, DataTypes);
  var ferrari_dm = _ferrari_dm(sequelize, DataTypes);
  var ids_chargestoinvoice = _ids_chargestoinvoice(sequelize, DataTypes);
  var ids_credits = _ids_credits(sequelize, DataTypes);
  var ids_fees = _ids_fees(sequelize, DataTypes);
  var ids_toinvoices = _ids_toinvoices(sequelize, DataTypes);
  var ids_toinvoices_log_cat = _ids_toinvoices_log_cat(sequelize, DataTypes);
  var ids_toinvoices_recurring = _ids_toinvoices_recurring(sequelize, DataTypes);
  var ids_toinvoices_sent = _ids_toinvoices_sent(sequelize, DataTypes);
  var income_interval_options = _income_interval_options(sequelize, DataTypes);
  var log_cat = _log_cat(sequelize, DataTypes);
  var makes = _makes(sequelize, DataTypes);
  var manager_person = _manager_person(sequelize, DataTypes);
  var manager_person_photos = _manager_person_photos(sequelize, DataTypes);
  var markets = _markets(sequelize, DataTypes);
  var markets_dm = _markets_dm(sequelize, DataTypes);
  var markets_sub_dm = _markets_sub_dm(sequelize, DataTypes);
  var messages = _messages(sequelize, DataTypes);
  var messages_css = _messages_css(sequelize, DataTypes);
  var mobile_carriers = _mobile_carriers(sequelize, DataTypes);
  var months = _months(sequelize, DataTypes);
  var months_options = _months_options(sequelize, DataTypes);
  var on_off = _on_off(sequelize, DataTypes);
  var options_task = _options_task(sequelize, DataTypes);
  var optionsyn = _optionsyn(sequelize, DataTypes);
  var phone_types = _phone_types(sequelize, DataTypes);
  var repair_shops = _repair_shops(sequelize, DataTypes);
  var repair_shops_photos = _repair_shops_photos(sequelize, DataTypes);
  var repairshops_dealers_relationships = _repairshops_dealers_relationships(sequelize, DataTypes);
  var sales_person = _sales_person(sequelize, DataTypes);
  var sales_person_contacts = _sales_person_contacts(sequelize, DataTypes);
  var sales_person_photos = _sales_person_photos(sequelize, DataTypes);
  var states = _states(sequelize, DataTypes);
  var system_messages = _system_messages(sequelize, DataTypes);
  var testimonials = _testimonials(sequelize, DataTypes);
  var ticket_submit_dlr = _ticket_submit_dlr(sequelize, DataTypes);
  var time_hours_1 = _time_hours_1(sequelize, DataTypes);
  var time_minutes_5 = _time_minutes_5(sequelize, DataTypes);
  var vehicle_options = _vehicle_options(sequelize, DataTypes);
  var vehicle_photos = _vehicle_photos(sequelize, DataTypes);
  var vehicle_videos = _vehicle_videos(sequelize, DataTypes);
  var vehicles = _vehicles(sequelize, DataTypes);
  var vehicles_transfer = _vehicles_transfer(sequelize, DataTypes);
  var visitor_bdc_dealer = _visitor_bdc_dealer(sequelize, DataTypes);
  var vvin_ten = _vvin_ten(sequelize, DataTypes);
  var vvin_three = _vvin_three(sequelize, DataTypes);
  var vvin_two = _vvin_two(sequelize, DataTypes);
  var vvin_wmifivesixseven_model = _vvin_wmifivesixseven_model(sequelize, DataTypes);
  var vvin_wmionetwothree = _vvin_wmionetwothree(sequelize, DataTypes);
  var wfh_dealer_types = _wfh_dealer_types(sequelize, DataTypes);
  var wfh_dealers = _wfh_dealers(sequelize, DataTypes);
  var wfhuser_approvals = _wfhuser_approvals(sequelize, DataTypes);
  var wfhuserprofile = _wfhuserprofile(sequelize, DataTypes);
  var year_options = _year_options(sequelize, DataTypes);


  return {
    account_person,
    account_person_photos,
    articles,
    auto_years,
    body_styles,
    busines_hours,
    calendar|timezones,
    car_make,
    car_model,
    car_years,
    colors_hex,
    credit_app_emp_types,
    credit_app_fullblown,
    credit_app_income_intervals,
    credit_app_notes,
    credit_app_residence_intervals,
    credit_app_types,
    cust_lead_notes,
    cust_lead_source,
    cust_leads,
    cust_leads_emails,
    customer_notes,
    customers,
    dealer_depts,
    dealer_types,
    dealers,
    dealers_appointments,
    dealers_news,
    dealers_news_response,
    dealers_pending,
    dealers_photos,
    dealers_tasks,
    dealers_teams,
    dealers_teams_photos,
    dealers_unsubscribed,
    deals_bydealer,
    dudes,
    dudes_dlr_notes,
    dudes_sys_htmlemail_templates,
    email_dealer_templates,
    email_dealer_templates_types,
    email_dealers_htmlsent,
    engines,
    fbuserprofiles,
    ferrari_dm,
    ids_chargestoinvoice,
    ids_credits,
    ids_fees,
    ids_toinvoices,
    ids_toinvoices_log_cat,
    ids_toinvoices_recurring,
    ids_toinvoices_sent,
    income_interval_options,
    log_cat,
    makes,
    manager_person,
    manager_person_photos,
    markets,
    markets_dm,
    markets_sub_dm,
    messages,
    messages_css,
    mobile_carriers,
    months,
    months_options,
    on_off,
    options_task,
    optionsyn,
    phone_types,
    repair_shops,
    repair_shops_photos,
    repairshops_dealers_relationships,
    sales_person,
    sales_person_contacts,
    sales_person_photos,
    states,
    system_messages,
    testimonials,
    ticket_submit_dlr,
    time_hours_1,
    time_minutes_5,
    vehicle_options,
    vehicle_photos,
    vehicle_videos,
    vehicles,
    vehicles_transfer,
    visitor_bdc_dealer,
    vvin_ten,
    vvin_three,
    vvin_two,
    vvin_wmifivesixseven_model,
    vvin_wmionetwothree,
    wfh_dealer_types,
    wfh_dealers,
    wfhuser_approvals,
    wfhuserprofile,
    year_options,
  };
}
module.exports = initModels;
module.exports.initModels = initModels;
module.exports.default = initModels;
