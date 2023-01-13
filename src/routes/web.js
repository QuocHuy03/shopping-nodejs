import express from "express";
import homeController from "../controller/homeController";
let router = express.Router();

const initWebRoute = (app) => {
  router.get("/", homeController.getHomepage);
  // select users theo id
  router.get("/detail/users/:id", homeController.getDetailPage);
  // post
  router.post("/create-users", homeController.createNewUser);
  // delete
  router.post("/delete-user", homeController.deleteUser);
  // edit , update
  router.get("/edit-user/:id", homeController.editUser);
  router.post("/update-user", homeController.updateUser);

  router.get("/about", (req, res) => {
    res.send(`I'm Huy Dev!`);
  });

  return app.use("/", router);
};

export default initWebRoute;
