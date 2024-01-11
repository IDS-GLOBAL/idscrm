const Sequelize = require('sequelize');
module.exports = function(sequelize, DataTypes) {
  return sequelize.define('makes', {
    id: {
      autoIncrement: true,
      type: DataTypes.BIGINT,
      allowNull: false
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
    }
  }, {
    sequelize,
    tableName: 'makes',
    timestamps: false,
    indexes: [
      {
        name: "id",
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
