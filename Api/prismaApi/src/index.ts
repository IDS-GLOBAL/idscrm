import express from "express";
const app = express();
import { PrismaClient } from "@prisma/client";

const PORT = 3002

const prisma = new PrismaClient();


app.use(express.json());

app.get("/vehiclesAll", async (req: any, res: any) => {
    const allVehicles = await prisma.vehicles.findMany();
    // const allVehicles = await prisma.vehicles.findFirst({
    //     where: {
    //         vid: 3
    //     }
    // });
    //const allVehicles = await prisma.vehicles.findMany();
    res.json(allVehicles)
})


app.get("/vehicles", async (req: any, res: any) => {
    try {
        const allVehicles = await prisma.vehicles.findMany();

        // Convert BigInt values to strings
        const serializedVehicles = allVehicles.map((vehicles: { vid: { toString: () => any; }; }) => ({
            ...vehicles,
            someBigIntField: vehicles.vid.toString(),
            // Add similar lines for other BigInt fields if needed
        }));

        res.json({serializedVehicles});
    } catch (error) {
        console.error("Error fetching vehicles:", error);
        res.status(500).json({ error: "Internal Server Error" });
    }
});


app.listen(PORT, () => {console.log(`Server listening on port http://localhost:${PORT}`)})