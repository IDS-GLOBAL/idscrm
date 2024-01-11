const Sequelize = require('sequelize');
module.exports = function(sequelize, DataTypes) {
  return sequelize.define('ids_toinvoices_sent', {
    invoice_sent_id: {
      autoIncrement: true,
      type: DataTypes.INTEGER,
      allowNull: false,
      primaryKey: true
    },
    invoice_sent_invoice_id: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    invoice_sent_invoice_no: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    invoice_sent_did: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    invoice_sent_emailto: {
      type: DataTypes.TEXT,
      allowNull: false
    },
    invoice_sent_dayslate: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    invoice_sent_datetime: {
      type: DataTypes.TEXT,
      allowNull: false
    },
    invoice_sent_created_at: {
      type: DataTypes.DATE,
      allowNull: false,
      defaultValue: Sequelize.Sequelize.literal('CURRENT_TIMESTAMP')
    }
  }, {
    sequelize,
    tableName: 'ids_toinvoices_sent',
    timestamps: false,
    indexes: [
      {
        name: "PRIMARY",
        unique: true,
        using: "BTREE",
        fields: [
          { name: "invoice_sent_id" },
        ]
      },
    ]
  });
};
