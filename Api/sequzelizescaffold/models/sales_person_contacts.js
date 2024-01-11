const Sequelize = require('sequelize');
module.exports = function(sequelize, DataTypes) {
  return sequelize.define('sales_person_contacts', {
    salesperson_contact_id: {
      autoIncrement: true,
      type: DataTypes.BIGINT,
      allowNull: false,
      primaryKey: true
    },
    salesperson_id: {
      type: DataTypes.BIGINT,
      allowNull: false
    },
    salesperson_ct_cust_leadid: {
      type: DataTypes.BIGINT,
      allowNull: false
    },
    salesperson_ct_cust_fname: {
      type: DataTypes.STRING(50),
      allowNull: false
    },
    salesperson_ct_cust_mname: {
      type: DataTypes.STRING(50),
      allowNull: false
    },
    salesperson_ct_cust_lname: {
      type: DataTypes.STRING(50),
      allowNull: false
    },
    salesperson_ct_cust_nickname: {
      type: DataTypes.STRING(255),
      allowNull: false
    },
    salesperson_cust_email: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    salesperson_ct_cust_facebookid: {
      type: DataTypes.BIGINT,
      allowNull: false
    },
    salesperson_ct_cust_facebooktoken: {
      type: DataTypes.STRING(500),
      allowNull: false
    },
    salesperson_ct_cust_birthdate: {
      type: DataTypes.STRING(100),
      allowNull: false
    },
    salesperson_ct_cust_phone: {
      type: DataTypes.STRING(50),
      allowNull: false
    },
    salesperson_ct_cust_phonetype: {
      type: DataTypes.STRING(25),
      allowNull: false
    },
    salesperson_ct_cust_dealer_id: {
      type: DataTypes.STRING(20),
      allowNull: false
    },
    salesperson_ct_cust_vehicle_id: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    salesperson_ct_cust_vehicle_id2: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    salesperson_ct_cust_vehicle_id3: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    salesperson_ct_cust_vehicle_id4: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    salesperson_ct_cust_vehicle_id5: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    salesperson_ct_cust_created_at: {
      type: DataTypes.DATE,
      allowNull: false,
      defaultValue: Sequelize.Sequelize.literal('CURRENT_TIMESTAMP')
    }
  }, {
    sequelize,
    tableName: 'sales_person_contacts',
    timestamps: false,
    indexes: [
      {
        name: "PRIMARY",
        unique: true,
        using: "BTREE",
        fields: [
          { name: "salesperson_contact_id" },
        ]
      },
    ]
  });
};
