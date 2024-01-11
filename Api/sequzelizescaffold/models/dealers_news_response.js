const Sequelize = require('sequelize');
module.exports = function(sequelize, DataTypes) {
  return sequelize.define('dealers_news_response', {
    dlr_news_response_id: {
      autoIncrement: true,
      type: DataTypes.INTEGER,
      allowNull: false,
      primaryKey: true
    },
    dlr_news_response_token: {
      type: DataTypes.TEXT,
      allowNull: false
    },
    dlr_news_response_news_id: {
      type: DataTypes.INTEGER,
      allowNull: false,
      comment: "dlr_news_id From dealers_news"
    },
    dlr_news_response_did: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    dlr_news_response_sid: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    dlr_news_response_mgr_id: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    dlr_news_response_acid: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    dlr_news_response_reprshop_id: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    dlr_news_response_profile_pic: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dlr_news_response_name: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dlr_news_response_body: {
      type: DataTypes.TEXT,
      allowNull: false
    },
    dlr_news_response_created_at: {
      type: DataTypes.DATE,
      allowNull: false,
      defaultValue: Sequelize.Sequelize.literal('CURRENT_TIMESTAMP')
    }
  }, {
    sequelize,
    tableName: 'dealers_news_response',
    timestamps: false,
    indexes: [
      {
        name: "PRIMARY",
        unique: true,
        using: "BTREE",
        fields: [
          { name: "dlr_news_response_id" },
        ]
      },
    ]
  });
};
