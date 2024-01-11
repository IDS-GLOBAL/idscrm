const Sequelize = require('sequelize');
module.exports = function(sequelize, DataTypes) {
  return sequelize.define('vvin_wmifivesixseven_model', {
    vin_model_id: {
      autoIncrement: true,
      type: DataTypes.INTEGER,
      allowNull: false,
      primaryKey: true
    },
    vin_model_make: {
      type: DataTypes.TEXT,
      allowNull: false
    },
    vin_model_code: {
      type: DataTypes.STRING(3),
      allowNull: true
    },
    vin_model_models_id: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    vin_model_year: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    vin_model_name: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    vin_model_trim: {
      type: DataTypes.TEXT,
      allowNull: false
    },
    vin_last_six_code: {
      type: DataTypes.STRING(6),
      allowNull: true
    },
    vin_vin_valid: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    vin_vin_caught: {
      type: DataTypes.STRING(17),
      allowNull: false
    },
    vin_did: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    vin_created_at: {
      type: DataTypes.DATE,
      allowNull: false,
      defaultValue: Sequelize.Sequelize.literal('CURRENT_TIMESTAMP')
    }
  }, {
    sequelize,
    tableName: 'vvin_wmifivesixseven_model',
    timestamps: false,
    indexes: [
      {
        name: "PRIMARY",
        unique: true,
        using: "BTREE",
        fields: [
          { name: "vin_model_id" },
        ]
      },
    ]
  });
};
