import * as dotenv from "dotenv"
import express, { Request, Response } from "express";
import path from 'path'
import cors from "cors";

dotenv.config()

if(!process.env.PORT){
    console.log('No PORT Found...');
    console.log('Exit 1 Quitting System')
    process.exit(1)
}

const PORT: number = parseInt(process.env.PORT as string, 10)

const app = express();

import { dealerRouter } from "./dealer/dealer.router";
import { userRouter } from "./user/user.router";
import { vehicleRouter } from "./vehicle/vehicle.router";


require('dotenv').config();




app.use(cors());
app.use(express.urlencoded({ extended: true }));
app.use(express.json());

app.use("/api/users", userRouter);
app.use("/api/dealers", dealerRouter);
app.use("/api/vehicles", vehicleRouter);


app.get("/", (req: Request, res: Response) => {
    res.send(`<h2>Well - Its url: api.idscrm.com API on PORT: ${PORT} </h2>`)
})


app.listen(PORT, () => {console.log(`Server listening on port:${PORT} - http://localhost:${PORT}`)})