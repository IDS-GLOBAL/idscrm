const Sequelize = require('sequelize');
module.exports = function(sequelize, DataTypes) {
  return sequelize.define('vehicle_videos', {
    vvideo_id: {
      autoIncrement: true,
      type: DataTypes.BIGINT,
      allowNull: false,
      primaryKey: true
    },
    vvideo_vid: {
      type: DataTypes.BIGINT,
      allowNull: false
    },
    vvideo_did: {
      type: DataTypes.BIGINT,
      allowNull: false
    },
    video_title: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    vvideo_dlr_comment: {
      type: DataTypes.STRING(5000),
      allowNull: true
    },
    vvideo_youtube_link: {
      type: DataTypes.STRING(250),
      allowNull: true
    },
    vvideo_file_name: {
      type: DataTypes.STRING(250),
      allowNull: true
    },
    vvideo_path: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    vvideo_type: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    vvideo_size: {
      type: DataTypes.STRING(150),
      allowNull: true
    }
  }, {
    sequelize,
    tableName: 'vehicle_videos',
    timestamps: true,
    indexes: [
      {
        name: "PRIMARY",
        unique: true,
        using: "BTREE",
        fields: [
          { name: "vvideo_id" },
        ]
      },
      {
        name: "vvideo_file_name",
        using: "BTREE",
        fields: [
          { name: "vvideo_file_name" },
        ]
      },
    ]
  });
};
