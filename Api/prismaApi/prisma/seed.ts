import { PrismaClient } from '@prisma/client'
import { vehicles } from './vehicles'

const prisma = new PrismaClient();


async function main() {

    // for (let vehicle of vehicles) {
    //     await prisma.vehicles.create({
    //         data: vehicle
    //     })
    // }

    await prisma.vehicles.createMany({
        data: vehicles,
    });
}

main().catch((e) => {
    console.log(e);
    process.exit(1)
}).finally(() => {
    prisma.$disconnect();
})