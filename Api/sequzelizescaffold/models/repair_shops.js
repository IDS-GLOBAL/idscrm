const Sequelize = require('sequelize');
module.exports = function(sequelize, DataTypes) {
  return sequelize.define('repair_shops', {
    repairshops_id: {
      autoIncrement: true,
      type: DataTypes.INTEGER,
      allowNull: false,
      primaryKey: true,
      comment: "Repair Shop ID Unique"
    },
    repairshops_main_did: {
      type: DataTypes.INTEGER,
      allowNull: false,
      comment: "Main Did May Join With Dealers ID To See Appts and vehicles mainly pure transparency"
    },
    repairshops_hasmany_dids: {
      type: DataTypes.INTEGER,
      allowNull: false,
      comment: "Has Multiple Dids 1 yes 0 no"
    },
    repairshops_multiple_dids: {
      type: DataTypes.TEXT,
      allowNull: true,
      comment: "Multiple Dids"
    },
    repairshops_status: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    repairshops_company_name: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    repairshops_email: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    repairshops_password: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    repairshops_main_phoneno: {
      type: DataTypes.STRING(50),
      allowNull: false
    },
    repairshops_main_phone_ext: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    repairshops_website_httpurl: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    repairshops_store_image: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    repairshops_sales_pitch: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    repairshops_message_description: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    repairshops_streetno: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    repairshops_streetname: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    repairshops_city: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    repairshops_state: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    repairshops_zip: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    repairshops_created_at: {
      type: DataTypes.DATE,
      allowNull: false,
      defaultValue: Sequelize.Sequelize.literal('CURRENT_TIMESTAMP')
    }
  }, {
    sequelize,
    tableName: 'repair_shops',
    timestamps: false,
    indexes: [
      {
        name: "PRIMARY",
        unique: true,
        using: "BTREE",
        fields: [
          { name: "repairshops_id" },
        ]
      },
    ]
  });
};
