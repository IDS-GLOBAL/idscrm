const Sequelize = require('sequelize');
module.exports = function(sequelize, DataTypes) {
  return sequelize.define('car_make', {
    make_id: {
      autoIncrement: true,
      type: DataTypes.INTEGER,
      allowNull: false,
      primaryKey: true
    },
    car_make: {
      type: DataTypes.STRING(20),
      allowNull: false
    }
  }, {
    sequelize,
    tableName: 'car_make',
    timestamps: false,
    indexes: [
      {
        name: "PRIMARY",
        unique: true,
        using: "BTREE",
        fields: [
          { name: "make_id" },
        ]
      },
    ]
  });
};
