const Sequelize = require('sequelize');
module.exports = function(sequelize, DataTypes) {
  return sequelize.define('vehicle_photos', {
    v_photoid: {
      autoIncrement: true,
      type: DataTypes.BIGINT,
      allowNull: false,
      primaryKey: true,
      comment: "Vehicle Photo ID"
    },
    sort_orderno: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    vehicle_id: {
      type: DataTypes.BIGINT,
      allowNull: false,
      comment: "Vehicle ID"
    },
    dealer_id: {
      type: DataTypes.BIGINT,
      allowNull: false,
      comment: "Dealer ID"
    },
    prospctdlrid: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    salesperson_id: {
      type: DataTypes.BIGINT,
      allowNull: true
    },
    photo_dudes_id: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    vehicleVin: {
      type: DataTypes.STRING(20),
      allowNull: true,
      comment: "The Vin Number Of Vehicle"
    },
    photo_file_name: {
      type: DataTypes.TEXT,
      allowNull: false
    },
    photo_file_path: {
      type: DataTypes.TEXT,
      allowNull: false
    },
    impPhotoFilePath: {
      type: DataTypes.TEXT,
      allowNull: true,
      comment: "Imported From Vehicle Feed"
    },
    photo_file_width: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    photo_file_height: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    photo_thumb_fname: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    photo_thumb_fpath: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    v_caption: {
      type: DataTypes.STRING(150),
      allowNull: true
    }
  }, {
    sequelize,
    tableName: 'vehicle_photos',
    timestamps: true,
    indexes: [
      {
        name: "PRIMARY",
        unique: true,
        using: "BTREE",
        fields: [
          { name: "v_photoid" },
        ]
      },
    ]
  });
};
