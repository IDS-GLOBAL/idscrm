const Sequelize = require('sequelize');
module.exports = function(sequelize, DataTypes) {
  return sequelize.define('dealers_pending', {
    id: {
      autoIncrement: true,
      type: DataTypes.BIGINT,
      allowNull: false
    },
    prospctdlrid: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    sys_covertdlrs_did: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    dudes_id: {
      type: DataTypes.INTEGER,
      allowNull: true,
      comment: "id of admin"
    },
    assigned_salesrep: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    assigned_salesrep_phone: {
      type: DataTypes.STRING(20),
      allowNull: true
    },
    dudes2_id: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    contact: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    contact_title: {
      type: DataTypes.TEXT,
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
    contact_mobilecarrier_id: {
      type: DataTypes.STRING(20),
      allowNull: true
    },
    contact_mobilecarrier_label: {
      type: DataTypes.STRING(20),
      allowNull: true
    },
    dmcontact2: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    dmcontact2_title: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dmcontact2_phone: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dmcontact2_phone_type: {
      type: DataTypes.STRING(20),
      allowNull: true
    },
    dmcontact2_mobilecarrier_id: {
      type: DataTypes.STRING(20),
      allowNull: true
    },
    dmcontact2_mobilecarrier_label: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    company: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    company_legalname: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dealer_type_id: {
      type: DataTypes.STRING(20),
      allowNull: true
    },
    dealer_type_label: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    website: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    finance_primary_name: {
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
    finance_contact_email: {
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
    sales_email: {
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
      type: DataTypes.TEXT,
      allowNull: true
    },
    dealerTimezone: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    email: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    username: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    password: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    wfh_dealer_type_id: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    wfh_dealer_type_label: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dealer_market_sub_id: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    dealer_market_id: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    sla: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    token: {
      type: DataTypes.STRING(100),
      allowNull: false
    },
    package: {
      type: DataTypes.STRING(100),
      allowNull: true
    },
    frazer_customer_no: {
      type: DataTypes.INTEGER,
      allowNull: true,
      comment: "Frazer ID & Frazer Customer Number"
    }
  }, {
    sequelize,
    tableName: 'dealers_pending',
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
    ]
  });
};
