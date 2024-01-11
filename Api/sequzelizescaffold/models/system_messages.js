const Sequelize = require('sequelize');
module.exports = function(sequelize, DataTypes) {
  return sequelize.define('system_messages', {
    sys_msg_id: {
      autoIncrement: true,
      type: DataTypes.INTEGER,
      allowNull: false,
      primaryKey: true
    },
    sys_msg_title: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    sys_msg_body: {
      type: DataTypes.TEXT,
      allowNull: false
    },
    sys_msg_type: {
      type: DataTypes.STRING(150),
      allowNull: false
    },
    sys_msg_vid: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    sys_msg_did: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    sys_msg_sid: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    sys_msg_cid: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    sys_msg_abuse: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    sys_msg_read: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    sys_msg_read_when: {
      type: DataTypes.DATE,
      allowNull: false
    },
    sys_msg_created_at: {
      type: DataTypes.DATE,
      allowNull: false,
      defaultValue: Sequelize.Sequelize.literal('CURRENT_TIMESTAMP')
    }
  }, {
    sequelize,
    tableName: 'system_messages',
    timestamps: false,
    indexes: [
      {
        name: "PRIMARY",
        unique: true,
        using: "BTREE",
        fields: [
          { name: "sys_msg_id" },
        ]
      },
    ]
  });
};
