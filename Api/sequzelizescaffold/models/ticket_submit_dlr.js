const Sequelize = require('sequelize');
module.exports = function(sequelize, DataTypes) {
  return sequelize.define('ticket_submit_dlr', {
    id: {
      autoIncrement: true,
      type: DataTypes.INTEGER,
      allowNull: false,
      primaryKey: true
    },
    ticket_token: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    did: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    contact_name: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    contact_phone: {
      type: DataTypes.STRING(20),
      allowNull: true
    },
    contact_email: {
      type: DataTypes.STRING(100),
      allowNull: true
    },
    status_dudes: {
      type: DataTypes.STRING(11),
      allowNull: true
    },
    priority: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    what_happened: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    what_you_want_to_happen: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    comments_bydlr: {
      type: DataTypes.TEXT,
      allowNull: true,
      comment: "Comments Made By Dealer Associated With This Ticket"
    },
    accept_terms: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    dudesId: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    dudesName: {
      type: DataTypes.STRING(250),
      allowNull: true
    },
    dudesResponse: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dudes_last_modfied: {
      type: DataTypes.DATEONLY,
      allowNull: true
    }
  }, {
    sequelize,
    tableName: 'ticket_submit_dlr',
    timestamps: true,
    indexes: [
      {
        name: "PRIMARY",
        unique: true,
        using: "BTREE",
        fields: [
          { name: "id" },
        ]
      },
    ]
  });
};
