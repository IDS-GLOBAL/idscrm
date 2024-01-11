const Sequelize = require('sequelize');
module.exports = function(sequelize, DataTypes) {
  return sequelize.define('cust_leads', {
    cust_leadid: {
      autoIncrement: true,
      type: DataTypes.BIGINT,
      allowNull: false,
      primaryKey: true,
      comment: "lead_id"
    },
    datetimeDeleted: {
      type: DataTypes.STRING(30),
      allowNull: true,
      comment: "Date Time Deleted"
    },
    dealerwhoDeleted: {
      type: DataTypes.INTEGER,
      allowNull: true,
      comment: "Dealer Who Deleted Lead"
    },
    wfhcookiesesid: {
      type: DataTypes.STRING(100),
      allowNull: true
    },
    cust_lead_ip: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    cust_lead_broswer: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    cust_lead_mobile: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    fbid: {
      type: DataTypes.STRING(250),
      allowNull: true
    },
    wfhuser_id: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    chat_visitor_id: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    chat_visitor_cookie: {
      type: DataTypes.STRING(100),
      allowNull: true
    },
    bigPrincipal: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    cust_totalpayments: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    cust_leadcost: {
      type: DataTypes.DECIMAL(10,2),
      allowNull: false
    },
    cust_seenbydlr: {
      type: DataTypes.INTEGER,
      allowNull: false,
      defaultValue: 0
    },
    cust_lead_sex: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    cust_titlename: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    cust_nickname: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    cust_fname: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    cust_mname: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    cust_lname: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    cust_name_suffix: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    cust_email: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    cust_ssn: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    cust_ssn_4: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    cust_perf_commun: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    cust_lead_temperature: {
      type: DataTypes.STRING(50),
      allowNull: true,
      comment: "Cold, Warm, Hot"
    },
    cust_close_range: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    cust_status: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    cust_phoneno: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    cust_phonetype: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    cust_mobilephone: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    cust_homephone: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    cust_workphone: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    cust_faxphone: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    cust_comment: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    cust_lead_sp_comment: {
      type: DataTypes.TEXT,
      allowNull: true,
      comment: "notes made along with sales person from quick capture."
    },
    cust_email_subject: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    cust_lead_type: {
      type: DataTypes.STRING(20),
      allowNull: true,
      comment: "0-contactform, 1=testdrive 2=quikapply 3=wfhapproveme"
    },
    cust_lead_source_id: {
      type: DataTypes.INTEGER,
      allowNull: true,
      comment: "The Id reference to cust_lead_source"
    },
    cust_lead_source: {
      type: DataTypes.STRING(50),
      allowNull: true,
      comment: "where the lead came from? 1Website 2Internal Lead 3AutoCityMag.com 4WeFinanceHere.com 5BuyHerePayHereUs.com 6OneCreditApp.com 7AutoFinanceMd.com"
    },
    cust_close_status_0: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    cust_close_status_1: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    cust_close_status_2: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    cust_close_status_3: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    cust_close_status_4: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    cust_finance_type: {
      type: DataTypes.STRING(20),
      allowNull: true
    },
    cust_lostcode: {
      type: DataTypes.STRING(20),
      allowNull: true
    },
    cust_dealer_id: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    cust_vehicle_id: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    cust_salesperson_id: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    sales_person_nametxt: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    cust_salesperson2_id: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    sales_person2_nametxt: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    cust_bdc_id: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    cust_mgr_id: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    cust_lead_created_at: {
      type: DataTypes.DATE,
      allowNull: true,
      defaultValue: Sequelize.Sequelize.literal('CURRENT_TIMESTAMP')
    },
    cust_lead_modified_at: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    cust_schedule_td: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    cust_date_td: {
      type: DataTypes.STRING(255),
      allowNull: true
    },
    cust_hour_td: {
      type: DataTypes.STRING(11),
      allowNull: true
    },
    cust_min_td: {
      type: DataTypes.STRING(11),
      allowNull: true
    },
    cust_ampm_td: {
      type: DataTypes.STRING(5),
      allowNull: true
    },
    cust_lead_token: {
      type: DataTypes.STRING(300),
      allowNull: true
    },
    cust_home_address: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    cust_home_address2: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    cust_home_address3: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    cust_home_city: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    cust_home_state: {
      type: DataTypes.STRING(20),
      allowNull: true
    },
    cust_home_zip: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    cust_home_county: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    cust_home_live_movindate: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    cust_home_live_years: {
      type: DataTypes.STRING(100),
      allowNull: true
    },
    cust_home_live_months: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    cust_home_okgoogle: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    cust_home_latitude: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    cust_home_longitude: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    cust_employer_name: {
      type: DataTypes.STRING(300),
      allowNull: true
    },
    cust_employer_addr1: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    cust_employer_addr2: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    cust_employer_city: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    cust_employer_state: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    cust_employer_zip: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    cust_employer_phone: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    cust_employer_dateohire: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    cust_supervisors_name: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    cust_supervisors_phone: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    cust_supervisors_ext: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    cust_employer_years: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    cust_employer_months: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    cust_gross_income: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    cust_gross_income_frequency: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    cust_other_income: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    cust_other_income_amount: {
      type: DataTypes.STRING(15),
      allowNull: true
    },
    cust_gross_other_income_frequency: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    cust_creditaprtxt: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    cust_creditapr: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    cust_downpayment: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    cust_desiredpymt: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    currentCarpymt: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    cust_desiredtermos: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    cust_desiredtermrange: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    cust_car_loan: {
      type: DataTypes.STRING(1),
      allowNull: true
    },
    cust_dealtoday: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    cust_vstockno: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    cust_vyear: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    cust_vmake: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    cust_vmodel: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    cust_vtrim: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    cust_vbody: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    cust_vmiles: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    cust_vsellingprice: {
      type: DataTypes.STRING(12),
      allowNull: true
    },
    counter_offer: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    counter_offer2: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    tradeYes: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    tradeVin: {
      type: DataTypes.STRING(17),
      allowNull: true
    },
    tradeYear: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    tradeMake: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    tradeModel: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    tradeTrim: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    tradeMiles: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    tradePayoff: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    tradePayment: {
      type: DataTypes.TEXT,
      allowNull: true
    }
  }, {
    sequelize,
    tableName: 'cust_leads',
    timestamps: false,
    indexes: [
      {
        name: "PRIMARY",
        unique: true,
        using: "BTREE",
        fields: [
          { name: "cust_leadid" },
        ]
      },
      {
        name: "cust_lead_sp_comment",
        type: "FULLTEXT",
        fields: [
          { name: "cust_lead_sp_comment" },
        ]
      },
    ]
  });
};
