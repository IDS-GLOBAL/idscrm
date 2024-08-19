import express from "express";
import jwt from "jsonwebtoken";
import type { Request, Response } from "express";
import {body, validationResult} from "express-validator"

import * as UserController from "./user.controller"

export const userRouter = express.Router();


// GET: List of all users
userRouter.get("/", async (request: Request, response: Response) => {
    try {
        const users = await UserController.listUsers();
        return response.status(200).json(users)
    } catch (error) {
        
    }
})

userRouter.get("/all", async (request: Request, response: Response) => {
    try {
        const users = await UserController.listUsers();
        return response.status(200).json(users)
    } catch (error) {
        
    }
})

userRouter.get("/id/:id", async (request: Request, response: Response) => {
    
    console.log('request.params.id: ', request.params.id)

    const id: number = parseInt(request.params.id, 10)
    //jwt.sign()

    try {
        
        const user = await UserController.getuserById(id as number)
        return response.status(200).json({user: user})

    } catch (error) {
        return response.status(500).json(error)
    }
})

userRouter.post("/login", async (request: Request, response: Response) => {
    
    const postCreateUser = request?.body

    const user = {
            email: postCreateUser.email, 
            hashedPassword: postCreateUser.hashedPassword
    }

    console.log('user   =   ' + JSON.stringify(user))
    

    console.log('postCreateUser: postCreateUser', postCreateUser)

    try {
        const user = await UserController.createUser(postCreateUser as any, postCreateUser  as any);
        return response.status(200).json(user)
    } catch (error) {
        
    }

})


userRouter.post("/register", async (request: Request, response: Response) => {
    
    const postCreateUser = request?.body

    const user = {
            email: postCreateUser.email, 
            hashedPassword: postCreateUser.hashedPassword
    }

    console.log('user   =   ' + JSON.stringify(user))
    

    console.log('postCreateUser: postCreateUser', postCreateUser)

    try {
        const user = await UserController.createUser(postCreateUser as any, postCreateUser  as any);
        return response.status(200).json(user)
    } catch (error) {
        
    }

})