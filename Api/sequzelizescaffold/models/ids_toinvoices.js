const Sequelize = require('sequelize');
module.exports = function(sequelize, DataTypes) {
  return sequelize.define('ids_toinvoices', {
    invoice_id: {
      autoIncrement: true,
      type: DataTypes.BIGINT,
      allowNull: false,
      primaryKey: true
    },
    invoice_typeid: {
      type: DataTypes.INTEGER,
      allowNull: true,
      comment: "1=standard, 2=Shipping, 3=Automatic, 4=New\/test"
    },
    invoice_number: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    invoice_tokenid: {
      type: DataTypes.STRING(150),
      allowNull: false,
      unique: "invoice_tokenid"
    },
    invoice_dealerid: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    invoice_status: {
      type: DataTypes.STRING(10),
      allowNull: false
    },
    invoice_date: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    invoice_terms: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    invoice_duedate: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    invoice_sendtoclient: {
      type: DataTypes.STRING(5),
      allowNull: true
    },
    invoice_senttoclient: {
      type: DataTypes.STRING(5),
      allowNull: true
    },
    dealer_email_recipients: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    invoice_senttoclient_date: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    invoice_currency: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    fee_id1: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    lineitem1: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    fee_description1: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    quantity1: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    fee_price1: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    fee_amount1: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    tax1: {
      type: DataTypes.STRING(5),
      allowNull: true
    },
    fee_id2: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    lineitem2: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    fee_description2: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    quantity2: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    fee_price2: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    fee_amount2: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    tax2: {
      type: DataTypes.STRING(5),
      allowNull: true
    },
    fee_id3: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    lineitem3: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    fee_description3: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    quantity3: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    fee_price3: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    fee_amount3: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    tax3: {
      type: DataTypes.STRING(5),
      allowNull: true
    },
    fee_id4: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    lineitem4: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    fee_description4: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    quantity4: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    fee_price4: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    fee_amount4: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    tax4: {
      type: DataTypes.STRING(5),
      allowNull: true
    },
    fee_id5: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    lineitem5: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    fee_description5: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    quantity5: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    fee_price5: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    fee_amount5: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    tax5: {
      type: DataTypes.STRING(5),
      allowNull: true
    },
    fee_id6: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    lineitem6: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    fee_description6: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    quantity6: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    fee_price6: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    fee_amount6: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    tax6: {
      type: DataTypes.STRING(5),
      allowNull: true
    },
    fee_id7: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    lineitem7: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    fee_description7: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    quantity7: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    fee_price7: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    fee_amount7: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    tax7: {
      type: DataTypes.STRING(5),
      allowNull: true
    },
    fee_id8: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    lineitem8: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    fee_description8: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    quantity8: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    fee_price8: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    fee_amount8: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    tax8: {
      type: DataTypes.STRING(5),
      allowNull: true
    },
    fee_id9: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    lineitem9: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    fee_description9: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    quantity9: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    fee_price9: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    fee_amount9: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    tax9: {
      type: DataTypes.STRING(5),
      allowNull: true
    },
    fee_id10: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    lineitem10: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    fee_description10: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    quantity10: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    fee_price10: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    fee_amount10: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    tax10: {
      type: DataTypes.STRING(5),
      allowNull: true
    },
    fee_id11: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    lineitem11: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    fee_description11: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    quantity11: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    fee_price11: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    fee_amount11: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    tax11: {
      type: DataTypes.STRING(5),
      allowNull: true
    },
    fee_id12: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    lineitem12: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    fee_description12: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    quantity12: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    fee_price12: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    fee_amount12: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    tax12: {
      type: DataTypes.STRING(5),
      allowNull: true
    },
    fee_id13: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    lineitem13: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    fee_description13: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    quantity13: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    fee_price13: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    fee_amount13: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    tax13: {
      type: DataTypes.STRING(5),
      allowNull: true
    },
    fee_id14: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    lineitem14: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    fee_description14: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    quantity14: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    fee_price14: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    fee_amount14: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    tax14: {
      type: DataTypes.STRING(5),
      allowNull: true
    },
    fee_id15: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    lineitem15: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    fee_description15: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    quantity15: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    fee_price15: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    fee_amount15: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    tax15: {
      type: DataTypes.STRING(5),
      allowNull: true
    },
    sales_taxrate: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    tax_total: {
      type: DataTypes.TEXT,
      allowNull: false
    },
    discount_value: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    discount_dollarorpercn: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    invoice_shippinghanding: {
      type: DataTypes.FLOAT,
      allowNull: true
    },
    invoice_arrival_fee: {
      type: DataTypes.FLOAT,
      allowNull: true
    },
    invoice_subtotal: {
      type: DataTypes.TEXT,
      allowNull: false
    },
    tax_shipping: {
      type: DataTypes.INTEGER,
      allowNull: true,
      comment: "Y or N = 1or0"
    },
    tax_arrival_fee: {
      type: DataTypes.INTEGER,
      allowNull: true,
      comment: "Y or N = 1or0"
    },
    invoice_comments: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    terms_conditions: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    invoice_taxtotal: {
      type: DataTypes.TEXT,
      allowNull: false
    },
    invoice_total: {
      type: DataTypes.TEXT,
      allowNull: false
    },
    applied_payment: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    invoice_amount_due: {
      type: DataTypes.TEXT,
      allowNull: false
    },
    dudes_id_lastmodified: {
      type: DataTypes.INTEGER,
      allowNull: false
    },
    invoice_lastmodified: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    invoice_harddatetime: {
      type: DataTypes.TEXT,
      allowNull: false
    },
    invoice_created_at: {
      type: DataTypes.DATE,
      allowNull: false,
      defaultValue: Sequelize.Sequelize.literal('CURRENT_TIMESTAMP')
    },
    payment_typeid: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    payment_type: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    creditCardslct: {
      type: DataTypes.STRING(20),
      allowNull: true
    },
    creditCardnumber: {
      type: DataTypes.STRING(20),
      allowNull: true
    },
    check_number: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    paid_amount: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    credit_amount: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    paymentBalance: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    payment_status: {
      type: DataTypes.TEXT,
      allowNull: false
    },
    paymentNotes: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dudes_id_rcvdpymt: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dudes_id_rcvdpymtwhn: {
      type: DataTypes.TEXT,
      allowNull: true
    }
  }, {
    sequelize,
    tableName: 'ids_toinvoices',
    timestamps: false,
    indexes: [
      {
        name: "PRIMARY",
        unique: true,
        using: "BTREE",
        fields: [
          { name: "invoice_id" },
        ]
      },
      {
        name: "invoice_tokenid",
        unique: true,
        using: "BTREE",
        fields: [
          { name: "invoice_tokenid" },
        ]
      },
    ]
  });
};
