import { Decimal } from "@prisma/client/runtime/library";

export const MIME_TYPE_MAP = {
    'image/png': 'png',
    'image/jpeg': 'jpg',
    'image/jpg': 'jpg',
    'image/webp': 'webp'
};

export type Dealers = {
    id:                 number;
    company:            string | null;
    company_legalname:  string | null;
    dealerTimezone:     string | null;
    website:            string | null;    
    finance:            string | null;          
    finance_contact:    string | null;          
    sales:              string | null;          
    sales_contact:      string | null;          
    phone:              string | null;          
    fax:                string | null;          
    address:            string | null;          
    city:               string | null;          
    state:              string | null;          
    zip:                string | null;          
    country:            string | null;          
    email:              string | null;          
    username:           string | null;          
    password:           string | null;          
    verified:           string | null;
    token:              string | null;
    created_at:         Date | null;
}

export type Users = {
    id:                         number;
    uuid:                       string | null;
    role:                       string | null;
    email:                      string | null;    
    firstName:                  string | null;          
    lastName:                   string | null;          
    image:                      string | null;
    createdAt:                  Date | null;
}

export type Vehicles = {
    vid:                        number | null;
    vtoken:                     string | null;
    vyear:                      string | null;
    vmake:                      string | null;
    vmodel:                     string | null;      
    vvin:                       string | null;      
    vbody:                      string | null;    
    vthubmnail_file:            string | null;          
    created_at:                 Date | null;
}