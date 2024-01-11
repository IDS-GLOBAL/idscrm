const Sequelize = require('sequelize');
module.exports = function(sequelize, DataTypes) {
  return sequelize.define('cust_lead_notes', {
    leadnote_id: {
      autoIncrement: true,
      type: DataTypes.INTEGER,
      allowNull: false,
      primaryKey: true
    },
    lead_cust_leadid: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    lead_note_did: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    lead_note_nametext: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    lead_note_body: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    lead_note_created: {
      type: DataTypes.DATE,
      allowNull: false,
      defaultValue: Sequelize.Sequelize.literal('CURRENT_TIMESTAMP')
    }
  }, {
    sequelize,
    tableName: 'cust_lead_notes',
    timestamps: false,
    indexes: [
      {
        name: "PRIMARY",
        unique: true,
        using: "BTREE",
        fields: [
          { name: "leadnote_id" },
        ]
      },
    ]
  });
};
