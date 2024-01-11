const Sequelize = require('sequelize');
module.exports = function(sequelize, DataTypes) {
  return sequelize.define('testimonials', {
    id: {
      autoIncrement: true,
      type: DataTypes.INTEGER,
      allowNull: false,
      primaryKey: true
    },
    testimony_did: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    testimony_vid: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    testimony_token: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    testimony_status: {
      type: DataTypes.INTEGER,
      allowNull: false,
      comment: "0=off 1=on"
    },
    name: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    email: {
      type: DataTypes.STRING(100),
      allowNull: true
    },
    phone: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    subject: {
      type: DataTypes.STRING(100),
      allowNull: true
    },
    body: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    uploaded_image: {
      type: DataTypes.TEXT,
      allowNull: false
    },
    sortno: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    rating1_10: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    date_created_at: {
      type: DataTypes.DATE,
      allowNull: false,
      defaultValue: Sequelize.Sequelize.literal('CURRENT_TIMESTAMP')
    }
  }, {
    sequelize,
    tableName: 'testimonials',
    timestamps: false,
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
