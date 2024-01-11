const Sequelize = require('sequelize');
module.exports = function(sequelize, DataTypes) {
  return sequelize.define('dudes', {
    dudes_id: {
      autoIncrement: true,
      type: DataTypes.INTEGER,
      allowNull: false,
      primaryKey: true
    },
    dudes_public_token: {
      type: DataTypes.STRING(300),
      allowNull: true
    },
    dudes_secret_token: {
      type: DataTypes.STRING(300),
      allowNull: true
    },
    dudes_facebook_id: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    dudes_facebook_deny: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    dudes_facebook_email: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    dudes_facebook_name: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dudes_username: {
      type: DataTypes.STRING(20),
      allowNull: true
    },
    dudes_password: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dudes_status: {
      type: DataTypes.INTEGER,
      allowNull: true,
      comment: "0 = Inactive 2 = Active 3 = Super"
    },
    dudes_prefix_name: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    dudes_firstname: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    dudes_midname: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dudes_lname: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dudes_suffix: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dudes_ssn: {
      type: DataTypes.STRING(11),
      allowNull: true
    },
    dudes_dob: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dudes_access_level: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    dudes_email_internal: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    dudes_email_internal_verified: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    dudes_email_internal_active: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    dudes_email_personal: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    dudes_email_personal_verified: {
      type: DataTypes.STRING(5),
      allowNull: true
    },
    dudes_jobposition_title_id: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    dudes_jobposition_title: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dudes_jobposition_shift_id: {
      type: DataTypes.STRING(11),
      allowNull: true
    },
    dudes_jobposition_shift: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dudes_team_id: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    dudes_team_name: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    dudes_region_id: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    dudes_region_name: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dudes_dma_id: {
      type: DataTypes.STRING(11),
      allowNull: true
    },
    dudes_dma_name: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dudes_market_id: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    dudes_market_name: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dudes_submarket_id: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    dudes_submarket_name: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dudes_department_id: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    dudes_department_name: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dudes_salespitch_template_id: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    dudes_salespitch_body: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dudes_cellphone: {
      type: DataTypes.STRING(20),
      allowNull: true
    },
    dudes_workphone_active: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    dudes_workphone_prfx: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    dudes_workphone_no: {
      type: DataTypes.STRING(20),
      allowNull: true
    },
    dudes_workphone_type: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    dudes_workphone_label: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dudes_workphone_ext: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    dudes_workphone_companyown: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    dudes_workphone_contractorown: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    dudes_workphone_brand: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dudes_workphone_mac_address: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dudes_workphone_mac_address_ip: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dudes_workphone_router_brand_id: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    dudes_workphone_router_brand: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dudes_workphone_router_modelno: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dudes_workphone_router_serialno: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dudes_workphone_date_shipped: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dudes_workphone_date_received: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dudes_workphone_purchase_cost: {
      type: DataTypes.STRING(20),
      allowNull: true
    },
    dudes_workphone_purchase_date: {
      type: DataTypes.STRING(20),
      allowNull: true
    },
    dudes_workphone2_prfx: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    dudes_workphone2_type: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    dudes_workphone2_label: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dudes_workphone2_ext: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dudes_workaddr1: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dudes_workaddr2: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dudes_workaddr_city: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dudes_workaddr_state: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dudes_workaddr_zip: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    dudes_workaddr_zip4: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    dudes_workaddr_county: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dudes_workaddr_country: {
      type: DataTypes.STRING(30),
      allowNull: true
    },
    dudes_last_loggedin: {
      type: DataTypes.DATE,
      allowNull: true
    },
    dudes_homephone_no: {
      type: DataTypes.STRING(20),
      allowNull: true
    },
    dudes_home_addr: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dudes_home_addr2: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dudes_home_state: {
      type: DataTypes.STRING(20),
      allowNull: true
    },
    dudes_home_city: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    dudes_home_zipcode: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    dudes_Timezone: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    dudes_workstation_group_id: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    dudes_workstation_id: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    dudes_skillset_id: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    dudes_lastmodified: {
      type: DataTypes.DATEONLY,
      allowNull: true
    },
    dudes_created_at: {
      type: DataTypes.DATE,
      allowNull: false,
      defaultValue: Sequelize.Sequelize.literal('CURRENT_TIMESTAMP')
    },
    dudes_public_image_id: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    dudes_public_image_sort_orderno: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    dudes_public_image_status: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    dudes_public_image_filename: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dudes_public_image_filepath: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dudes_public_image_filewidth: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dudes_public_image_fileheight: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dudes_public_image_thumbfname: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dudes_public_image_thumbfpath: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dudes_public_img_openurl: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dudes_goal_weeklypresentations: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    dudes_goal_monthlypresentations: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    dudes_goal_deals_monthly: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    dudes_goal_appts_monthly: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    dudes_goal_retaindlrs_monthly: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    dudes_goal_newdlrs_monthly: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    dudes_goal_mnthly_commission: {
      type: DataTypes.STRING(20),
      allowNull: true
    },
    dudes_goal_daily_commission: {
      type: DataTypes.STRING(20),
      allowNull: true
    },
    dudes_goal_yearly_commission: {
      type: DataTypes.STRING(20),
      allowNull: true
    },
    dudes_goal_residual_commission: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    dudes_goal_addnewcars_tosystm: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    dudes_goal_vehicle_photos: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    dudes_goal_vehicle_windowstickers: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    dudes_goal_new_websites: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    dudes_goal_retain_outsideadagencys: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    dudes_goal_new_outsideadagencys: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    dudes_professional_motto: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dudes_dudes_aboutme_toteam: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dudes_dudes_aboutme_todealers: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dudes_dudes_aboutme_tocompany: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    internal_comments_super_admin: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dudes_hourlyrate: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    dudes_fed_deductions: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    dudes_state_deductions: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    dudes_taxexempt: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    dudes_super: {
      type: DataTypes.STRING(1),
      allowNull: true
    }
  }, {
    sequelize,
    tableName: 'dudes',
    timestamps: false,
    indexes: [
      {
        name: "PRIMARY",
        unique: true,
        using: "BTREE",
        fields: [
          { name: "dudes_id" },
        ]
      },
      {
        name: "dudes_username",
        using: "BTREE",
        fields: [
          { name: "dudes_username" },
          { name: "dudes_email_personal" },
          { name: "dudes_cellphone" },
        ]
      },
    ]
  });
};
