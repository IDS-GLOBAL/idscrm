const Sequelize = require('sequelize');
module.exports = function(sequelize, DataTypes) {
  return sequelize.define('manager_person', {
    manager_id: {
      autoIncrement: true,
      type: DataTypes.BIGINT,
      allowNull: false,
      primaryKey: true
    },
    manager_firstname: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    manager_lastname: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    manager_nickname: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    manager_email: {
      type: DataTypes.STRING(255),
      allowNull: false
    },
    manager_email_verified: {
      type: DataTypes.STRING(1),
      allowNull: true
    },
    manager_title: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    manager_username: {
      type: DataTypes.STRING(50),
      allowNull: true,
      unique: "salesperson_username"
    },
    manager_password: {
      type: DataTypes.STRING(20),
      allowNull: true
    },
    manager_main_number: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    manager_phone_ext: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    manager_mobilephone_number: {
      type: DataTypes.STRING(20),
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
    profile_image_open_url: {
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
    manager_department_id: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    mgrid_addinv_2main_dealerid: {
      type: DataTypes.INTEGER,
      allowNull: true,
      comment: "Salesperson Can Add Cars Affiliated With did"
    },
    manager_reassign_leads: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    manager_approvedeals: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    acct_status: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    sales_pitch: {
      type: DataTypes.TEXT,
      allowNull: true,
      comment: "comments"
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
    team_goal_cars_monthly: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    team_goal_appts_monthly: {
      type: DataTypes.INTEGER,
      allowNull: true
    }
  }, {
    sequelize,
    tableName: 'manager_person',
    timestamps: true,
    indexes: [
      {
        name: "PRIMARY",
        unique: true,
        using: "BTREE",
        fields: [
          { name: "manager_id" },
        ]
      },
      {
        name: "salesperson_username",
        unique: true,
        using: "BTREE",
        fields: [
          { name: "manager_username" },
        ]
      },
    ]
  });
};
