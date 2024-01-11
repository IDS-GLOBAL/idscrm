const Sequelize = require('sequelize');
module.exports = function(sequelize, DataTypes) {
  return sequelize.define('cust_lead_source', {
    source_id: {
      autoIncrement: true,
      type: DataTypes.INTEGER,
      allowNull: false,
      primaryKey: true
    },
    cust_lead_source: {
      type: DataTypes.STRING(50),
      allowNull: true,
      comment: "Label For cust_lead_source"
    }
  }, {
    sequelize,
    tableName: 'cust_lead_source',
    timestamps: false,
    indexes: [
      {
        name: "PRIMARY",
        unique: true,
        using: "BTREE",
        fields: [
          { name: "source_id" },
        ]
      },
    ]
  });
};
