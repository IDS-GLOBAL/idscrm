import prismaOrm from '../../utils/prismaOrm';

import { Users } from '../../types/';

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

export const createUser = async (request: Request, response: Response) => {

    const userPost = await request.body
    

    console.log('userPost', userPost)
 
  
    
        return  prismaOrm.users.create(userPost as any)
   
      
};


export const  getuserById = async (id: number): Promise<Users | null> => {
    
    console.log("getuserById: " + id);

    return prismaOrm.users.findUnique({
        where: {
            id,
        },
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
}

