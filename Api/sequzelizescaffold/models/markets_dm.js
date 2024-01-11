const Sequelize = require('sequelize');
module.exports = function(sequelize, DataTypes) {
  return sequelize.define('markets_dm', {
    market_id: {
      autoIncrement: true,
      type: DataTypes.INTEGER,
      allowNull: false,
      primaryKey: true
    },
    market: {
      type: DataTypes.STRING(100),
      allowNull: true
    },
    state_id: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    craigslist_url: {
      type: DataTypes.STRING(200),
      allowNull: false
    },
    wfh_url: {
      type: DataTypes.STRING(200),
      allowNull: false
    },
    market_status: {
      type: DataTypes.INTEGER,
      allowNull: false
    }
  }, {
    sequelize,
    tableName: 'markets_dm',
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
