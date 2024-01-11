const Sequelize = require('sequelize');
module.exports = function(sequelize, DataTypes) {
  return sequelize.define('vvin_ten', {
    vinten_id: {
      autoIncrement: true,
      type: DataTypes.INTEGER,
      allowNull: false,
      primaryKey: true
    },
    vinten_code: {
      type: DataTypes.STRING(1),
      allowNull: false
    },
    vinten_year: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    vinten_yearabrv: {
      type: DataTypes.INTEGER,
      allowNull: false
    }
  }, {
    sequelize,
    tableName: 'vvin_ten',
    timestamps: false,
    indexes: [
      {
        name: "PRIMARY",
        unique: true,
        using: "BTREE",
        fields: [
          { name: "vinten_id" },
        ]
      },
    ]
  });
};
