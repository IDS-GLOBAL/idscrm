const Sequelize = require('sequelize');
module.exports = function(sequelize, DataTypes) {
  return sequelize.define('markets_sub_dm', {
    market_sub_id: {
      autoIncrement: true,
      type: DataTypes.INTEGER,
      allowNull: false,
      primaryKey: true
    },
    market_sub_name: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    market_id: {
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
    market_sub_status: {
      type: DataTypes.INTEGER,
      allowNull: false
    }
  }, {
    sequelize,
    tableName: 'markets_sub_dm',
    timestamps: false,
    indexes: [
      {
        name: "PRIMARY",
        unique: true,
        using: "BTREE",
        fields: [
          { name: "market_sub_id" },
        ]
      },
    ]
  });
};
