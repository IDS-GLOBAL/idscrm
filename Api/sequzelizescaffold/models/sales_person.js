const Sequelize = require('sequelize');
module.exports = function(sequelize, DataTypes) {
  return sequelize.define('sales_person', {
    salesperson_id: {
      autoIncrement: true,
      type: DataTypes.BIGINT,
      allowNull: false,
      primaryKey: true
    },
    salesperson_firstname: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    salesperson_lastname: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    salesperson_nickname: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    salesperson_email: {
      type: DataTypes.STRING(255),
      allowNull: true
    },
    salesperson_email_verified: {
      type: DataTypes.STRING(1),
      allowNull: true
    },
    salesperson_username: {
      type: DataTypes.STRING(50),
      allowNull: true,
      unique: "salesperson_username"
    },
    salesperson_password: {
      type: DataTypes.STRING(20),
      allowNull: true
    },
    salesperson_mobilephone_number: {
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
    ids_profile_image: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    main_dealerid: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    sid_addinv_2main_dealerid: {
      type: DataTypes.INTEGER,
      allowNull: true,
      comment: "Salesperson Can Add Cars Affiliated With did"
    },
    acct_status: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    salesperson_catchleads: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    salesperson_job_title: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    position_title: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    salesperson_department_id: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    team_id: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    team_name: {
      type: DataTypes.STRING(25),
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
    goal_cars_monthly: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    goal_appts_monthly: {
      type: DataTypes.INTEGER,
      allowNull: true
    }
  }, {
    sequelize,
    tableName: 'sales_person',
    timestamps: true,
    indexes: [
      {
        name: "PRIMARY",
        unique: true,
        using: "BTREE",
        fields: [
          { name: "salesperson_id" },
        ]
      },
      {
        name: "salesperson_username",
        unique: true,
        using: "BTREE",
        fields: [
          { name: "salesperson_username" },
        ]
      },
    ]
  });
};
