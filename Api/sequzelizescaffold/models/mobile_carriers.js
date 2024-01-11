const Sequelize = require('sequelize');
module.exports = function(sequelize, DataTypes) {
  return sequelize.define('mobile_carriers', {
    carrier_id: {
      autoIncrement: true,
      type: DataTypes.INTEGER,
      allowNull: false,
      primaryKey: true
    },
    carrier_label: {
      type: DataTypes.STRING(50),
      allowNull: false
    },
    carrier_url: {
      type: DataTypes.STRING(30),
      allowNull: false
    },
    carrier_example: {
      type: DataTypes.STRING(150),
      allowNull: false
    }
  }, {
    sequelize,
    tableName: 'mobile_carriers',
    timestamps: false,
    indexes: [
      {
        name: "PRIMARY",
        unique: true,
        using: "BTREE",
        fields: [
          { name: "carrier_id" },
        ]
      },
    ]
  });
};
