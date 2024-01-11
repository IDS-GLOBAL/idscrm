const Sequelize = require('sequelize');
module.exports = function(sequelize, DataTypes) {
  return sequelize.define('cust_leads_emails', {
    cust_leads_emails_id: {
      autoIncrement: true,
      type: DataTypes.INTEGER,
      allowNull: false,
      primaryKey: true
    },
    cust_leads_emails_did: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    cust_leads_emails_cldid: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    cust_leads_emails_subject: {
      type: DataTypes.STRING(100),
      allowNull: true
    },
    cust_leads_emails_email: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    cust_leads_emails_body: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    cust_leads_emails_status: {
      type: DataTypes.STRING(15),
      allowNull: true
    },
    cust_leads_emails_created_at: {
      type: DataTypes.DATE,
      allowNull: false,
      defaultValue: Sequelize.Sequelize.literal('CURRENT_TIMESTAMP')
    }
  }, {
    sequelize,
    tableName: 'cust_leads_emails',
    timestamps: false,
    indexes: [
      {
        name: "PRIMARY",
        unique: true,
        using: "BTREE",
        fields: [
          { name: "cust_leads_emails_id" },
        ]
      },
    ]
  });
};
