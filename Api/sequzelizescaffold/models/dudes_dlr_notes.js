const Sequelize = require('sequelize');
module.exports = function(sequelize, DataTypes) {
  return sequelize.define('dudes_dlr_notes', {
    dudes_dlr_notes_id: {
      autoIncrement: true,
      type: DataTypes.INTEGER,
      allowNull: false,
      primaryKey: true,
      comment: "autoincrement"
    },
    dudes_dlr_notes_did: {
      type: DataTypes.INTEGER,
      allowNull: false,
      comment: "dudes ID"
    },
    dudes_dlr_notes_dude_id: {
      type: DataTypes.INTEGER,
      allowNull: false,
      comment: "Dealer ID"
    },
    dudes_dlr_notes_dude_name: {
      type: DataTypes.STRING(250),
      allowNull: false,
      comment: "Text Written"
    },
    dudes_dlr_notes_body: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dudes_dlr_notes_created_at: {
      type: DataTypes.DATE,
      allowNull: false,
      defaultValue: Sequelize.Sequelize.literal('CURRENT_TIMESTAMP')
    }
  }, {
    sequelize,
    tableName: 'dudes_dlr_notes',
    timestamps: false,
    indexes: [
      {
        name: "PRIMARY",
        unique: true,
        using: "BTREE",
        fields: [
          { name: "dudes_dlr_notes_id" },
        ]
      },
    ]
  });
};
