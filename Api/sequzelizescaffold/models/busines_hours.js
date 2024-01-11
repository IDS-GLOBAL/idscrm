const Sequelize = require('sequelize');
module.exports = function(sequelize, DataTypes) {
  return sequelize.define('busines_hours', {
    bus_hours_Id: {
      autoIncrement: true,
      type: DataTypes.INTEGER,
      allowNull: false,
      primaryKey: true,
      comment: "Record ID count"
    },
    bus_hours_name: {
      type: DataTypes.STRING(10),
      allowNull: true,
      comment: "Business Hours"
    }
  }, {
    sequelize,
    tableName: 'busines_hours',
    timestamps: false,
    indexes: [
      {
        name: "PRIMARY",
        unique: true,
        using: "BTREE",
        fields: [
          { name: "bus_hours_Id" },
        ]
      },
    ]
  });
};
