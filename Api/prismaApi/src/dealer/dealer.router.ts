import express from "express";
import type { Request, Response } from "express";
import {body, validationResult} from "express-validator"

import * as DealerController from "./dealer.controller"

export const dealerRouter = express.Router();


// GET: List of all dealers
dealerRouter.get("/", async (request: Request, response: Response) => {
    
    try {
        const dealers = await DealerController.listDealers()
        return response.status(200).json(dealers);
    } catch (error) {
        return response.status(500).json(error);
    }

})

dealerRouter.get("/all", async (request: Request, response: Response) => {
    try {
        const dealers = await DealerController.listDealers()
        return response.status(200).json(dealers);
    } catch (error: any ) {
        return response.status(500).json(error);
    }
})

dealerRouter.get("/email/:email", async (request: Request, response: Response) => {

    const dealerEmail =  await request?.body

    try {
        const dealers = await DealerController.findDealerByEmail(dealerEmail as any)
        return response.status(200).json(dealers);
    } catch (error: any) {

        return response.status(500).json(error);
    }
})

dealerRouter.get("/id/:dealerId", async (request: Request, response: Response) => {

    const dealerId =  await  request.params.dealerId
    

    console.log('DealerRoute: dealerId: ', dealerId)

    try {
        const dealers = await DealerController.getDealerById(dealerId as any)
        return response.status(200).json(dealers);
    } catch (error: any) {

        return response.status(500).json(error);
    }
})

dealerRouter.post("/createPendingDealer", async (request: Request, response: Response) => {

    const createPendDealerPost =  await request?.body
    

    console.log('DealerRoute: dealerId: ', createPendDealerPost)

    try {
        const dealers = await DealerController.createPendingDealer(createPendDealerPost as any)
        return response.status(200).json(dealers);
    } catch (error: any) {

        return response.status(500).json(error);
    }
})


dealerRouter.get("/id/:dealerId", async (request: Request, response: Response) => {

    const dealerId =  await  request.params.dealerId
    

    console.log('DealerRoute: dealerId: ', dealerId)

    try {
        const dealers = await DealerController.getDealerById(dealerId as any)
        return response.status(200).json(dealers);
    } catch (error: any) {

        return response.status(500).json(error);
    }
})

