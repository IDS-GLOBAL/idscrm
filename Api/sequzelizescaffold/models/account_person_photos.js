const Sequelize = require('sequelize');
module.exports = function(sequelize, DataTypes) {
  return sequelize.define('account_person_photos', {
    acid_photo_id: {
      autoIncrement: true,
      type: DataTypes.INTEGER,
      allowNull: false,
      primaryKey: true
    },
    acid_photo_account_person_id: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    acid_photo_did: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    acid_photo_team_id: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    acid_photo_status: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    acid_photo_likes: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    acid_photo_abuses: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    acid_photo_byip: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    acid_photo_bymobile: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    acid_photo_bybrowser: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    acid_photo_geo_latitude: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    acid_photo_geo_longitude: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    acid_photo_album_token: {
      type: DataTypes.STRING(150),
      allowNull: false
    },
    acid_photo_albumname: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    acid_photo_albumcomments: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    acid_photo_datetaken: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    acid_photo_sort_orderno: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    acid_photo_added_bywho: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    acid_photo_token: {
      type: DataTypes.TEXT,
      allowNull: false
    },
    acid_photo_file_name: {
      type: DataTypes.TEXT,
      allowNull: false
    },
    acid_photo_open_url: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    acid_photo_file_path: {
      type: DataTypes.TEXT,
      allowNull: false
    },
    acid_photo_file_width: {
      type: DataTypes.STRING(11),
      allowNull: true
    },
    acid_photo_file_height: {
      type: DataTypes.STRING(11),
      allowNull: true
    },
    acid_photo_thumb_fname: {
      type: DataTypes.TEXT,
      allowNull: false
    },
    acid_photo_thumb_fpath: {
      type: DataTypes.TEXT,
      allowNull: false
    },
    acid_photo_caption: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    acid_photo_created_at: {
      type: DataTypes.DATE,
      allowNull: false,
      defaultValue: Sequelize.Sequelize.literal('CURRENT_TIMESTAMP')
    }
  }, {
    sequelize,
    tableName: 'account_person_photos',
    timestamps: false,
    indexes: [
      {
        name: "PRIMARY",
        unique: true,
        using: "BTREE",
        fields: [
          { name: "acid_photo_id" },
        ]
      },
    ]
  });
};
