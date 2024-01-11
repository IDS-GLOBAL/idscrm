const Sequelize = require('sequelize');
module.exports = function(sequelize, DataTypes) {
  return sequelize.define('car_model', {
    id: {
      autoIncrement: true,
      type: DataTypes.BIGINT,
      allowNull: false,
      primaryKey: true
    },
    make_id: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    make: {
      type: DataTypes.STRING(255),
      allowNull: false
    },
    model: {
      type: DataTypes.STRING(255),
      allowNull: false
    },
    vyear: {
      type: DataTypes.STRING(5),
      allowNull: true
    },
    thisdid: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    created_when: {
      type: DataTypes.DATE,
      allowNull: true,
      defaultValue: Sequelize.Sequelize.literal('CURRENT_TIMESTAMP')
    }
  }, {
    sequelize,
    tableName: 'car_model',
    timestamps: false,
    indexes: [
      {
        name: "PRIMARY",
        unique: true,
        using: "BTREE",
        fields: [
          { name: "id" },
        ]
      },
      {
        name: "make",
        type: "FULLTEXT",
        fields: [
          { name: "make" },
        ]
      },
      {
        name: "model",
        type: "FULLTEXT",
        fields: [
          { name: "model" },
        ]
      },
    ]
  });
};
