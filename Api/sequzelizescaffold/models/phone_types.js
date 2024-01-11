const Sequelize = require('sequelize');
module.exports = function(sequelize, DataTypes) {
  return sequelize.define('phone_types', {
    phone_type_id: {
      autoIncrement: true,
      type: DataTypes.INTEGER,
      allowNull: false,
      primaryKey: true
    },
    phone_type_value: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    phone_type_name: {
      type: DataTypes.TEXT,
      allowNull: false
    },
    phone_type_status: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    phone_type_create_at: {
      type: DataTypes.DATE,
      allowNull: false,
      defaultValue: Sequelize.Sequelize.literal('CURRENT_TIMESTAMP')
    }
  }, {
    sequelize,
    tableName: 'phone_types',
    timestamps: false,
    indexes: [
      {
        name: "PRIMARY",
        unique: true,
        using: "BTREE",
        fields: [
          { name: "phone_type_id" },
        ]
      },
    ]
  });
};
