const Sequelize = require('sequelize');
module.exports = function(sequelize, DataTypes) {
  return sequelize.define('dealers', {
    id: {
      autoIncrement: true,
      type: DataTypes.BIGINT,
      allowNull: false
    },
    dealer_pending_id: {
      type: DataTypes.INTEGER,
      allowNull: true,
      comment: "The auto increment id from dealer_pending table"
    },
    prospct_dlrid: {
      type: DataTypes.INTEGER,
      allowNull: true,
      comment: "prospctdlrid from dealer_prospects"
    },
    dealer_type_id: {
      type: DataTypes.STRING(20),
      allowNull: true
    },
    dealer_market_id: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    dealer_market_sub_id: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    dudes_id: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    dudes2_id: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    assigned_salesrep: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    assigned_salesrep_phone: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    support_rep_id: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    leadsidsemail: {
      type: DataTypes.STRING(100),
      allowNull: true
    },
    leadsthirdparty: {
      type: DataTypes.TEXT,
      allowNull: true,
      comment: "Leads To A Third Party Like Eleads"
    },
    balance_credits: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    contact: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    contact_title: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    contact_phone: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    contact_phone_type: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    dmcontact2: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    dmcontact2_title: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    dmcontact2_phone: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dmcontact2_phone_type: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    company: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    company_legalname: {
      type: DataTypes.TEXT,
      allowNull: false,
      comment: "USD, JPY, Bitcoin"
    },
    dealerTimezone: {
      type: DataTypes.STRING(30),
      allowNull: true
    },
    website: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    finance: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    finance_contact: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    sales: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    sales_contact: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    phone: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    fax: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    address: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    city: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    state: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    zip: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    country: {
      type: DataTypes.STRING(30),
      allowNull: true
    },
    email: {
      type: DataTypes.STRING(100),
      allowNull: false
    },
    username: {
      type: DataTypes.STRING(15),
      allowNull: true,
      unique: "username"
    },
    password: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    verified: {
      type: DataTypes.ENUM('n','y'),
      allowNull: false
    },
    token: {
      type: DataTypes.STRING(40),
      allowNull: false,
      unique: "token"
    },
    home: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    about: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    directions: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    contactus: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    thankyou_page: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    mapurl: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    mapframe: {
      type: DataTypes.TEXT,
      allowNull: true,
      comment: "Map Emeded Code"
    },
    slogan: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    disclaimer: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    newmatrixcredit_vgoodcredit: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    newmatrixcredit_jgoodcredit: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    newmatrixcredit_faircredit: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    newmatrixcredit_poorcredit: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    newmatrixcredit_subprime: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    newmatrixcredit_unknown: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    newmatrixcredit_fminimumprofit: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    newmatrixcredit_bminimumprofit: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    usedmatrixcredit_vgoodcredit: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    usedmatrixcredit_jgoodcredit: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    usedmatrixcredit_faircredit: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    usedmatrixcredit_poorcredit: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    usedmatrixcredit_subprime: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    usedmatrixcredit_unknown: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    usedmatrixcredit_fminimumprofit: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    usedmatrixcredit_bminimumprofit: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    settingCurrency: {
      type: DataTypes.STRING(10),
      allowNull: true,
      comment: "USD, JPY, Bitcoin"
    },
    settingDefaultDPpercntg: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    settingDefaultPromoPriceOff: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    settingDefaultAPR: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    settingDefaultTerm: {
      type: DataTypes.INTEGER,
      allowNull: true,
      comment: "Months For Term Settings"
    },
    settingSateSlsTax: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    settingDocDlvryFee: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    settingTitleFee: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    settingStateInspectnFee: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dlr_ok_googlemp: {
      type: DataTypes.STRING(11),
      allowNull: true
    },
    dlr_geo_latitude: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    dlr_geo_longitude: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    financeform: {
      type: DataTypes.INTEGER,
      allowNull: true,
      defaultValue: 0
    },
    financeData: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    financeURL: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    design: {
      type: DataTypes.INTEGER,
      allowNull: true,
      defaultValue: 1,
      comment: "Design, 0 is custom, 1 is default"
    },
    listingdesign: {
      type: DataTypes.INTEGER,
      allowNull: true,
      defaultValue: 1
    },
    color_nav_current: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    color_inventory_row1: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    color_inventory_row2: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    color_body_normal: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    main_bg_color: {
      type: DataTypes.STRING(7),
      allowNull: true
    },
    page_brdr_color: {
      type: DataTypes.STRING(7),
      allowNull: true
    },
    page_bg_color: {
      type: DataTypes.STRING(7),
      allowNull: true
    },
    hdr_bg_color: {
      type: DataTypes.STRING(7),
      allowNull: true
    },
    hdr_font_color: {
      type: DataTypes.STRING(7),
      allowNull: true
    },
    hdr_brdr_color: {
      type: DataTypes.STRING(7),
      allowNull: true
    },
    colorvisited: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    paging: {
      type: DataTypes.INTEGER,
      allowNull: true,
      defaultValue: 10
    },
    status: {
      type: DataTypes.INTEGER,
      allowNull: true,
      defaultValue: 0
    },
    wfh_dealer_status: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    wfh_dealer_type_id: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    wfh_dealer_agreed: {
      type: DataTypes.STRING(5),
      allowNull: true
    },
    wfh_did_photo_id: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    wfh_did_photo_open_url: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    wfh_did_photo_updated: {
      type: DataTypes.DATEONLY,
      allowNull: true
    },
    wfh_did_deal_package_id: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    wfh_did_deal_package_code: {
      type: DataTypes.STRING(20),
      allowNull: true
    },
    dealer_chat: {
      type: DataTypes.STRING(11),
      allowNull: true,
      comment: "Dealer chat Status"
    },
    dealer_chatname: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    dealer_chat_display: {
      type: DataTypes.STRING(3),
      allowNull: true,
      comment: "javascript display"
    },
    dealer_chat_code: {
      type: DataTypes.TEXT,
      allowNull: false
    },
    dealer_chat_visitorid: {
      type: DataTypes.INTEGER,
      allowNull: true,
      comment: "the visitor id dealer viewing"
    },
    fuel_pump_display: {
      type: DataTypes.INTEGER,
      allowNull: true,
      comment: "Fuel Pump Display"
    },
    dcommercial_youtube_onoff: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    dcommercial_youtube_title: {
      type: DataTypes.STRING(250),
      allowNull: true
    },
    dcommercial_youtube_embed: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dcommercial_youtube_description: {
      type: DataTypes.STRING(5000),
      allowNull: true
    },
    craigslist_nickname: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    craigslist_vtb_bordercolor: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    craigslist_bg_ad_color: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    craigslist_pricing_showhide: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    craigslist_mileage_showhide: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    customtitle1: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    customcontent1: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    feedIDCars: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    feedIDComcast: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    feedidautotrader: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    feedidfrazer: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    feedidautomart: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    feedidvehix: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    feedidove: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    feedhomenetfilename: {
      type: DataTypes.STRING(100),
      allowNull: true,
      comment: "Homenet Auto File Name For Import"
    },
    metaDescription: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    metaKeywords: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    showPricing: {
      type: DataTypes.INTEGER,
      allowNull: true,
      defaultValue: 1
    },
    showMileage: {
      type: DataTypes.INTEGER,
      allowNull: true,
      defaultValue: 1
    },
    sbv_1: {
      type: DataTypes.INTEGER,
      allowNull: true,
      defaultValue: 1
    },
    sbv_2: {
      type: DataTypes.INTEGER,
      allowNull: true,
      defaultValue: 1
    },
    sbv_3: {
      type: DataTypes.INTEGER,
      allowNull: true,
      defaultValue: 1
    },
    sbv_4: {
      type: DataTypes.INTEGER,
      allowNull: true,
      defaultValue: 1
    },
    sla: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    location: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    location1: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    contact1: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    contact_phone1: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    company1: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    finance1: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    finance_contact1: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    sales1: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    sales_contact1: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    phone1: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    fax1: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    address1: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    city1: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    state1: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    zip1: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    email1: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    location2: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    contact2: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    contact_phone2: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    company2: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    finance2: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    finance_contact2: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    sales2: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    sales_contact2: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    phone2: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    fax2: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    address2: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    city2: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    state2: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    zip2: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    email2: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    mapurl1: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    mapurl2: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dealer_listingindex_displayprice: {
      type: DataTypes.INTEGER,
      allowNull: true,
      defaultValue: 0
    },
    last_login_time: {
      type: DataTypes.DATE,
      allowNull: false,
      defaultValue: Sequelize.Sequelize.literal('CURRENT_TIMESTAMP'),
      comment: "Last time user logged in"
    },
    last_modified: {
      type: DataTypes.DATE,
      allowNull: true
    },
    accts_rcvbles_name: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    accts_rcvbles_email: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    accts_rcvbles_verified: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    accts_rcvbles_password: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    accts_rcvbles_phone: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    accts_payables_name: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    accts_payables_email: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    accts_payables_verified: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    accts_payables_password: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    accts_payables_phone: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    export_tocarsforsale: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    export_tovast: {
      type: DataTypes.INTEGER,
      allowNull: true
    }
  }, {
    sequelize,
    tableName: 'dealers',
    timestamps: true,
    indexes: [
      {
        name: "id",
        unique: true,
        using: "BTREE",
        fields: [
          { name: "id" },
        ]
      },
      {
        name: "token",
        unique: true,
        using: "BTREE",
        fields: [
          { name: "token" },
        ]
      },
      {
        name: "username",
        unique: true,
        using: "BTREE",
        fields: [
          { name: "username" },
        ]
      },
      {
        name: "dcommercial_youtube-embed",
        type: "FULLTEXT",
        fields: [
          { name: "dcommercial_youtube_embed" },
        ]
      },
      {
        name: "feedhomenetfilename",
        type: "FULLTEXT",
        fields: [
          { name: "feedhomenetfilename" },
        ]
      },
    ]
  });
};
