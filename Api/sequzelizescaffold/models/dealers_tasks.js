const Sequelize = require('sequelize');
module.exports = function(sequelize, DataTypes) {
  return sequelize.define('dealers_tasks', {
    task_id: {
      autoIncrement: true,
      type: DataTypes.INTEGER,
      allowNull: false,
      primaryKey: true
    },
    task_completed: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    task_snooze: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    task_token: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    robot_sendemail: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    task_did: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    task_vid: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    task_action_id: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    task_title: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    task_sid: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    task_sid_salesname_txt: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    task_mgrname_txt: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    task_mgr_id: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    task_acidname_txt: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    task_acid_id: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    task_reprshopname_txt: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    task_reprshop_id: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    task_timezone: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    taskstart_unixtime: {
      type: DataTypes.DATE,
      allowNull: true
    },
    taskend_unixtime: {
      type: DataTypes.DATE,
      allowNull: true
    },
    task_starttime_milli: {
      type: DataTypes.BIGINT,
      allowNull: true
    },
    task_endtime_milli: {
      type: DataTypes.BIGINT,
      allowNull: true
    },
    task_message: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    task_created_at: {
      type: DataTypes.DATE,
      allowNull: false,
      defaultValue: Sequelize.Sequelize.literal('CURRENT_TIMESTAMP')
    }
  }, {
    sequelize,
    tableName: 'dealers_tasks',
    timestamps: false,
    indexes: [
      {
        name: "PRIMARY",
        unique: true,
        using: "BTREE",
        fields: [
          { name: "task_id" },
        ]
      },
    ]
  });
};
