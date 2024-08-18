import prismaOrm from '../../src/utils/prismaOrm';

type Vehicles = {
    vid:                        number | null;
    vtoken:                     string | null;
    vbody:                      string | null;    
    vthubmnail_file:            string | null;          
    created_at:                 Date | null;
}

export const listVehicles = async(): Promise<Vehicles[]> => {
    return prismaOrm.vehicles.findMany({
        select: {
        vid:                        true,
        vtoken:                     true,
        vbody:                      true,
        
        vthubmnail_file:            true,
        created_at:                 true,
        },
    })
};

export const getVehicleByVid = async(): Promise<Vehicles[]> => {
    return prismaOrm.vehicles.findMany({
        select: {
        vid:                        true,
        vtoken:                     true,
        vbody:                      true,
        
        vthubmnail_file:            true,
        created_at:                 true,
        },
    })
};
