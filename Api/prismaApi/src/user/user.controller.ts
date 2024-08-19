import prismaOrm from '../../utils/prismaOrm';

type Users = {
    id:                         number;
    uuid:                       string | null;
    role:                       string | null;
    email:                      string | null;    
    firstName:                  string | null;          
    lastName:                   string | null;          
    image:                      string | null;
    createdAt:                  Date | null;
}

export const listUsers = async(): Promise<Users[]> => {
    return prismaOrm.users.findMany({
        select: {
        id:                         true,
        uuid:                       true,
        role:                       true,
        email:                      true,    
        firstName:                  true,          
        lastName:                   true,          
        image:                      true,
        createdAt:                  true,
        },
    })
};
