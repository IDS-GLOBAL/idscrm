const Sequelize = require('sequelize');
module.exports = function(sequelize, DataTypes) {
  return sequelize.define('manager_person_photos', {
    mgrid_photo_id: {
      autoIncrement: true,
      type: DataTypes.INTEGER,
      allowNull: false,
      primaryKey: true
    },
    mgrid_photo_manager_id: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    mgrid_photo_did: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    mgrid_photo_team_id: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    mgrid_photo_status: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    mgrid_photo_likes: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    mgrid_photo_abuses: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    mgrid_photo_byip: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    mgrid_photo_bymobile: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    mgrid_photo_bybrowser: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    mgrid_photo_geo_latitude: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    mgrid_photo_geo_longitude: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    mgrid_photo_album_token: {
      type: DataTypes.STRING(150),
      allowNull: false
    },
    mgrid_photo_albumname: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    mgrid_photo_albumcomments: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    mgrid_photo_datetaken: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    mgrid_photo_sort_orderno: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    mgrid_photo_added_bywho: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    mgrid_photo_token: {
      type: DataTypes.TEXT,
      allowNull: false
    },
    mgrid_photo_file_name: {
      type: DataTypes.TEXT,
      allowNull: false
    },
    mgrid_photo_open_url: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    mgrid_photo_file_path: {
      type: DataTypes.TEXT,
      allowNull: false
    },
    mgrid_photo_file_width: {
      type: DataTypes.STRING(11),
      allowNull: true
    },
    mgrid_photo_file_height: {
      type: DataTypes.STRING(11),
      allowNull: true
    },
    mgrid_photo_thumb_fname: {
      type: DataTypes.TEXT,
      allowNull: false
    },
    mgrid_photo_thumb_fpath: {
      type: DataTypes.TEXT,
      allowNull: false
    },
    mgrid_photo_caption: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    mgrid_photo_created_at: {
      type: DataTypes.DATE,
      allowNull: false,
      defaultValue: Sequelize.Sequelize.literal('CURRENT_TIMESTAMP')
    }
  }, {
    sequelize,
    tableName: 'manager_person_photos',
    timestamps: false,
    indexes: [
      {
        name: "PRIMARY",
        unique: true,
        using: "BTREE",
        fields: [
          { name: "mgrid_photo_id" },
        ]
      },
    ]
  });
};
