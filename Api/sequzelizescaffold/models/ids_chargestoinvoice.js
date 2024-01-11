const Sequelize = require('sequelize');
module.exports = function(sequelize, DataTypes) {
  return sequelize.define('ids_chargestoinvoice', {
    charges_id: {
      autoIncrement: true,
      type: DataTypes.INTEGER,
      allowNull: false,
      primaryKey: true
    },
    charges_dealerid: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    charges_toinvoicenumber: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    charges_invoiceToken: {
      type: DataTypes.TEXT,
      allowNull: false
    },
    charges_lineitem: {
      type: DataTypes.INTEGER,
      allowNull: false,
      comment: "What Line Item to Show?"
    },
    charges_fee_id: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    charges_fee_type: {
      type: DataTypes.TEXT,
      allowNull: false
    },
    charges_fee_description: {
      type: DataTypes.TEXT,
      allowNull: false
    },
    charges_fee_qty: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    charges_fee_taxed: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    charges_fee_price: {
      type: DataTypes.FLOAT,
      allowNull: false
    },
    charges_amount: {
      type: DataTypes.FLOAT,
      allowNull: false
    },
    charges_source_id: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    charges_source_name: {
      type: DataTypes.TEXT,
      allowNull: false
    },
    charges_hardtime: {
      type: DataTypes.TEXT,
      allowNull: false
    },
    charges_created_at: {
      type: DataTypes.DATE,
      allowNull: false,
      defaultValue: Sequelize.Sequelize.literal('CURRENT_TIMESTAMP'),
      comment: "only for mysql do not display"
    }
  }, {
    sequelize,
    tableName: 'ids_chargestoinvoice',
    timestamps: false,
    indexes: [
      {
        name: "PRIMARY",
        unique: true,
        using: "BTREE",
        fields: [
          { name: "charges_id" },
        ]
      },
    ]
  });
};
