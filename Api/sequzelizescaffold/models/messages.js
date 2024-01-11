const Sequelize = require('sequelize');
module.exports = function(sequelize, DataTypes) {
  return sequelize.define('messages', {
    msg_id: {
      autoIncrement: true,
      type: DataTypes.BIGINT,
      allowNull: false,
      primaryKey: true
    },
    msg_title: {
      type: DataTypes.STRING(150),
      allowNull: false
    },
    msg_body: {
      type: DataTypes.STRING(5000),
      allowNull: false
    },
    vid: {
      type: DataTypes.INTEGER,
      allowNull: true,
      comment: "vehicle id"
    },
    did: {
      type: DataTypes.INTEGER,
      allowNull: true,
      comment: "dealer id"
    },
    cid: {
      type: DataTypes.INTEGER,
      allowNull: true,
      comment: "customer id that this belongs too"
    },
    abuse: {
      type: DataTypes.INTEGER,
      allowNull: true,
      comment: "the be reported as abuse 0-no 1-yes"
    },
    read: {
      type: DataTypes.INTEGER,
      allowNull: true,
      comment: "0=no 1=yes for read or unread"
    },
    read_when: {
      type: DataTypes.DATE,
      allowNull: true,
      comment: "when message was read"
    }
  }, {
    sequelize,
    tableName: 'messages',
    timestamps: true,
    indexes: [
      {
        name: "PRIMARY",
        unique: true,
        using: "BTREE",
        fields: [
          { name: "msg_id" },
        ]
      },
      {
        name: "msg_title",
        type: "FULLTEXT",
        fields: [
          { name: "msg_title" },
        ]
      },
      {
        name: "msg_body",
        type: "FULLTEXT",
        fields: [
          { name: "msg_body" },
        ]
      },
    ]
  });
};
