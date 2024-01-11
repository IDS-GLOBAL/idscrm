const Sequelize = require('sequelize');
module.exports = function(sequelize, DataTypes) {
  return sequelize.define('dealers_news', {
    dlr_news_id: {
      autoIncrement: true,
      type: DataTypes.INTEGER,
      allowNull: false,
      primaryKey: true
    },
    dlr_news_token: {
      type: DataTypes.STRING(100),
      allowNull: false
    },
    dlr_news_did: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    dlr_news_sid: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    dlr_news_acid: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    dlr_news_mgrid: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    dlr_news_repair_shopid: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    dlr_news_name: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dlr_news_team_id: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    dlr_news_status: {
      type: DataTypes.STRING(100),
      allowNull: true
    },
    dlr_news_email: {
      type: DataTypes.STRING(100),
      allowNull: true
    },
    dlr_news_body: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dlr_news_profile_pic: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dlr_news_created_at_milli: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    dlr_news_creatd_at: {
      type: DataTypes.DATE,
      allowNull: false,
      defaultValue: Sequelize.Sequelize.literal('CURRENT_TIMESTAMP')
    }
  }, {
    sequelize,
    tableName: 'dealers_news',
    timestamps: false,
    indexes: [
      {
        name: "PRIMARY",
        unique: true,
        using: "BTREE",
        fields: [
          { name: "dlr_news_id" },
        ]
      },
    ]
  });
};
