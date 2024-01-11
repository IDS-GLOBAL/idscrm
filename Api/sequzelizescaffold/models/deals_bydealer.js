const Sequelize = require('sequelize');
module.exports = function(sequelize, DataTypes) {
  return sequelize.define('deals_bydealer', {
    deal_id: {
      autoIncrement: true,
      type: DataTypes.INTEGER,
      allowNull: false,
      primaryKey: true
    },
    deal_token: {
      type: DataTypes.STRING(100),
      allowNull: false,
      comment: "Token To View"
    },
    deal_number: {
      type: DataTypes.INTEGER,
      allowNull: false,
      comment: "Should Increase per Dealer"
    },
    deal_dealerID: {
      type: DataTypes.INTEGER,
      allowNull: false,
      comment: "Dealers ID"
    },
    credit_app_id: {
      type: DataTypes.INTEGER,
      allowNull: true,
      comment: "Credit Application"
    },
    vehicle_id: {
      type: DataTypes.INTEGER,
      allowNull: true,
      comment: "Vehicles ID"
    },
    customer_id: {
      type: DataTypes.INTEGER,
      allowNull: true,
      comment: "id from customers table"
    },
    appointment_id: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    tavt_fee_required: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    tavt_fee: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    salesPerson1ID: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    salesPerson1Name: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    salesPerson2ID: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    salesPerson2Name: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    salesMgrID: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    salesMgrName: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    financeMgrID: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    financeMgrName: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    vStockno: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    vCondition: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    vYear: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    vMake: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    vModel: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    vTrim: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    vBodyType: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    vColor: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    vEngineCyls: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    vVin: {
      type: DataTypes.STRING(17),
      allowNull: true
    },
    vMileage: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    vLeinHolderNm: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    vLeinHolderAddr: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    vLeinHolderAddr2: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    vLeinHolderCity: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    vLeinHolderState: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    vLeinHolderZip: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    vLeinHolderLeinNo: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    vLeinHolderPhnNo: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    vInsurCompNm: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    vInsurCompAddr: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    vInsurCompAddr2: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    vInsurCompCity: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    vInsurCompState: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    vInsurCompZip: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    tradeACV: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    OA: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    vTradeYr: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    vTradeMk: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    vTradeModel: {
      type: DataTypes.STRING(25),
      allowNull: true
    },
    vTradeTrim: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    vTradeColor: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    vTradeVin: {
      type: DataTypes.STRING(17),
      allowNull: true
    },
    vTradeMiles: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    vTradeAllow: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    vTradePayOff: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    vTradeLicsfee: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    vTradeDecal: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    vTradeStikNo: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    vTradeOwner: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    vTradeTagNo: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    vTradeTagState: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    vTradeTitle: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    vTradeTagExprDate: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    leinHolderTradeSelct: {
      type: DataTypes.STRING(100),
      allowNull: true
    },
    vTradePayoffCompany: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    vTradeLeinHldrAcctNo: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    vTradePayoffCompanyAddr: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    vTradePayoffCompanyAddr2: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    vTradeVerifiedBy: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    vTradeVerifiedByName: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    vTradePayoffCompanyCity: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    vTradePayoffCompanyState: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    vTradePayoffCompanyZip: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    vTradePayoffGoodUntil: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    vTradePayoffPerDiem: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    vTradePayoffCompanyPhoneno: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    vTradeOpenRO: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    vTradeTitleRemarks: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    vTradeRemarksAttached: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    receiptNo: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    receiptNo2: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    priceVehicle: {
      type: DataTypes.TEXT,
      allowNull: false
    },
    nonTaxRebate: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    taxablePrice: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    downPayment: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    rebates: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    reBateOne: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    reBateOnedscrp: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    reBateOneTax: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    reBateTwo: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    reBateTwodscrp: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    reBateTwoTax: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    reBateThree: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    reBateThreedscrp: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    reBateThreeTax: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    reBateFour: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    reBateFourdscrp: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    reBateFourTax: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    reBateFive: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    reBateFivedscrp: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    reBateFiveTax: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    rebateToReduceSalesPrice: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    VSIFEE: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    loanProcessingFee: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dealerOptionsTotal: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dealerOptions1CodeID: {
      type: DataTypes.INTEGER,
      allowNull: true,
      comment: "Code ID To Query Name"
    },
    dealerOptionsNm1: {
      type: DataTypes.TEXT,
      allowNull: true,
      comment: "CodeID"
    },
    dealerOptions1List: {
      type: DataTypes.TEXT,
      allowNull: true,
      comment: "List Price"
    },
    dealerOptions1: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dealerOptions1Cost: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dealerOptions1Tax: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dealerOptions2CodeID: {
      type: DataTypes.INTEGER,
      allowNull: true,
      comment: "Code ID To Query Name"
    },
    dealerOptionsNm2: {
      type: DataTypes.TEXT,
      allowNull: true,
      comment: "CodeID"
    },
    dealerOptions2List: {
      type: DataTypes.TEXT,
      allowNull: true,
      comment: "List Price"
    },
    dealerOptions2: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dealerOptions2Cost: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dealerOptions2Tax: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dealerOptions3CodeID: {
      type: DataTypes.INTEGER,
      allowNull: true,
      comment: "Code ID To Query Name"
    },
    dealerOptionsNm3: {
      type: DataTypes.TEXT,
      allowNull: true,
      comment: "CodeID"
    },
    dealerOptions3List: {
      type: DataTypes.TEXT,
      allowNull: true,
      comment: "List Price"
    },
    dealerOptions3: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dealerOptions3Cost: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dealerOptions3Tax: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dealerOptions4CodeID: {
      type: DataTypes.INTEGER,
      allowNull: true,
      comment: "Code ID To Query Name"
    },
    dealerOptionsNm4: {
      type: DataTypes.TEXT,
      allowNull: true,
      comment: "CodeID"
    },
    dealerOptions4List: {
      type: DataTypes.TEXT,
      allowNull: true,
      comment: "List Price"
    },
    dealerOptions4: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dealerOptions4Cost: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dealerOptions4Tax: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dealerOptions5CodeID: {
      type: DataTypes.INTEGER,
      allowNull: true,
      comment: "Code ID To Query Name"
    },
    dealerOptionsNm5: {
      type: DataTypes.TEXT,
      allowNull: true,
      comment: "CodeID"
    },
    dealerOptions5List: {
      type: DataTypes.TEXT,
      allowNull: true,
      comment: "List Price"
    },
    dealerOptions5: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dealerOptions5Cost: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dealerOptions5Tax: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dealerOptions6CodeID: {
      type: DataTypes.INTEGER,
      allowNull: true,
      comment: "Code ID To Query Name"
    },
    dealerOptionsNm6: {
      type: DataTypes.TEXT,
      allowNull: true,
      comment: "CodeID"
    },
    dealerOptions6List: {
      type: DataTypes.TEXT,
      allowNull: true,
      comment: "List Price"
    },
    dealerOptions6: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dealerOptions6Cost: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dealerOptions6Tax: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dealerOptions7CodeID: {
      type: DataTypes.INTEGER,
      allowNull: true,
      comment: "Code ID To Query Name"
    },
    dealerOptionsNm7: {
      type: DataTypes.TEXT,
      allowNull: true,
      comment: "CodeID"
    },
    dealerOptions7List: {
      type: DataTypes.TEXT,
      allowNull: true,
      comment: "List Price"
    },
    dealerOptions7: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dealerOptions7Cost: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dealerOptions7Tax: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    insuranceCost: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    insurMonths: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    insurCreditlife: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    insurAccHealth: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    extServicePlan: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    extSrvcMonths: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    extSrvcCompany: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    extSrvcMiles: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    extSrvcStartDate: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    extSrvcContractNo: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    extSrvcStartMiles: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    extSrvcEndDate: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    extSrvcPremium: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    extSrvcdeduct: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    extSrvcEndMiles: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    cashDeposit: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    tradePayoff: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    COD: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    tradeAllowance: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    docServiceFee: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    noTaxes: {
      type: DataTypes.STRING(5),
      allowNull: true
    },
    settingSateSlsTax: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    stateSalesTax: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    licsFee: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    titleFee: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    stateInspect: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    licsNtitlefee: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    stateTaxperc: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    stateTaxpercTotal: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    taxCountyperc: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    taxCountypercTotal: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    taxCityperc: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    taxCitypercTotal: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    taxState: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    warrantyPrice: {
      type: DataTypes.TEXT,
      allowNull: true,
      comment: "extSrvcpremium"
    },
    monthlypymts: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    amountDDue: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    apr: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    firstpymt: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    term: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    msrp: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dayResults: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    residualDollar: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    totalPayments: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    totalFinanceCharges: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    monthlyPymtd: {
      type: DataTypes.TEXT,
      allowNull: true,
      comment: "deferred monthly payment"
    },
    deal_created_at: {
      type: DataTypes.DATE,
      allowNull: false,
      defaultValue: Sequelize.Sequelize.literal('CURRENT_TIMESTAMP')
    }
  }, {
    sequelize,
    tableName: 'deals_bydealer',
    timestamps: false,
    indexes: [
      {
        name: "PRIMARY",
        unique: true,
        using: "BTREE",
        fields: [
          { name: "deal_id" },
        ]
      },
      {
        name: "deal_token",
        using: "BTREE",
        fields: [
          { name: "deal_token" },
        ]
      },
    ]
  });
};
