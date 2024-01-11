const Sequelize = require('sequelize');
module.exports = function(sequelize, DataTypes) {
  return sequelize.define('email_dealers_htmlsent', {
    senthtml_lead_id: {
      autoIncrement: true,
      type: DataTypes.BIGINT,
      allowNull: false,
      primaryKey: true
    },
    senthtml_lead_draft: {
      type: DataTypes.STRING(5),
      allowNull: true
    },
    senthtml_lead_token: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    senthtml_custlead_id: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    senthtml_lead_did: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    senthtml_lead_email_to: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    senthtml_lead_email_from: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    senthtml_lead_template_id: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    senthtml_lead_subject: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    senthtml_lead_htm_body: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    senthtml_lead_created_at: {
      type: DataTypes.DATE,
      allowNull: false,
      defaultValue: Sequelize.Sequelize.literal('CURRENT_TIMESTAMP')
    }
  }, {
    sequelize,
    tableName: 'email_dealers_htmlsent',
    timestamps: false,
    indexes: [
      {
        name: "PRIMARY",
        unique: true,
        using: "BTREE",
        fields: [
          { name: "senthtml_lead_id" },
        ]
      },
    ]
  });
};
