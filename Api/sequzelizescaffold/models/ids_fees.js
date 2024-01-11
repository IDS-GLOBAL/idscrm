const Sequelize = require('sequelize');
module.exports = function(sequelize, DataTypes) {
  return sequelize.define('ids_fees', {
    fee_id: {
      autoIncrement: true,
      type: DataTypes.INTEGER,
      allowNull: false,
      primaryKey: true
    },
    fee_type: {
      type: DataTypes.TEXT,
      allowNull: false
    },
    fee_description: {
      type: DataTypes.TEXT,
      allowNull: false
    },
    fee_taxed: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    fee_price: {
      type: DataTypes.TEXT,
      allowNull: false
    },
    fee_amount: {
      type: DataTypes.TEXT,
      allowNull: false
    },
    fee_source_id: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    fee_source_name: {
      type: DataTypes.TEXT,
      allowNull: false
    }
  }, {
    sequelize,
    tableName: 'ids_fees',
    timestamps: false,
    indexes: [
      {
        name: "PRIMARY",
        unique: true,
        using: "BTREE",
        fields: [
          { name: "fee_id" },
        ]
      },
    ]
  });
};
