const Sequelize = require('sequelize');
module.exports = function(sequelize, DataTypes) {
  return sequelize.define('states', {
    state_id: {
      autoIncrement: true,
      type: DataTypes.INTEGER,
      allowNull: false,
      primaryKey: true
    },
    state_name: {
      type: DataTypes.STRING(20),
      allowNull: false
    },
    state_abrv: {
      type: DataTypes.STRING(2),
      allowNull: false
    },
    sate_name_url: {
      type: DataTypes.STRING(12),
      allowNull: false
    },
    state_abrv_url: {
      type: DataTypes.STRING(2),
      allowNull: false
    },
    state_capital: {
      type: DataTypes.STRING(25),
      allowNull: false
    },
    dealer_tavt_state_link: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    state_latitude: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    state_longitude: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    state_zoomto: {
      type: DataTypes.STRING(50),
      allowNull: true
    }
  }, {
    sequelize,
    tableName: 'states',
    timestamps: false,
    indexes: [
      {
        name: "PRIMARY",
        unique: true,
        using: "BTREE",
        fields: [
          { name: "state_id" },
        ]
      },
      {
        name: "state_capital",
        type: "FULLTEXT",
        fields: [
          { name: "state_capital" },
        ]
      },
    ]
  });
};
