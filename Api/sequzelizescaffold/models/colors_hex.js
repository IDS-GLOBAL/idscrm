const Sequelize = require('sequelize');
module.exports = function(sequelize, DataTypes) {
  return sequelize.define('colors_hex', {
    color_id: {
      autoIncrement: true,
      type: DataTypes.INTEGER,
      allowNull: false,
      primaryKey: true
    },
    color_name: {
      type: DataTypes.STRING(20),
      allowNull: false
    },
    color_hex: {
      type: DataTypes.STRING(7),
      allowNull: false
    }
  }, {
    sequelize,
    tableName: 'colors_hex',
    timestamps: false,
    indexes: [
      {
        name: "PRIMARY",
        unique: true,
        using: "BTREE",
        fields: [
          { name: "color_id" },
        ]
      },
    ]
  });
};
