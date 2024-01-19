import express from "express";
const app = express();
import cors from "cors";

import { userRouter } from "./user/user.router";
import { dealerRouter } from "./dealer/dealer.router";

require('dotenv').config();

if(!process.env.PORT){
    console.log('Exit 1 Quitting System')
    process.exit(1)
}

const PORT: number = parseInt(process.env.PORT as string, 10);


app.use(cors());
app.use(express.json());
app.use("/api/users", userRouter);
app.use("/api/dealers", dealerRouter);



app.listen(PORT, () => {console.log(`Server listening on port http://localhost:${PORT}`)})