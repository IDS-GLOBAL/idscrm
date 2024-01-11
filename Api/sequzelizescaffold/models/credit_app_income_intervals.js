const Sequelize = require('sequelize');
module.exports = function(sequelize, DataTypes) {
  return sequelize.define('credit_app_income_intervals', {
    income_interval_id: {
      autoIncrement: true,
      type: DataTypes.INTEGER,
      allowNull: false,
      primaryKey: true
    },
    income_interval_name: {
      type: DataTypes.STRING(25),
      allowNull: false
    }
  }, {
    sequelize,
    tableName: 'credit_app_income_intervals',
    timestamps: false,
    indexes: [
      {
        name: "PRIMARY",
        unique: true,
        using: "BTREE",
        fields: [
          { name: "income_interval_id" },
        ]
      },
    ]
  });
};
