const Sequelize = require('sequelize');
module.exports = function(sequelize, DataTypes) {
  return sequelize.define('markets', {
    market_id: {
      autoIncrement: true,
      type: DataTypes.INTEGER,
      allowNull: false,
      primaryKey: true
    },
    state_id: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    market_name: {
      type: DataTypes.STRING(50),
      allowNull: false
    },
    state_name: {
      type: DataTypes.STRING(25),
      allowNull: false
    },
    state_abrv: {
      type: DataTypes.STRING(10),
      allowNull: false
    },
    market_status: {
      type: DataTypes.INTEGER,
      allowNull: false
    }
  }, {
    sequelize,
    tableName: 'markets',
    timestamps: false,
    indexes: [
      {
        name: "PRIMARY",
        unique: true,
        using: "BTREE",
        fields: [
          { name: "market_id" },
        ]
      },
    ]
  });
};
