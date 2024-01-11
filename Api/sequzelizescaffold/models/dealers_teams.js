const Sequelize = require('sequelize');
module.exports = function(sequelize, DataTypes) {
  return sequelize.define('dealers_teams', {
    dlr_team_id: {
      autoIncrement: true,
      type: DataTypes.INTEGER,
      allowNull: false,
      primaryKey: true
    },
    dlr_team_did: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    dlr_team_status: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    dlr_team_photo_open_url: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dlr_team_photo_url: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dlr_team_photo_filename: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dlr_team_name: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dlr_team_description: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dlr_team_created_at: {
      type: DataTypes.DATE,
      allowNull: false,
      defaultValue: Sequelize.Sequelize.literal('CURRENT_TIMESTAMP')
    }
  }, {
    sequelize,
    tableName: 'dealers_teams',
    timestamps: false,
    indexes: [
      {
        name: "PRIMARY",
        unique: true,
        using: "BTREE",
        fields: [
          { name: "dlr_team_id" },
        ]
      },
    ]
  });
};
