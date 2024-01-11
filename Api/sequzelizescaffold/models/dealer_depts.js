const Sequelize = require('sequelize');
module.exports = function(sequelize, DataTypes) {
  return sequelize.define('dealer_depts', {
    dept_id: {
      autoIncrement: true,
      type: DataTypes.BIGINT,
      allowNull: false,
      primaryKey: true
    },
    dept_did: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    dept_mgr_id: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    dept_status: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    dept_link: {
      type: DataTypes.STRING(100),
      allowNull: true
    },
    dept_name: {
      type: DataTypes.STRING(250),
      allowNull: true
    },
    dept_phoneno: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dept_address: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    monday_open: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    monday_closed: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    tuesday_open: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    tuesday_closed: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    wednesday_open: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    wednesday_closed: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    thursday_open: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    thursday_closed: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    friday_open: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    friday_closed: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    saturday_open: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    saturday_closed: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    sunday_open: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    sunday_closed: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    new_yearseve_comments: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    new_yearseve_open: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    new_yearseve_close: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    new_yearsday_comments: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    new_yearsday_open: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    new_yearsday_close: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    independence_day_comments: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    independence_day_open: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    independence_day_close: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    veterans_day_comments: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    veterans_day_open: {
      type: DataTypes.TEXT,
      allowNull: false
    },
    veterans_day_close: {
      type: DataTypes.TEXT,
      allowNull: false
    },
    blackfriday_comments: {
      type: DataTypes.TEXT,
      allowNull: false
    },
    blackfriday_open: {
      type: DataTypes.TEXT,
      allowNull: false
    },
    blackfriday_close: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    thanksgiving_comments: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    thanksgiving_open: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    thanksgiving_close: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    christmas_eve_comments: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    christmas_eve_open: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    christmas_eve_close: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    christmas_day_comments: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    christmas_day_open: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    christmas_day_close: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dept_created_at: {
      type: DataTypes.DATE,
      allowNull: false,
      defaultValue: Sequelize.Sequelize.literal('CURRENT_TIMESTAMP')
    }
  }, {
    sequelize,
    tableName: 'dealer_depts',
    timestamps: false,
    indexes: [
      {
        name: "PRIMARY",
        unique: true,
        using: "BTREE",
        fields: [
          { name: "dept_id" },
        ]
      },
    ]
  });
};
