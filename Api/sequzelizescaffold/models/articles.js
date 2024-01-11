const Sequelize = require('sequelize');
module.exports = function(sequelize, DataTypes) {
  return sequelize.define('articles', {
    id: {
      autoIncrement: true,
      type: DataTypes.INTEGER,
      allowNull: false,
      primaryKey: true
    },
    title: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    content: {
      type: DataTypes.STRING(10000),
      allowNull: true
    },
    tags: {
      type: DataTypes.STRING(500),
      allowNull: true
    },
    sort_num: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    modified_at: {
      type: DataTypes.DATE,
      allowNull: true
    }
  }, {
    sequelize,
    tableName: 'articles',
    timestamps: true,
    indexes: [
      {
        name: "PRIMARY",
        unique: true,
        using: "BTREE",
        fields: [
          { name: "id" },
        ]
      },
    ]
  });
};
