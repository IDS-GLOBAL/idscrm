const Sequelize = require('sequelize');
module.exports = function(sequelize, DataTypes) {
  return sequelize.define('wfh_dealers', {
    wfh_dealer_id: {
      autoIncrement: true,
      type: DataTypes.INTEGER,
      allowNull: false,
      primaryKey: true
    },
    wfh_dealer_did: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_type_id: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_company_name: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    wfh_dealer_contact_name: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    wfh_dealer_tracking_phonestatus: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    wfh_dealer_tracking_phoneno: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    wfh_dealer_main_phoneno: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    wfh_dealer_2nd_phoneno: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    wfh_dealer_address: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    wfh_dealer_city: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    wfh_dealer_state_id: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    wfh_dealer_zip: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    wfh_dealer_zip4: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    wfh_dealer_website_url: {
      type: DataTypes.STRING(250),
      allowNull: true
    },
    wfh_dealer_lead_status: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    wfh_dealer_creditapp_status: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    wfh_dealer_creditapp_id: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    wfh_dealer_facebook_url: {
      type: DataTypes.STRING(250),
      allowNull: true
    },
    wfh_dealer_twitter_url: {
      type: DataTypes.STRING(100),
      allowNull: true
    },
    wfh_dealer_autocheck_status: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    wfh_dealer_carfax_status: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    wfh_dealer_livechat_status: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    wfh_dealer_google_mapurl: {
      type: DataTypes.STRING(500),
      allowNull: false
    },
    wfh_dealer_google_mapframe: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    wfh_dealer_finance_APR: {
      type: DataTypes.STRING(10),
      allowNull: true,
      comment: "whatever this apr value is set to will quick quote"
    },
    wfh_dealer_finance_diclaimer: {
      type: DataTypes.TEXT,
      allowNull: false
    },
    wfh_dealer_autobiography: {
      type: DataTypes.TEXT,
      allowNull: false
    },
    wfh_dealer_created_at: {
      type: DataTypes.DATE,
      allowNull: false,
      defaultValue: Sequelize.Sequelize.literal('CURRENT_TIMESTAMP'),
      comment: "Time Dealer Activated This Table"
    },
    wfh_dealer_market_id_1: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_2: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_3: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_4: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_5: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_6: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_7: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_8: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_9: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_10: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_11: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_12: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_13: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_14: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_15: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_16: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_17: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_18: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_19: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_20: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_21: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_22: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_23: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_24: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_25: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_26: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_27: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_28: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_29: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_30: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_31: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_32: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_33: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_34: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_35: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_36: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_37: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_38: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_39: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_40: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_41: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_42: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_43: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_44: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_45: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_46: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_47: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_48: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_49: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_50: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_51: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_52: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_53: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_54: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_55: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_56: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_57: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_58: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_59: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_60: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_61: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_62: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_63: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_64: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_65: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_66: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_67: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_68: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_69: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_70: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_71: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_72: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_73: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_74: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_75: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_76: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_77: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_78: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_79: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_80: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_81: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_82: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_83: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_84: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_85: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_86: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_87: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_88: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_89: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_90: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_91: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_92: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_93: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_94: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_95: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_96: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_97: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_98: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_99: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_100: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_101: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_102: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_103: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_104: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_105: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_106: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_107: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_108: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_109: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_110: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_111: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_112: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_113: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_114: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_115: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_116: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_117: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_118: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_119: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_120: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_121: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_122: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_123: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_124: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_125: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_126: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_127: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_128: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_129: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_130: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_131: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_132: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_133: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_134: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_135: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_136: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_137: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_138: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_139: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_140: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_141: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_142: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_143: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_144: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_145: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_146: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_147: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_148: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_149: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_150: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_151: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_152: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_153: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_154: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_155: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_156: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_157: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_158: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_159: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_160: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_161: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_162: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_163: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_164: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_165: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_166: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_167: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_168: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_169: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_170: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_171: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_172: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_173: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_174: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_175: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_176: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_177: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_178: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_179: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_180: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_181: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_182: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_183: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_184: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_185: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_186: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_187: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_188: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_189: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_190: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_191: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_192: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_193: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_194: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_195: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_196: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_197: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_198: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_199: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_200: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_201: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_202: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_203: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_204: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_205: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_206: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_207: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_208: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_209: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_210: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_211: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_212: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_213: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_214: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_215: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_216: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_217: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_218: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_219: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_220: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_221: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_222: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_223: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_224: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_225: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_226: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_227: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_228: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_229: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_230: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_231: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_232: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_233: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_234: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_235: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_236: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_237: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_238: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_239: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_240: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_241: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_242: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_243: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_244: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_245: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_246: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_247: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_248: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_249: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_250: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_251: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_252: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_253: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_254: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_255: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_256: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_257: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_258: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_259: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_260: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_261: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_262: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_263: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_264: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_265: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_266: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_267: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_268: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_269: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_270: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_271: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_272: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_273: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_274: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_275: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_276: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_277: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_278: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_279: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_280: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_281: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_282: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_283: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_284: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_285: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_286: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_287: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_288: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_289: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_290: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_291: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_292: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_293: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_294: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_295: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_296: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_297: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_298: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_299: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_300: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_301: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_302: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_303: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_304: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_305: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_306: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_307: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_308: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_309: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_310: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_311: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_312: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_313: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_314: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_315: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_316: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_317: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_318: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_319: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_320: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_321: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_322: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_323: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_324: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_325: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_326: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_327: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_328: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_329: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_330: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_331: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_332: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_333: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_334: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_335: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_336: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_337: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_338: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_339: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_340: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_341: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_342: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_343: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_344: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_345: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_346: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_347: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_348: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_349: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_350: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_351: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_352: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_353: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_354: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_355: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_356: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_357: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_358: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_359: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_360: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_361: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_362: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_363: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_364: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_365: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_366: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_367: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_368: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_369: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_370: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_371: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_372: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_373: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_374: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_375: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_376: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_377: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_378: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_379: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_380: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_381: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_382: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_383: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_384: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_385: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_386: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_387: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_388: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_389: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_390: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_391: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_392: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_393: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_394: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_395: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_396: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_397: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_398: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_399: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_400: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_401: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_402: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_403: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_404: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_405: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_406: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_407: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_408: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_409: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_410: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_411: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_412: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_413: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_414: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_415: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    wfh_dealer_market_id_416: {
      type: DataTypes.INTEGER,
      allowNull: false
    }
  }, {
    sequelize,
    tableName: 'wfh_dealers',
    timestamps: false,
    indexes: [
      {
        name: "PRIMARY",
        unique: true,
        using: "BTREE",
        fields: [
          { name: "wfh_dealer_id" },
        ]
      },
      {
        name: "wfh_dealer_finance_APR",
        using: "BTREE",
        fields: [
          { name: "wfh_dealer_finance_APR" },
        ]
      },
      {
        name: "wfh_dealer_company_name",
        using: "BTREE",
        fields: [
          { name: "wfh_dealer_company_name" },
        ]
      },
      {
        name: "wfh_dealer_zip",
        using: "BTREE",
        fields: [
          { name: "wfh_dealer_zip" },
        ]
      },
      {
        name: "wfh_dealer_city",
        using: "BTREE",
        fields: [
          { name: "wfh_dealer_city" },
        ]
      },
    ]
  });
};
