const Sequelize = require('sequelize');
module.exports = function(sequelize, DataTypes) {
  return sequelize.define('repairshops_dealers_relationships', {
    rprdlr_relationships_id: {
      autoIncrement: true,
      type: DataTypes.INTEGER,
      allowNull: false,
      primaryKey: true
    },
    rprdlr_relationships_repair_shop_id: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    rprdlr_relationships_repair_shopoklvl: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    rprdlr_relationships_repair_shopoklvl_when: {
      type: DataTypes.DATE,
      allowNull: true
    },
    rprdlr_relationships_dealer_id: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    rprdlr_relationships_dealeroklvl: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    rprdlr_relationships_dealeroklvl_when: {
      type: DataTypes.DATE,
      allowNull: true
    },
    rprdlr_relationships_created_at: {
      type: DataTypes.DATE,
      allowNull: false,
      defaultValue: Sequelize.Sequelize.literal('CURRENT_TIMESTAMP')
    }
  }, {
    sequelize,
    tableName: 'repairshops_dealers_relationships',
    timestamps: false,
    indexes: [
      {
        name: "PRIMARY",
        unique: true,
        using: "BTREE",
        fields: [
          { name: "rprdlr_relationships_id" },
        ]
      },
    ]
  });
};
