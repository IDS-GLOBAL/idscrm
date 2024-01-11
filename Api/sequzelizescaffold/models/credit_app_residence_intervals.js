const Sequelize = require('sequelize');
module.exports = function(sequelize, DataTypes) {
  return sequelize.define('credit_app_residence_intervals', {
    residenceId: {
      autoIncrement: true,
      type: DataTypes.INTEGER,
      allowNull: false,
      primaryKey: true
    },
    residenceName: {
      type: DataTypes.TEXT,
      allowNull: false
    },
    residenceValue: {
      type: DataTypes.TEXT,
      allowNull: false
    }
  }, {
    sequelize,
    tableName: 'credit_app_residence_intervals',
    timestamps: false,
    indexes: [
      {
        name: "PRIMARY",
        unique: true,
        using: "BTREE",
        fields: [
          { name: "residenceId" },
        ]
      },
    ]
  });
};
