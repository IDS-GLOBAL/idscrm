const Sequelize = require('sequelize');
module.exports = function(sequelize, DataTypes) {
  return sequelize.define('on_off', {
    id: {
      type: DataTypes.INTEGER,
      allowNull: false,
      primaryKey: true
    },
    on: {
      type: DataTypes.TEXT,
      allowNull: false
    },
    off: {
      type: DataTypes.TEXT,
      allowNull: false
    },
    access: {
      type: DataTypes.TEXT,
      allowNull: false
    }
  }, {
    sequelize,
    tableName: 'on_off',
    timestamps: false
  });
};
