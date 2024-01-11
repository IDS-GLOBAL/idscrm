const Sequelize = require('sequelize');
module.exports = function(sequelize, DataTypes) {
  return sequelize.define('vehicle_options', {
    voption_id: {
      autoIncrement: true,
      type: DataTypes.INTEGER,
      allowNull: false,
      primaryKey: true
    },
    voption_name: {
      type: DataTypes.TEXT,
      allowNull: false
    },
    voption_years: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    voption_show: {
      type: DataTypes.INTEGER,
      allowNull: false,
      defaultValue: 1
    },
    voption_equip_cat: {
      type: DataTypes.STRING(25),
      allowNull: false
    }
  }, {
    sequelize,
    tableName: 'vehicle_options',
    timestamps: false,
    indexes: [
      {
        name: "PRIMARY",
        unique: true,
        using: "BTREE",
        fields: [
          { name: "voption_id" },
        ]
      },
    ]
  });
};
