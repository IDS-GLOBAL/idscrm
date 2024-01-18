import prismaOrm from '../../src/utils/prismaOrm';

type Users = {
    Id:                         number;
    uuid:                       string | null;
    role:                       string | null;
    email:                      string | null;    
    firstName:                  string | null;          
    lastName:                   string | null;          
    usrImage:                   string | null;
    created_at:                 Date | null;
}

export const listUsers = async(): Promise<Users[]> => {
    return prismaOrm.users.findMany({
        select: {
        Id:                         true,
        uuid:                       true,
        role:                       true,
        email:                      true,    
        firstName:                  true,          
        lastName:                   true,          
        usrImage:                   true,
        created_at:                 true,
        },
    })
};
