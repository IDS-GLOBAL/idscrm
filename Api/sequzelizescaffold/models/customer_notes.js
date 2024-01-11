const Sequelize = require('sequelize');
module.exports = function(sequelize, DataTypes) {
  return sequelize.define('customer_notes', {
    note_id: {
      autoIncrement: true,
      type: DataTypes.INTEGER,
      allowNull: false,
      primaryKey: true
    },
    note_customerid: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    note_did: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    note_nametext: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    note_body: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    note_created: {
      type: DataTypes.DATE,
      allowNull: false,
      defaultValue: Sequelize.Sequelize.literal('CURRENT_TIMESTAMP')
    }
  }, {
    sequelize,
    tableName: 'customer_notes',
    timestamps: false,
    indexes: [
      {
        name: "PRIMARY",
        unique: true,
        using: "BTREE",
        fields: [
          { name: "note_id" },
        ]
      },
    ]
  });
};
