const Sequelize = require('sequelize');
module.exports = function(sequelize, DataTypes) {
  return sequelize.define('wfh_dealer_types', {
    wfh_dealer_type_id: {
      autoIncrement: true,
      type: DataTypes.INTEGER,
      allowNull: false,
      primaryKey: true
    },
    wfh_dealer_type_name: {
      type: DataTypes.STRING(11),
      allowNull: false
    }
  }, {
    sequelize,
    tableName: 'wfh_dealer_types',
    timestamps: false,
    indexes: [
      {
        name: "PRIMARY",
        unique: true,
        using: "BTREE",
        fields: [
          { name: "wfh_dealer_type_id" },
        ]
      },
    ]
  });
};
