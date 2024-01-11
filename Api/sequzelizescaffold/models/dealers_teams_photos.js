const Sequelize = require('sequelize');
module.exports = function(sequelize, DataTypes) {
  return sequelize.define('dealers_teams_photos', {
    team_photo_id: {
      autoIncrement: true,
      type: DataTypes.INTEGER,
      allowNull: false,
      primaryKey: true
    },
    team_photo_team_id: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    team_photo_did: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    team_photo_status: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    team_photo_likes: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    team_photo_abuses: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    team_photo_byip: {
      type: DataTypes.STRING(20),
      allowNull: true
    },
    team_photo_bymobile: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    team_photo_bybrowser: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    team_photo_geo_latitude: {
      type: DataTypes.STRING(20),
      allowNull: true
    },
    team_photo_longitude: {
      type: DataTypes.STRING(20),
      allowNull: true
    },
    team_photo_album_token: {
      type: DataTypes.TEXT,
      allowNull: false
    },
    team_photo_albumname: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    team_photo_albumcomments: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    team_photo_datetaken: {
      type: DataTypes.DATE,
      allowNull: false
    },
    team_photo_sort_orderno: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    team_photo_bywho: {
      type: DataTypes.TEXT,
      allowNull: false
    },
    team_photo_token: {
      type: DataTypes.TEXT,
      allowNull: false
    },
    team_photo_file_name: {
      type: DataTypes.TEXT,
      allowNull: false
    },
    team_photo_open_url: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    team_photo_file_path: {
      type: DataTypes.TEXT,
      allowNull: false
    },
    team_photo_width: {
      type: DataTypes.TEXT,
      allowNull: false
    },
    team_photo_height: {
      type: DataTypes.TEXT,
      allowNull: false
    },
    team_photo_thumb_fname: {
      type: DataTypes.TEXT,
      allowNull: false
    },
    team_photo_thumb_fpath: {
      type: DataTypes.TEXT,
      allowNull: false
    },
    team_photo_caption: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    team_photo_created_at: {
      type: DataTypes.DATE,
      allowNull: false,
      defaultValue: Sequelize.Sequelize.literal('CURRENT_TIMESTAMP')
    }
  }, {
    sequelize,
    tableName: 'dealers_teams_photos',
    timestamps: false,
    indexes: [
      {
        name: "PRIMARY",
        unique: true,
        using: "BTREE",
        fields: [
          { name: "team_photo_id" },
        ]
      },
    ]
  });
};
