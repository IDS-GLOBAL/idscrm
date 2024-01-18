import db from '../src/utils/db.server';

type Users = {
    uuid: string;
    firstName: string;
    lastName: string;
    email: string;
    password: string;
    usrImage: string;
}


type Dealers = {
    dealer_pending_id: Number
    prospct_dlrid: Number
    dealer_type_id: Number
    dealer_market_id: Number
    dealer_market_sub_id: Number
    dudes_id: Number
    dudes2_id: Number
    assigned_salesrep: string;
    assigned_salesrep_phone: string;
    support_rep_id: Number;
    leadsidsemail: string;
    leadsthirdparty: string;
    balance_credits: string;
    contact: string;
    contact_title: string;
    contact_phone: string;
    contact_phone_type: string;
    dmcontact2: string;
    dmcontact2_title: string;
    dmcontact2_phone: string;
    dmcontact2_phone_type: string;
    company: string;
    company_legalname: string;
    dealerTimezone: string;
    website: string;
    finance: string;
    finance_contact: string;
    sales: string;
    sales_contact: string;
    phone: string;
    fax: string;
    address: string;
    city: string;
    state: string;
    zip: string;
    country: string;
    email: string;
    username: string;
    password: string;
    verified: string;
    token: string;
}



type Vehicles = {
    vid: Number;
    vtoken: string;
    did: Number;
    prospctdlrid?: Number;
    cid?: Number;
    sid?: Number;
    dudes_id: Number;
    frazerid?: Number;
    vphotoid?: Number;
    vvideoid?: Number;
    vauctionid?: Number;
    vlivestatus?: Boolean;
    vonholdstatus: Number;
    vFeedStatusLckd: Number;
    salesperson_private: Number;
    vphoto_count: Number;
    vthubmnail_file: string;
    vthubmnail_file_path: string;
    vPhotoURLs: string;
    video_on_off_status: Number;
    vDateInStock: string;
    vyear: string;
    vmake: string;
    vmodel: string;
    vtrim: string;
    vvin: string;
    vcondition: string;
    vcertified: Number;
    vstockno: string;
    vmileage: string;
    vpurchasecost: string;
    vdlrpack: string;
    vaddedcost: string;
    vadvalorem_tax: string;
    vrprice: string;
    vdprice: string;
    vspecialprice: string;
    vecolor: string;
    vicolor: string;
    vecolor_txt: string;
    vicolor_txt: string;
    vcustomcolor: string;
    vbody: string;
    vtransm: string;
    vengine: string;
    vcylinders: Number;
    vfueltype: string;
    vdoors: Number;
    modified_at: Date;
    created_at: Date;

}

async function seed() {

    /* >>> Start Repated Process */
    await Promise.all(
        getUsers().map((user) => {
            return db.users.create({
                data: {
                    uuid: user.uuid,
                    email: user.email,
                    usrImage: user.usrImage,
                    firstName: user.firstName,
                    lastName: user.lastName,
                    password: user.password
                },
            });
        })
    );

    const user = await db.users.findFirst({
        where: {
            firstName: "John",
        }
    });
    /* End Repated Process <<< */

}

seed();


function getDealers(): Array<Dealers> {

    return [

    ]
}

function getUsers(): Array<Users> {

    return [
        {
            uuid: "1152454524",
            firstName: "John",
            lastName: "Doe",
            email: "john@johndoe.com",
            password: "1234567890",
            usrImage: ""
        },
        {
            uuid: "1142454524",
            firstName: "Jane",
            lastName: "Doe",
            email: "jane@janedoe.com",
            password: "1234567890",
            usrImage: ""
        },
        {
            uuid: "1882454524",
            firstName: "Steve",
            lastName: "Smith",
            email: "Steve@Smith.com",
            password: "1234567890",
            usrImage: ""
        },
        {
            uuid: "1992454524",
            firstName: "Harry",
            lastName: "Dirty",
            email: "harryDirty@dirtyharry.com",
            password: "1234567890",
            usrImage: ""
        },
        {
            uuid: "1772454524",
            firstName: "Susan",
            lastName: "Smith",
            email: "email@smithemail.com",
            password: "1234567890",
            usrImage: ""
        },
        {
            uuid: "1482454524",
            firstName: "Martha",
            lastName: "Stewart",
            email: "email@marthastewartemail.com",
            password: "1234567890",
            usrImage: ""
        },
        {
            uuid: "1662454524",
            firstName: "Jerry",
            lastName: "Huckabee",
            email: "jerry@huckabeeemail.com",
            password: "1234567890",
            usrImage: ""
        },
        {
            uuid: "1872454524",
            firstName: "Steven",
            lastName: "Adams",
            email: "email@stevenemail.com",
            password: "1234567890",
            usrImage: ""
        },
        {
            uuid: "13624744524",
            firstName: "Greg",
            lastName: "Webb",
            email: "webb@gregemail.com",
            password: "1234567890",
            usrImage: ""
        },
        {
            uuid: "11224565454",
            firstName: "John",
            lastName: "Stalton",
            email: "stalton@john.com",
            password: "1234567890",
            usrImage: ""
        },
        {
            uuid: "112456454524",
            firstName: "Rick",
            lastName: "Case",
            email: "rick@rickcase.com",
            password: "1234567890",
            usrImage: ""
        },
    ]
}

function getVehicles(): Array<Vehicles> {

    return [
        {
            vid: 1,
            vtoken: "1232132131",
            did: 2,
            prospctdlrid: 0,
            cid: 0,
            sid: 0,
            dudes_id: 0,
            frazerid: 0,
            vphotoid: 0,
            vvideoid: 0,
            vauctionid: 0,
            vlivestatus: true,
            vonholdstatus: 0,
            vFeedStatusLckd: 0,
            salesperson_private: 0,
            vphoto_count: 0,
            vthubmnail_file: "",
            vthubmnail_file_path: "",
            vPhotoURLs: "",
            video_on_off_status: 0,
            vDateInStock: "",
            vyear: "",
            vmake: "",
            vmodel: "",
            vtrim: "",
            vvin: "",
            vcondition: "",
            vcertified: 0,
            vstockno: "",
            vmileage: "",
            vpurchasecost: "",
            vdlrpack: "",
            vaddedcost: "",
            vadvalorem_tax: "",
            vrprice: "",
            vdprice: "",
            vspecialprice: "",
            vecolor: "",
            vicolor: "",
            vecolor_txt: "",
            vicolor_txt: "",
            vcustomcolor: "",
            vbody: "",
            vtransm: "",
            vengine: "",
            vcylinders: 4,
            vfueltype: "",
            vdoors: 4,
            modified_at: new Date(),
            created_at: new Date(),
        },
    ]
}