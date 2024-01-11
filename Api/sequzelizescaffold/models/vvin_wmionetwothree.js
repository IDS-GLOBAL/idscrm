const Sequelize = require('sequelize');
module.exports = function(sequelize, DataTypes) {
  return sequelize.define('vvin_wmionetwothree', {
    vvin_wmi_id: {
      autoIncrement: true,
      type: DataTypes.INTEGER,
      allowNull: false,
      primaryKey: true
    },
    vvin_wmi_code: {
      type: DataTypes.STRING(25),
      allowNull: false
    },
    vvin_wmi_manuf: {
      type: DataTypes.STRING(25),
      allowNull: false
    }
  }, {
    sequelize,
    tableName: 'vvin_wmionetwothree',
    timestamps: false,
    indexes: [
      {
        name: "PRIMARY",
        unique: true,
        using: "BTREE",
        fields: [
          { name: "vvin_wmi_id" },
        ]
      },
    ]
  });
};
