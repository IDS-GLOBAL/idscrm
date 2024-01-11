const Sequelize = require('sequelize');
module.exports = function(sequelize, DataTypes) {
  return sequelize.define('ferrari_dm', {
    dealer_dmid: {
      autoIncrement: true,
      type: DataTypes.INTEGER,
      allowNull: false,
      primaryKey: true
    },
    Dealer: {
      type: DataTypes.STRING(200),
      allowNull: false
    },
    market_dmid: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    submarket_dmid: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    Address: {
      type: DataTypes.STRING(100),
      allowNull: true
    },
    state_dmid: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    City: {
      type: DataTypes.STRING(100),
      allowNull: true
    },
    ZIP: {
      type: DataTypes.INTEGER,
      allowNull: true
    }
  }, {
    sequelize,
    tableName: 'ferrari_dm',
    timestamps: false,
    indexes: [
      {
        name: "PRIMARY",
        unique: true,
        using: "BTREE",
        fields: [
          { name: "dealer_dmid" },
        ]
      },
    ]
  });
};
