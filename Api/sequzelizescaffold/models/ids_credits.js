const Sequelize = require('sequelize');
module.exports = function(sequelize, DataTypes) {
  return sequelize.define('ids_credits', {
    credit_pckg_id: {
      autoIncrement: true,
      type: DataTypes.INTEGER,
      allowNull: false,
      primaryKey: true
    },
    credit_pckg_type: {
      type: DataTypes.STRING(11),
      allowNull: false
    },
    credit_pckg_chargtoinvoice: {
      type: DataTypes.STRING(5),
      allowNull: true
    },
    credit_pckg_description: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    credit_pckg_price: {
      type: DataTypes.STRING(20),
      allowNull: true
    },
    credit_pckg_amount: {
      type: DataTypes.STRING(20),
      allowNull: true
    },
    credit_pckg_dude_id: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    credit_pckg_dude_id_name: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    credit_pckg_created_at: {
      type: DataTypes.DATE,
      allowNull: false,
      defaultValue: Sequelize.Sequelize.literal('CURRENT_TIMESTAMP')
    }
  }, {
    sequelize,
    tableName: 'ids_credits',
    timestamps: false,
    indexes: [
      {
        name: "PRIMARY",
        unique: true,
        using: "BTREE",
        fields: [
          { name: "credit_pckg_id" },
        ]
      },
    ]
  });
};
