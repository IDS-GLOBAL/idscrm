const Sequelize = require('sequelize');
module.exports = function(sequelize, DataTypes) {
  return sequelize.define('vehicles', {
    vid: {
      autoIncrement: true,
      type: DataTypes.BIGINT,
      allowNull: false,
      primaryKey: true
    },
    vtoken: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    did: {
      type: DataTypes.INTEGER,
      allowNull: false,
      comment: "Dealer ID"
    },
    prospctdlrid: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    cid: {
      type: DataTypes.INTEGER,
      allowNull: true,
      comment: "customer car shopper related to consumer id"
    },
    sid: {
      type: DataTypes.INTEGER,
      allowNull: true,
      comment: "salespersonid who added this car"
    },
    dudes_id: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    frazerid: {
      type: DataTypes.STRING(100),
      allowNull: true,
      comment: "the id imported from frazer"
    },
    vyearid: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    vmakeid: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    vmodelid: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    vphotoid: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    vvideoid: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    vauctionid: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    vlivestatus: {
      type: DataTypes.INTEGER,
      allowNull: true,
      comment: "0=Hold,1=Live,2=Imported,9=Sold"
    },
    vonholdstatus: {
      type: DataTypes.INTEGER,
      allowNull: true,
      comment: "For repairs on not ready yet."
    },
    vFeedStatusLckd: {
      type: DataTypes.INTEGER,
      allowNull: true,
      comment: "Vehicle Connected To A Feed"
    },
    salesperson_private: {
      type: DataTypes.INTEGER,
      allowNull: true,
      comment: "Sales Person Private Vehicle"
    },
    vsource_idscrm_import_txt: {
      type: DataTypes.STRING(50),
      allowNull: true,
      comment: "The Source the vehicle was imported from?"
    },
    vphoto_count: {
      type: DataTypes.INTEGER,
      allowNull: true,
      comment: "The count of photos"
    },
    vthubmnail_file: {
      type: DataTypes.STRING(500),
      allowNull: true
    },
    vthubmnail_file_path: {
      type: DataTypes.STRING(500),
      allowNull: true
    },
    vPhotoURLs: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    video_on_off_status: {
      type: DataTypes.INTEGER,
      allowNull: true,
      comment: "1 = on 2 = off"
    },
    v_youtube_title: {
      type: DataTypes.STRING(100),
      allowNull: true
    },
    v_youtube_dlr_comment: {
      type: DataTypes.STRING(5000),
      allowNull: true
    },
    v_video_youtube_link: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    v_video_file_name: {
      type: DataTypes.STRING(250),
      allowNull: true
    },
    vDateInStock: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    vyear: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    vmake: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    vmodel: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    vtrim: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    vvin: {
      type: DataTypes.STRING(17),
      allowNull: true,
      unique: "vvin_2"
    },
    vcondition: {
      type: DataTypes.STRING(15),
      allowNull: true
    },
    vcertified: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    vstockno: {
      type: DataTypes.STRING(150),
      allowNull: true
    },
    vmileage: {
      type: DataTypes.STRING(11),
      allowNull: true
    },
    vpurchasecost: {
      type: DataTypes.STRING(20),
      allowNull: true,
      comment: "vehicle cost to dealer"
    },
    vdlrpack: {
      type: DataTypes.STRING(20),
      allowNull: true
    },
    vaddedcost: {
      type: DataTypes.STRING(20),
      allowNull: true
    },
    vadvalorem_tax: {
      type: DataTypes.STRING(10),
      allowNull: true
    },
    vrprice: {
      type: DataTypes.STRING(20),
      allowNull: true
    },
    vdprice: {
      type: DataTypes.STRING(20),
      allowNull: true
    },
    vspecialprice: {
      type: DataTypes.STRING(20),
      allowNull: true
    },
    vecolor: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    vicolor: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    vecolor_txt: {
      type: DataTypes.TEXT,
      allowNull: true,
      comment: "The exterior text color for vehicle"
    },
    vicolor_txt: {
      type: DataTypes.TEXT,
      allowNull: true,
      comment: "The interior text color for vehicle"
    },
    vcustomcolor: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    vbody: {
      type: DataTypes.STRING(250),
      allowNull: true
    },
    vtransm: {
      type: DataTypes.STRING(100),
      allowNull: true
    },
    vengine: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    vcylinders: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    vfueltype: {
      type: DataTypes.STRING(30),
      allowNull: true
    },
    vdoors: {
      type: DataTypes.STRING(50),
      allowNull: true
    },
    vehicle_mpg_city: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    vehicle_mpg_hwy: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    vehicle_mpg_combined: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    vehicleOptionsBulk: {
      type: DataTypes.TEXT,
      allowNull: true,
      comment: "Options In Bulk All Vehicle Options"
    },
    vehicleOptionsBulk_exterior: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    vehicleOptionsBulk_interior: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    vehicleOptionsBulk_functional: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    vehicleOptionsBulk_safetysecurity: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    vehicleOptionsBulk_warranty: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    Air_Conditioning: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    Alloy_Wheels: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    AntiLock_Brakes: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    Auto_Updown_Windows: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    Bluetooth_Handsfree: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    Bed_Liner: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    Child_Seat: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    Climate_Control: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    Cruise_Control: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    Driver_Air_Bag: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    Illuminated_Lightning: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    Keyless_Entry: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    Leather_Seats: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    On_Star_Equipped: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    Rear_Ent_Center: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    Navigation_System: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    Passenger_Air_Bag: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    Power_Door_Locks: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    Power_Mirrors: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    Power_Seats: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    Power_Steering: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    Power_Windows: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    Push_Button_Start: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    Memory_Seats: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    Rear_Air_Conditioning: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    Rear_view_monitor: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    Rear_Window_Defroster: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    Rear_Wiper: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    Running_Boards: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    Side_Air_Bag: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    SunroofMoonroof: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    Television: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    Theft_System: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    Tilt_Wheel: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    Tinted_Glass: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    Sliding_Doors: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    CD_Player: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    CD_Changer: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    Bluetooth: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    Satellite_Radio: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    carfax: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    autocheck: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    v_warranty_one: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    v_warranty_two: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dlroption1chck: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    dlroption1: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dlroption2chck: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    dlroption2: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dlroption3chck: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    dlroption3: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dlroptequip1chck: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    dlroptequip1: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dlroptequip2chck: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    dlroptequip2: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dlroptequip3chck: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    dlroptequip3: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dlroptequip4chck: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    dlroptequip4: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    dlroptequip5chck: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    dlroptequip5: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    vcomments: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    feedcarscom: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    feedautotradercom: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    feedovecom: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    craigslistorg: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    feedebaycom: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    feedcomcastvod: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    ove_physicallocationind: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    ove_priorpaint: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    ove_titlestatus: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    ove_titlestate: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    statistic: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    vdeleted: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    modified_at: {
      type: DataTypes.STRING(20),
      allowNull: true
    },
    marked_sold: {
      type: DataTypes.STRING(50),
      allowNull: true,
      comment: "Date Car Was Marked Sold!"
    },
    importHomnetPhotos: {
      type: DataTypes.TEXT,
      allowNull: true,
      comment: "All Homenet Photos"
    },
    homenetLastSent: {
      type: DataTypes.STRING(50),
      allowNull: true,
      comment: "Last Time Vehicle Was Sent"
    },
    homenetDo: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    importFrazerPhotos: {
      type: DataTypes.TEXT,
      allowNull: true,
      comment: "All Frazer Photos"
    },
    export_cfs_photourls: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    export_vast_photourls: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    export_vast_listing_time: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    export_vast_expire_time: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    frazerLastSent: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    accts_rcvbles_name: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    accts_rcvbles_email: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    export_tocarsforsale: {
      type: DataTypes.INTEGER,
      allowNull: true
    },
    export_tovast: {
      type: DataTypes.INTEGER,
      allowNull: true
    }
  }, {
    sequelize,
    tableName: 'vehicles',
    timestamps: true,
    indexes: [
      {
        name: "PRIMARY",
        unique: true,
        using: "BTREE",
        fields: [
          { name: "vid" },
        ]
      },
      {
        name: "vid_2",
        unique: true,
        using: "BTREE",
        fields: [
          { name: "vid" },
        ]
      },
      {
        name: "vid_3",
        unique: true,
        using: "BTREE",
        fields: [
          { name: "vid" },
        ]
      },
      {
        name: "vvin_2",
        unique: true,
        using: "BTREE",
        fields: [
          { name: "vvin" },
        ]
      },
      {
        name: "vcost",
        using: "BTREE",
        fields: [
          { name: "vpurchasecost" },
        ]
      },
      {
        name: "vstockno",
        using: "BTREE",
        fields: [
          { name: "vstockno" },
        ]
      },
      {
        name: "vspecialprice",
        using: "BTREE",
        fields: [
          { name: "vspecialprice" },
        ]
      },
      {
        name: "vsource_idscrm_import_txt",
        using: "BTREE",
        fields: [
          { name: "vsource_idscrm_import_txt" },
        ]
      },
      {
        name: "marked_sold",
        using: "BTREE",
        fields: [
          { name: "marked_sold" },
        ]
      },
      {
        name: "vid",
        using: "BTREE",
        fields: [
          { name: "vid" },
        ]
      },
      {
        name: "vmake",
        using: "BTREE",
        fields: [
          { name: "vmake" },
        ]
      },
      {
        name: "did",
        using: "BTREE",
        fields: [
          { name: "did" },
        ]
      },
      {
        name: "vlivestatus",
        using: "BTREE",
        fields: [
          { name: "vlivestatus" },
        ]
      },
      {
        name: "vmake_2",
        using: "BTREE",
        fields: [
          { name: "vmake" },
        ]
      },
      {
        name: "vmodel",
        using: "BTREE",
        fields: [
          { name: "vmodel" },
        ]
      },
      {
        name: "vstockno_2",
        using: "BTREE",
        fields: [
          { name: "vstockno" },
        ]
      },
      {
        name: "vrprice",
        using: "BTREE",
        fields: [
          { name: "vrprice" },
        ]
      },
      {
        name: "vspecialprice_2",
        using: "BTREE",
        fields: [
          { name: "vspecialprice" },
        ]
      },
      {
        name: "vdprice_2",
        using: "BTREE",
        fields: [
          { name: "vdprice" },
        ]
      },
      {
        name: "vrprice_2",
        using: "BTREE",
        fields: [
          { name: "vrprice" },
        ]
      },
      {
        name: "vcomments",
        type: "FULLTEXT",
        fields: [
          { name: "vcomments" },
        ]
      },
      {
        name: "vvin",
        type: "FULLTEXT",
        fields: [
          { name: "vvin" },
        ]
      },
      {
        name: "vtrim",
        type: "FULLTEXT",
        fields: [
          { name: "vtrim" },
        ]
      },
      {
        name: "vbody",
        type: "FULLTEXT",
        fields: [
          { name: "vbody" },
        ]
      },
      {
        name: "vtransm",
        type: "FULLTEXT",
        fields: [
          { name: "vtransm" },
        ]
      },
      {
        name: "vdprice",
        type: "FULLTEXT",
        fields: [
          { name: "vdprice" },
        ]
      },
      {
        name: "vpurchasecost",
        type: "FULLTEXT",
        fields: [
          { name: "vpurchasecost" },
        ]
      },
      {
        name: "vmileage",
        type: "FULLTEXT",
        fields: [
          { name: "vmileage" },
        ]
      },
      {
        name: "vdoors",
        type: "FULLTEXT",
        fields: [
          { name: "vdoors" },
        ]
      },
      {
        name: "vyear",
        type: "FULLTEXT",
        fields: [
          { name: "vyear" },
        ]
      },
      {
        name: "importHomnetPhotos",
        type: "FULLTEXT",
        fields: [
          { name: "importHomnetPhotos" },
        ]
      },
      {
        name: "importFrazerPhotos",
        type: "FULLTEXT",
        fields: [
          { name: "importFrazerPhotos" },
        ]
      },
      {
        name: "export_vast_photurls",
        type: "FULLTEXT",
        fields: [
          { name: "export_vast_photourls" },
        ]
      },
    ]
  });
};
