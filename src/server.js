import express from "express";
import configViewEngine from "./configs/viewEngine";
import initWebRoute from "./routes/web";
import huydev from "./configs/connectDB";
import initApiRoute from "./routes/api";
require("dotenv").config();
var morgan = require('morgan');

const app = express();
const port = process.env.PORT || 2003;

// Gửi Data POST Lên Server //
app.use(morgan('combined'));
app.use(express.urlencoded({ extended: true }));
app.use(express.json());

// end //

configViewEngine(app);
// list router web
initWebRoute(app);
// list api usser
initApiRoute(app);
// middleware 404 not found //
app.use((req,res) => {
return res.render('404.ejs')
})

app.listen(port, () => {
  console.log(`Example app listening at http://localhost:${port}`);
});
