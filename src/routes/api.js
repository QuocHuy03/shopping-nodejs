import express from "express";
import apiController from "../controller/apiController";
let router = express.Router();

const initApiRoute = (app) => {
  router.get("/users", apiController.getAllUsers);
  router.post("/create-users", apiController.createNewUser);
  router.put("/update-users", apiController.updateUser);
  router.delete("/delete-users/:id", apiController.deleteUser);

  return app.use("/api/v1/", router);
};

export default initApiRoute;
