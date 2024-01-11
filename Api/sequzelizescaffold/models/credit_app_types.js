const Sequelize = require('sequelize');
module.exports = function(sequelize, DataTypes) {
  return sequelize.define('credit_app_types', {
    credit_app_type_id: {
      autoIncrement: true,
      type: DataTypes.INTEGER,
      allowNull: false,
      primaryKey: true
    },
    credit_app_type_source: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    credit_app_type_company: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    credit_app_type_label: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    credit_app_type_url: {
      type: DataTypes.STRING(150),
      allowNull: true
    }
  }, {
    sequelize,
    tableName: 'credit_app_types',
    timestamps: false,
    indexes: [
      {
        name: "PRIMARY",
        unique: true,
        using: "BTREE",
        fields: [
          { name: "credit_app_type_id" },
        ]
      },
      {
        name: "credit_app_type_source",
        using: "BTREE",
        fields: [
          { name: "credit_app_type_source" },
          { name: "credit_app_type_company" },
          { name: "credit_app_type_label" },
          { name: "credit_app_type_url" },
        ]
      },
    ]
  });
};
