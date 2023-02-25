import express from "express";
import configViewEngine from "./configs/viewEngine";
import initApiRoute from "./routes/api";
import adminRouter from "./routes/admin";
import webRouter from "./routes/web";
require("dotenv").config();
var morgan = require("morgan");
var session = require("express-session");
const app = express();
const port = process.env.PORT || 2003;

app.use(morgan("combined"));
app.use(express.urlencoded({ extended: true }));
app.use(express.json());

app.use(
  session({
    secret: "webslesson",
    resave: true,
    saveUninitialized: true,
    cookie: {
      // Session expires after 1 min of inactivity.
      expires: 3600000,
    },
  })
);

configViewEngine(app);
webRouter(app);
adminRouter(app);
initApiRoute(app);

// middleware 404 not found //
app.use((req, res) => {
  return res.render("404.ejs");
});

app.listen(port, () => {
  console.log(` >>>>>> Đã Chạy Success Port http://localhost:${port}`);
});
