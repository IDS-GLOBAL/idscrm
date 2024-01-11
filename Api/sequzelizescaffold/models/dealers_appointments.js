const Sequelize = require('sequelize');
module.exports = function(sequelize, DataTypes) {
  return sequelize.define('dealers_appointments', {
    dlr_appt_id: {
      autoIncrement: true,
      type: DataTypes.INTEGER,
      allowNull: false,
      primaryKey: true
    },
    ids_sys_owned: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    ids_dudes_id: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    appt_realcost: {
      type: DataTypes.STRING(10),
      allowNull: true,
      comment: "The Cost to Charge this dealer for this lead"
    },
    dlr_appt_internal_profit: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    dlr_dudes_demo: {
      type: DataTypes.STRING(20),
      allowNull: true,
      comment: "if this appointment is a ids dealer demo"
    },
    appointment_completed: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    appointment_snooze: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    dlr_appt_customer_id: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    dlr_appt_creditapp_id: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    dlr_appt_lead_id: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    dlr_appt_token: {
      type: DataTypes.TEXT,
      allowNull: false
    },
    dlr_appt_robot_sendemail: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    dlr_appt_dlrpending_did: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    dlr_appt_did: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    dlr_appt_prospectdlrid: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    dlr_appt_sid: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    dlr_appt_salesname_txt: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dlr_appt_mgr_id: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    dlr_appt_mgrname_txt: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dlr_appt_acid: {
      type: DataTypes.INTEGER,
      allowNull: true,
      comment: "Account Person ID"
    },
    dlr_appt_acidname_txt: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dlr_appt_reprshop_id: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    dlr_appt_reprshopname_txt: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dlr_appt_vid: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    dlr_appt_vid_descrp: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dlr_appt_task_id: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    dlr_appt_task_action_id: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    dlr_appt_title: {
      type: DataTypes.TEXT,
      allowNull: false
    },
    dlr_appt_notes: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    appt_url_goto: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dlr_appt_dlrtimezone: {
      type: DataTypes.STRING(50),
      allowNull: false
    },
    dlr_appt_starttime_humanread: {
      type: DataTypes.STRING(20),
      allowNull: true
    },
    dlr_appt_endtime_humanread: {
      type: DataTypes.STRING(20),
      allowNull: true
    },
    dlr_appt_startunixtime: {
      type: DataTypes.DATE,
      allowNull: false
    },
    dlr_appt_endunixtime: {
      type: DataTypes.DATE,
      allowNull: false
    },
    dlr_appt_startunixtime_milli: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    dlr_appt_endunixtime_milli: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    dlr_appt_passtime: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    dlr_appt_updated_time: {
      type: DataTypes.DATE,
      allowNull: true
    },
    dlr_appt_created_at: {
      type: DataTypes.DATE,
      allowNull: false,
      defaultValue: Sequelize.Sequelize.literal('CURRENT_TIMESTAMP')
    }
  }, {
    sequelize,
    tableName: 'dealers_appointments',
    timestamps: false,
    indexes: [
      {
        name: "PRIMARY",
        unique: true,
        using: "BTREE",
        fields: [
          { name: "dlr_appt_id" },
        ]
      },
    ]
  });
};
