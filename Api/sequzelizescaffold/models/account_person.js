const Sequelize = require('sequelize');
module.exports = function(sequelize, DataTypes) {
  return sequelize.define('account_person', {
    account_person_id: {
      autoIncrement: true,
      type: DataTypes.BIGINT,
      allowNull: false,
      primaryKey: true
    },
    account_firstname: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    account_lastname: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    account_nickname: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    account_email: {
      type: DataTypes.STRING(100),
      allowNull: true
    },
    account_email_verified: {
      type: DataTypes.STRING(1),
      allowNull: true
    },
    account_title: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    account_username: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    account_password: {
      type: DataTypes.STRING(20),
      allowNull: true
    },
    account_main_number: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    account_phone_ext: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    account_mobilephone_number: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    website_url: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    profile_image: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dealer_id: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    team_id: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    team_name: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    account_department_id: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    acid_addinv_2main_dealerid: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    account_outgoing_emails: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    account_accept_payments: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    acct_status: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    sales_pitch: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    prof_motto: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    prof_hometown: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    prof_sportsteam: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    prof_dreamvact: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    prof_favfood: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    prof_favtvshow: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    goal_monthly_monies_collect: {
      type: DataTypes.INTEGER,
      allowNull: true
    }
  }, {
    sequelize,
    tableName: 'account_person',
    timestamps: true,
    indexes: [
      {
        name: "PRIMARY",
        unique: true,
        using: "BTREE",
        fields: [
          { name: "account_person_id" },
        ]
      },
    ]
  });
};
