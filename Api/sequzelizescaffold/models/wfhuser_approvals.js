const Sequelize = require('sequelize');
module.exports = function(sequelize, DataTypes) {
  return sequelize.define('wfhuser_approvals', {
    wfhuser_approval_id: {
      autoIncrement: true,
      type: DataTypes.INTEGER,
      allowNull: false,
      primaryKey: true
    },
    wfhuser_approval_email: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    wfhuser_approval_email_verified: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    wfhuser_approval_fname: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    wfhuser_approval_lname: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    wfhuser_approval_password: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    wfhuser_approval_phoneno: {
      type: DataTypes.STRING(20),
      allowNull: true
    },
    wfhuser_approval_ip: {
      type: DataTypes.STRING(20),
      allowNull: true
    },
    wfhuser_approval_sessionid: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    wfhuser_approval_token: {
      type: DataTypes.TEXT,
      allowNull: false
    },
    wfhuser_approval_broswer: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    wfhuser_approval_mobile: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    wfhuser_approval_totalpayments: {
      type: DataTypes.STRING(11),
      allowNull: true
    },
    wfhuser_approval_bigPrincipal: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    wfhuser_approval_bigSellingPrice: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    wfhuser_approval_budget_affordable: {
      type: DataTypes.STRING(1),
      allowNull: true
    },
    wfhuser_approval_apr: {
      type: DataTypes.STRING(5),
      allowNull: true
    },
    wfhuser_approval_apr_txt: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    wfhuser_approval_dwpymt: {
      type: DataTypes.STRING(20),
      allowNull: true
    },
    wfhuser_approval_mxpymt: {
      type: DataTypes.STRING(20),
      allowNull: true
    },
    wfhuser_approval_monthterm: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    wfhuser_approval_month_income: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    wfhuser_approval_state: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    wfhuser_approval_market: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    wfhuser_approval_openloan: {
      type: DataTypes.STRING(5),
      allowNull: true
    },
    wfhuser_approval_last_updated: {
      type: DataTypes.DATE,
      allowNull: true
    },
    wfhuser_approval_created_at: {
      type: DataTypes.DATE,
      allowNull: false,
      defaultValue: Sequelize.Sequelize.literal('CURRENT_TIMESTAMP')
    }
  }, {
    sequelize,
    tableName: 'wfhuser_approvals',
    timestamps: false,
    indexes: [
      {
        name: "PRIMARY",
        unique: true,
        using: "BTREE",
        fields: [
          { name: "wfhuser_approval_id" },
        ]
      },
    ]
  });
};
