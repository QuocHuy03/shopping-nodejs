import express from "express";
import homeController from "../controller/homeController";
let router = express.Router();

const webRouter = (app) => {
  router.get("/", function (req, res, next) {
    if (req.session.loggedin) {
      var sessionUser = req.session.username;
      // res.send("Welcome back, " + sessionUser + "!");
      res.render("index.ejs", { user: sessionUser });
      // console.log(user);
    } else {
      // chưa đăng nhập
      res.render("login.ejs");
    }
    res.end();
  });
 
  router.get("/home", homeController.homeList);
  // ====================== Auths ====================== //
  router.get("/login", function (req, res) {
    res.render("login.ejs");
  });
  router.post("/login-user", homeController.postLogin);
  router.get("/register", function (req, res) {
    res.render("register.ejs");
  });
  router.post("/create-user", homeController.createUser);

  router.get("/source-code", homeController.listProductHome);

  router.get("/addToCart/:id", homeController.addToCart);
  router.get("/removeCart/:id", homeController.removeCart);
  router.get("/checkout", homeController.listCart);
  router.post("/order", homeController.orderCart);

  return app.use("/", router);
};

export default webRouter;
