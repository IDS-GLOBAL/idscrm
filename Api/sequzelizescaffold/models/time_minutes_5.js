const Sequelize = require('sequelize');
module.exports = function(sequelize, DataTypes) {
  return sequelize.define('time_minutes_5', {
    fivemin_id: {
      autoIncrement: true,
      type: DataTypes.INTEGER,
      allowNull: false,
      primaryKey: true
    },
    fivemin_name: {
      type: DataTypes.STRING(2),
      allowNull: true
    }
  }, {
    sequelize,
    tableName: 'time_minutes_5',
    timestamps: false,
    indexes: [
      {
        name: "PRIMARY",
        unique: true,
        using: "BTREE",
        fields: [
          { name: "fivemin_id" },
        ]
      },
    ]
  });
};
