import express from "express";
import type { Request, Response } from "express";
import {body, validationResult} from "express-validator"

import * as VehicleService from "./vehicle.controller"

export const vehicleRouter = express.Router();


// GET: List of all vehicles
vehicleRouter.get("/", async (request: Request, response: Response) => {
    try {
        const vehicles = await VehicleService.listVehicles();
        //return response.send(`<h2>vehicles: </h2>`)
        return response.status(200).json(vehicles)
    } catch (error) {
        
    }
})

vehicleRouter.get("/all", async (request: Request, response: Response) => {
    try {
        const vehicles = await VehicleService.listVehicles();
        return response.status(200).json(vehicles)
    } catch (error) {
        
    }
})

vehicleRouter.get("/vid/:vid", async (request: Request, response: Response) => {

    const vid: string = request.params.vid

    try {
        const vehicles = await VehicleService.getVehicleByVid();
        return response.status(200).json(vehicles)
    } catch (error) {
        
    }
})