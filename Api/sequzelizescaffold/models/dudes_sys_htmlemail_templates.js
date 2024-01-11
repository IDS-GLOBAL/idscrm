const Sequelize = require('sequelize');
module.exports = function(sequelize, DataTypes) {
  return sequelize.define('dudes_sys_htmlemail_templates', {
    id: {
      autoIncrement: true,
      type: DataTypes.INTEGER,
      allowNull: false,
      primaryKey: true
    },
    email_systm_templates_dudeid: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    email_systm_templates_token: {
      type: DataTypes.STRING(250),
      allowNull: true
    },
    email_systm_templates_subject: {
      type: DataTypes.STRING(100),
      allowNull: true
    },
    email_systm_templates_type_id: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    email_systm_templates_type: {
      type: DataTypes.STRING(100),
      allowNull: true
    },
    email_systm_templates_body: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    email_systm_templates_status: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    days_systm_response: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    email_systm_templates_created_at: {
      type: DataTypes.DATE,
      allowNull: true,
      defaultValue: Sequelize.Sequelize.literal('CURRENT_TIMESTAMP')
    },
    email_systm_templates_modified_at: {
      type: DataTypes.INTEGER,
      allowNull: true
    }
  }, {
    sequelize,
    tableName: 'dudes_sys_htmlemail_templates',
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
