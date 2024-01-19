import express from "express";
import type { Request, Response } from "express";
import {body, validationResult} from "express-validator"

import * as UserService from "./user.controller"

export const userRouter = express.Router();


// GET: List of all users
userRouter.get("/", async (request: Request, response: Response) => {
    try {
        const users = await UserService.listUsers();
        return response.status(200).json(users)
    } catch (error) {
        
    }
})

userRouter.get("/user:id", async (request: Request, response: Response) => {
    try {
        
    } catch (error) {
        
    }
})