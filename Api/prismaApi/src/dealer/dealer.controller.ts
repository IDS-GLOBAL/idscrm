import prismaOrm from '../../src/utils/prismaOrm';

type Dealers = {
    Id:                 number;
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
    created_at:         Date;
}

const listDealers = async(): Promise<Dealers[]> => {
    return prismaOrm.dealers.findMany({
        select: {
            Id:                 true,
            company:            true,
            company_legalname:  true,
            dealerTimezone:     true,
            website:            true,    
            finance:            true,          
            finance_contact:    true,          
            sales:              true,          
            sales_contact:      true,          
            phone:              true,          
            fax:                true,          
            address:            true,          
            city:               true,          
            state:              true,          
            zip:                true,          
            country:            true,          
            email:              true,          
            username:           true,          
            password:           true,          
            verified:           true,
            token:              true,
            created_at:         true,
        },
    })
};