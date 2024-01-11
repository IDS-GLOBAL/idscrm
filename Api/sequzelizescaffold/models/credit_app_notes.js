const Sequelize = require('sequelize');
module.exports = function(sequelize, DataTypes) {
  return sequelize.define('credit_app_notes', {
    credit_app_notes_id: {
      autoIncrement: true,
      type: DataTypes.INTEGER,
      allowNull: false,
      primaryKey: true
    },
    credit_app_notes_fullblowapp_id: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    credit_app_notes_did: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    credit_app_notes_internal_comments: {
      type: DataTypes.TEXT,
      allowNull: false
    },
    credit_app_notes_create_at: {
      type: DataTypes.DATE,
      allowNull: false,
      defaultValue: Sequelize.Sequelize.literal('CURRENT_TIMESTAMP')
    }
  }, {
    sequelize,
    tableName: 'credit_app_notes',
    timestamps: false,
    indexes: [
      {
        name: "PRIMARY",
        unique: true,
        using: "BTREE",
        fields: [
          { name: "credit_app_notes_id" },
        ]
      },
    ]
  });
};
