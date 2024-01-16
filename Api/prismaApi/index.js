const express = require("express");
const app = express();
const { PrismaClient  } = require("@prisma/client")

const PORT = 3002

const prisma = new PrismaClient();


app.use(express.json());

app.get("/vehiclesAll", async (req, res) => {
    const allVehicles = await prisma.vehicles.findMany();
    // const allVehicles = await prisma.vehicles.findFirst({
    //     where: {
    //         vid: 3
    //     }
    // });
    //const allVehicles = await prisma.vehicles.findMany();
    res.json(allVehicles)
})


app.get("/vehicles", async (req, res) => {
    try {
        const allVehicles = await prisma.vehicles.findMany();

        // Convert BigInt values to strings
        const serializedVehicles = allVehicles.map(vehicle => ({
            ...vehicle,
            someBigIntField: vehicle.vid.toString(),
            // Add similar lines for other BigInt fields if needed
        }));

        res.json({serializedVehicles});
    } catch (error) {
        console.error("Error fetching vehicles:", error);
        res.status(500).json({ error: "Internal Server Error" });
    }
});


app.listen(PORT, () => {console.log(`Server listening on port http://localhost:${PORT}`)})