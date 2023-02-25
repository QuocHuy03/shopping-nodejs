import huydev from "../configs/connectDB";
import Cart from "../models/cart";
let alert = require("alert");
var md5 = require("md5");
var session = require("express-session");
var randomstring = require("randomstring");

let homeList = async (req, res) => {
  if (req.session.loggedin) {
    var sessionUser = req.session.username;
    // console.log(sessionUser);
    const [data] = await huydev.execute(
      "SELECT * FROM `users` WHERE `username` = ?",
      [sessionUser]
    );
    return res.render("home.ejs", { user: sessionUser, huyit: data[0] });
  } else {
    // chưa đăng nhập
    res.render("login.ejs");
  }
  res.end();
};

let listProductHome = async (req, res) => {
  const [data] = await huydev.execute("SELECT * FROM `products`");
  if (req.session.loggedin) {
    var sessionUser = req.session.username;
    return res.render("source.ejs", { user: sessionUser, dataProducts: data });
  } else {
    // chưa đăng nhập
    res.render("login.ejs");
  }
  res.end();
};

let createUser = async (req, res) => {
  let username = req.body.username;
  let email = req.body.email;
  let password = md5(req.body.password);
  let mobile = req.body.mobile;
  let address = req.body.address;
  console.log("<<<< Check Request ", req.body);
  await huydev.execute(
    "INSERT INTO `users`(`username`,`email`, `password`, `mobile`,`address`) VALUES (?,?,?,?,?)",
    [username, email, password, mobile, address]
  );
  // Swal("Đăng Ký Thành Công");
  res.send(
    "<script>alert('Đăng Ký Thành Công!');window.location.href = '/login';</script>"
  );
};

let postLogin = async (req, res) => {
  let username = req.body.username;
  let password = req.body.password;
  console.log("<<<< Check Request ", req.body);
  if (username && password) {
    const [data, fields] = await huydev.execute(
      "SELECT * FROM users WHERE `username` = ? AND `password` = ?",
      [username, password]
    );
    // tài khoản tồn tại
    if (data.length > 0) {
      // oke nheas
      req.session.loggedin = true;
      req.session.username = username;
      // Redirect to home page

      res.redirect("/home");
    } else {
      res.send(
        "<script>alert('Tên người dùng và / hoặc mật khẩu không chính xác!');window.location.href = '/login';</script>"
      );
    }
    console.log(data);
  } else {
    res.send(
      "<script>alert('Vui lòng nhập tên tài khoản và mật khẩu!');window.location.href = '/login';</script>"
    );
  }
};

let addToCart = async (req, res) => {
  var productId = req.params.id;
  var cart = new Cart(req.session.cart ? req.session.cart : {});
  // console.log(cart);
  const [data] = await huydev.execute(
    "SELECT * FROM `products` WHERE id_product = ? LIMIT 1",
    [productId]
  );
  var product = data.filter(function (item) {
    return item.id_product == productId;
  });
  cart.add(product[0], productId);
  req.session.cart = cart;
  res.send(
    "<script>alert('Thêm Sản Phẩm Thành Công!');window.location.href = '/checkout';</script>"
  );
  console.log(cart);
  // res.send(cart);
};

let listCart = async (req, res) => {
  if (req.session.loggedin) {
    var sessionUser = req.session.username;
    const [data] = await huydev.execute(
      "SELECT * FROM `users` WHERE `username` = ?",
      [sessionUser]
    );
    console.log("TÔi HUY DEV --------------------", data[0]);
    if (!req.session.cart) {
      return res.render("cart.ejs", {
        addCart: null,
        totalPrice: null,
        user: sessionUser,
        huyit: data[0],
      });
    }
    var cart = new Cart(req.session.cart);
    // res.send(cart.getItems());
    return res.render("cart.ejs", {
      user: sessionUser,
      huyit: data[0],
      addCart: cart.getItems(),
      totalPrice: cart.totalPrice,
    });
  } else {
    // chưa đăng nhập
    res.render("login.ejs");
  }
  res.end();
};

let removeCart = async (req, res, next) => {
  var productId = req.params.id;
  var cart = new Cart(req.session.cart ? req.session.cart : {});
  cart.remove(productId);
  req.session.cart = cart;
  // console.log(cart);
  res.send(
    "<script>alert('Xóa Sản Phẩm Thành Công!');window.location.href = '/checkout';</script>"
  );
  res.redirect("/checkout");
};

let orderCart = async (req, res) => {
  if (req.session.loggedin) {
    var sessionUser = req.session.username;
    var random_order = randomstring.generate(7);
    if (!req.session.cart) {
      return res.render("cart.ejs", {
        addCart: null,
        totalPrice: null,
      });
    } else {
      var cart = new Cart(req.session.cart);
      var huyit = cart.getItems();
      var status = "Đợi Thanh Toán";
      // console.log("<<<< Check Request ", JSON.stringify(huyit));
      await huydev.execute(
        "INSERT INTO `order`(`user_order`,`random_order`, `dh_order`, `status_order`) VALUES (?,?,?,?)",
        [sessionUser, random_order, JSON.stringify(huyit), status]
      );

      res.send(
        "<script>alert('Order Sản Phẩm Thành Công!');window.location.href = '/checkout';</script>"
      );
    }
  } else {
    res.render("login.ejs");
  }
  res.end();
};

export default {
  listProductHome,
  createUser,
  postLogin,
  addToCart,
  listCart,
  removeCart,
  homeList,
  orderCart,
};
