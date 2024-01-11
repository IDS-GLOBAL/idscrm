const Sequelize = require('sequelize');
module.exports = function(sequelize, DataTypes) {
  return sequelize.define('vehicles_transfer', {
    vtransfer_id: {
      autoIncrement: true,
      type: DataTypes.INTEGER,
      allowNull: false,
      primaryKey: true
    },
    vtransfer_oldid: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    vtransfer_vid: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    vtransfer_newdid: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    vtransfer_newid_reqdate: {
      type: DataTypes.DATE,
      allowNull: true
    },
    vtransfer_oldid_createdate: {
      type: DataTypes.DATE,
      allowNull: true
    },
    vtransfer_admin_approved: {
      type: DataTypes.STRING(5),
      allowNull: true
    },
    vtransfer_complete: {
      type: DataTypes.STRING(5),
      allowNull: true
    },
    vtransfer_record_created_at: {
      type: DataTypes.DATE,
      allowNull: false,
      defaultValue: Sequelize.Sequelize.literal('CURRENT_TIMESTAMP')
    }
  }, {
    sequelize,
    tableName: 'vehicles_transfer',
    timestamps: false,
    indexes: [
      {
        name: "PRIMARY",
        unique: true,
        using: "BTREE",
        fields: [
          { name: "vtransfer_id" },
        ]
      },
    ]
  });
};
