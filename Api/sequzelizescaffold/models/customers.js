const Sequelize = require('sequelize');
module.exports = function(sequelize, DataTypes) {
  return sequelize.define('customers', {
    customer_id: {
      autoIncrement: true,
      type: DataTypes.BIGINT,
      allowNull: false,
      primaryKey: true
    },
    customer_frmsource: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    customer_leads_id: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    credit_app_fullblown_id: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    customer_no: {
      type: DataTypes.INTEGER,
      allowNull: true,
      comment: "number unique to dealer id"
    },
    customer_dayhunt: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    customer_dealer_id: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    customer_sales_person_id: {
      type: DataTypes.BIGINT,
      allowNull: true
    },
    customer_sales_person2_id: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    customer_bdc_id: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    customer_fnimgr_id: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    customer_slsmgr_id: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    customer_status_sold: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    customer_finance_type: {
      type: DataTypes.STRING(20),
      allowNull: true
    },
    customer_lostcode: {
      type: DataTypes.STRING(20),
      allowNull: true
    },
    customer_vehicles_id: {
      type: DataTypes.BIGINT,
      allowNull: true
    },
    customer_testimony_id: {
      type: DataTypes.BIGINT,
      allowNull: true
    },
    customer_token_id: {
      type: DataTypes.STRING(500),
      allowNull: true
    },
    customer_facebook_id: {
      type: DataTypes.STRING(500),
      allowNull: true
    },
    customer_username: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    customer_password: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    customer_status: {
      type: DataTypes.STRING(15),
      allowNull: true
    },
    customer_status_2: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    customer_status_3: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    customer_status_4: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    customer_status_5: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    customer_type: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    customer_created_at: {
      type: DataTypes.DATE,
      allowNull: false,
      defaultValue: Sequelize.Sequelize.literal('CURRENT_TIMESTAMP')
    },
    customer_date_modified: {
      type: DataTypes.STRING(20),
      allowNull: true
    },
    customer_title: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    customer_nickname: {
      type: DataTypes.STRING(100),
      allowNull: true
    },
    customer_fname: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    customer_mname: {
      type: DataTypes.TEXT,
      allowNull: true,
      comment: "Most Time Initial, full middlename if demanded still allow"
    },
    customer_lname: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    customer_suffix: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    customer_sex: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    customer_email: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    customer_dlstate: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    customer_dlno: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    customer_dlexpdate: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    customer_dob: {
      type: DataTypes.STRING(20),
      allowNull: true
    },
    customer_ssn: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    customer_perf_commun: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    customer_lead_temperature: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    customer_phoneno: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    customer_phonetype: {
      type: DataTypes.STRING(20),
      allowNull: true
    },
    customer_cellphone: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    customer_work_phone: {
      type: DataTypes.STRING(20),
      allowNull: true
    },
    customer_comment: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    customer_schedule_td: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    customer_date_td: {
      type: DataTypes.STRING(20),
      allowNull: true
    },
    customer_hour_td: {
      type: DataTypes.STRING(20),
      allowNull: true
    },
    customer_min_td: {
      type: DataTypes.STRING(20),
      allowNull: true
    },
    customer_ampm_td: {
      type: DataTypes.STRING(20),
      allowNull: true
    },
    customer_home_addr1: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    customer_home_addr2: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    customer_home_city: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    customer_home_state: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    customer_home_zip: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    customer_home_county: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    customer_home_live_movindate: {
      type: DataTypes.STRING(250),
      allowNull: true
    },
    customer_home_live_years: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    customer_home_live_months: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    customer_home_okgoogle: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    customer_home_geo_latitude: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    customer_home_geo_longitude: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    customer_employer_name: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    customer_employer_addr1: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    customer_employer_addr2: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    customer_employer_city: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    customer_employer_state: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    customer_employer_zip: {
      type: DataTypes.STRING(15),
      allowNull: true
    },
    customer_employer_phone: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    customer_supervisors_name: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    customer_supervisors_phone: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    customer_supervisors_phone_ext: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    customer_employer_hiredate: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    customer_employer_years: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    customer_employer_months: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    customer_gross_income: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    customer_net_income: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    customer_income_frequency: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    customer_income_other: {
      type: DataTypes.STRING(20),
      allowNull: true
    },
    customer_income_other_amount: {
      type: DataTypes.STRING(20),
      allowNull: true
    },
    customer_income_other_frequency: {
      type: DataTypes.STRING(20),
      allowNull: true
    },
    titleconjucation: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    customer2_id: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    customer2_relationship: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    customer2_title: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    customer2_fname: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    customer2_mname: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    customer2_lname: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    customer2_suffix: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    customer2_sex: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    customer2_email: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    customer2_dlstate: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    customer2_dlno: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    customer2_dlexpdate: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    customer2_dob: {
      type: DataTypes.STRING(20),
      allowNull: true
    },
    customer2_ssn: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    customer2_phoneno: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    customer2_cellphone: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    customer2_home_addr1: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    customer2_home_addr2: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    customer2_home_city: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    customer2_home_state: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    customer2_home_zip: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    customer2_home_county: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    customer2_home_live_years: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    customer2_home_live_months: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    customer2_employer_name: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    customer2_employer_addr1: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    customer2_employer_addr2: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    customer2_employer_city: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    customer2_employer_state: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    customer2_employer_zip: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    customer2_employer_phone: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    customer2_supervisors_name: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    customer2_supervisors_phone: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    customer2_supervisors_phone_ext: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    customer2_employer_hiredate: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    customer2_employer_years: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    customer2_employer_months: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    customer2_gross_income: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    customer2_net_income: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    customer2_income_frequency: {
      type: DataTypes.TEXT,
      allowNull: true
    }
  }, {
    sequelize,
    tableName: 'customers',
    timestamps: false,
    indexes: [
      {
        name: "PRIMARY",
        unique: true,
        using: "BTREE",
        fields: [
          { name: "customer_id" },
        ]
      },
      {
        name: "customer_id",
        using: "BTREE",
        fields: [
          { name: "customer_id" },
        ]
      },
      {
        name: "customer_token_id",
        using: "BTREE",
        fields: [
          { name: "customer_token_id", length: 333 },
        ]
      },
      {
        name: "customer_fname",
        type: "FULLTEXT",
        fields: [
          { name: "customer_fname" },
        ]
      },
    ]
  });
};
