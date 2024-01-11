const Sequelize = require('sequelize');
module.exports = function(sequelize, DataTypes) {
  return sequelize.define('visitor_bdc_dealer', {
    visitor_bdc_dealer_id: {
      autoIncrement: true,
      type: DataTypes.BIGINT,
      allowNull: false,
      primaryKey: true
    },
    visitor_id: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    visitor_status: {
      type: DataTypes.STRING(7),
      allowNull: true
    },
    visitor_attractVisitorCmd: {
      type: DataTypes.STRING(25),
      allowNull: true,
      comment: "dealer commanding"
    },
    visitor_vehicle_id: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    dealer_id: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    dealer_status: {
      type: DataTypes.STRING(7),
      allowNull: true
    },
    dealer_alarm_newvisitor: {
      type: DataTypes.STRING(10),
      allowNull: false
    },
    dudes_id_bdc: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    dudes_id_bdc_name: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    dealer_invite_visitor: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    visitor_accept_invite: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    dealer_typing: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    visitor_typing: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    visitor_timechatting: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    visitor_loggedout: {
      type: DataTypes.DATE,
      allowNull: true
    },
    dealer_loggedout: {
      type: DataTypes.DATE,
      allowNull: true
    },
    ' dealer_timechatting': {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    dealer_record_token: {
      type: DataTypes.STRING(250),
      allowNull: true
    },
    record_created_at: {
      type: DataTypes.DATE,
      allowNull: false,
      defaultValue: Sequelize.Sequelize.literal('CURRENT_TIMESTAMP')
    }
  }, {
    sequelize,
    tableName: 'visitor_bdc_dealer',
    timestamps: false,
    indexes: [
      {
        name: "PRIMARY",
        unique: true,
        using: "BTREE",
        fields: [
          { name: "visitor_bdc_dealer_id" },
        ]
      },
    ]
  });
};
