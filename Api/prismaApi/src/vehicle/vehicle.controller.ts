import { Vehicles } from '../../types';
import prismaOrm from '../../utils/prismaOrm';



export const listVehicles = async(): Promise<Vehicles[]> => {
    return prismaOrm.vehicles.findMany({
        select: {
        vid:                        true,
        vtoken:                     true,
        vyear:                      true,
        vbody:                      true,
        vmake:                      true,
        vmodel:                     true,
        vvin:                     true,
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
        vyear:                      true,
        vbody:                      true,
        vmake:                      true,
        vmodel:                     true,
        vvin:                       true,
        vthubmnail_file:            true,
        created_at:                 true,
        },
    })
};
