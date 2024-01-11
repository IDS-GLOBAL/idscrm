const Sequelize = require('sequelize');
module.exports = function(sequelize, DataTypes) {
  return sequelize.define('ids_toinvoices_log_cat', {
    log_cat_id: {
      autoIncrement: true,
      type: DataTypes.INTEGER,
      allowNull: false,
      primaryKey: true
    },
    log_cat_did: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    log_cat_sid: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    log_cat_body: {
      type: DataTypes.TEXT,
      allowNull: false
    },
    log_cat_created_at: {
      type: DataTypes.DATE,
      allowNull: false,
      defaultValue: Sequelize.Sequelize.literal('CURRENT_TIMESTAMP')
    }
  }, {
    sequelize,
    tableName: 'ids_toinvoices_log_cat',
    timestamps: false,
    indexes: [
      {
        name: "PRIMARY",
        unique: true,
        using: "BTREE",
        fields: [
          { name: "log_cat_id" },
        ]
      },
    ]
  });
};
