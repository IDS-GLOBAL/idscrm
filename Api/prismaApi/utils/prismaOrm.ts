import { PrismaClient } from "@prisma/client";

let prismaOrm: PrismaClient;

declare global {
    var __prismaOrm: PrismaClient | undefined;
}

if (!global.__prismaOrm){
    global.__prismaOrm = new PrismaClient();
}

prismaOrm = global.__prismaOrm;

export default prismaOrm;
