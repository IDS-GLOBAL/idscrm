import { Dealers } from '../../types';
import prismaOrm from '../../utils/prismaOrm';



export const listDealers = async(): Promise<Dealers[]> => {
    return prismaOrm.dealers.findMany({
        select: {
            id:                 true,
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


export const findDealerByEmail = async(dealer: any): Promise<Dealers[]> => {
    
    const { email, hashedPassword } = dealer;

    return prismaOrm.dealers.findMany({
        where: {
            email,
        },
        select: {
            id:                 true,
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


export const getDealerById = async (dealerId: number): Promise<Dealers | any> => {
    
    console.log('data: ', dealerId)

   
    
    console.log('Id: ', dealerId)

    return prismaOrm.dealers.findUnique({
        where: { 
            id: parseInt(dealerId as any) 

        },
        select: {
            id:                 true,
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
}

export const createPendingDealer = async (pendingDealerPost: any): Promise<Dealers | any> => {
    
    console.log('data: ', pendingDealerPost)

    const { company,
        company_legalname,
        dealerTimezone,
        website,
        finance,
        finance_contact,
        sales,
        sales_contact,
        phone,
        fax,
        address,
        city,
        state,
        zip,
        country,
        email,
        username,
        password,
        verified,
        token,
        created_at,
    } = pendingDealerPost;
   
    
    console.log('Id: ', pendingDealerPost)

    return prismaOrm.dealers.create({
        data: { 
            company: company,
            company_legalname: company_legalname,
            dealerTimezone: dealerTimezone,
            website,
            finance,
            finance_contact,
            sales,
            sales_contact,
            phone,
            fax,
            address,
            city,
            state,
            zip,
            country,
            email,
            username,
            password,
            verified,
            token,
            created_at,

        },
        select: {
            id:                 true,
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
}
