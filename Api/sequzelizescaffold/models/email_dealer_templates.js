const Sequelize = require('sequelize');
module.exports = function(sequelize, DataTypes) {
  return sequelize.define('email_dealer_templates', {
    id: {
      autoIncrement: true,
      type: DataTypes.INTEGER,
      allowNull: false,
      primaryKey: true
    },
    email_dealer_templates_did: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    email_dealer_templates_subject: {
      type: DataTypes.STRING(100),
      allowNull: true
    },
    email_dealer_templates_type_id: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    email_dealer_templates_type: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    email_dealer_templates_body: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    email_dealer_templates_status: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    days_response: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    email_dealer_templates_created_at: {
      type: DataTypes.DATE,
      allowNull: true,
      defaultValue: Sequelize.Sequelize.literal('CURRENT_TIMESTAMP')
    },
    email_dealer_templates_modified_at: {
      type: DataTypes.INTEGER,
      allowNull: true
    }
  }, {
    sequelize,
    tableName: 'email_dealer_templates',
    timestamps: false,
    indexes: [
      {
        name: "PRIMARY",
        unique: true,
        using: "BTREE",
        fields: [
          { name: "id" },
        ]
      },
    ]
  });
};
