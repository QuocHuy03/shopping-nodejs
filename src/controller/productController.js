import huydev from "../configs/connectDB";
let alert = require("alert");
import urlSlug from "url-slug";


let getAdmin = async (req, res) => {
  const [data, fields] = await huydev.execute("SELECT * FROM `users`");
  // console.log(data);
  return res.render("admin/index.ejs", { dataUsers: data });
};

let listProduct = async (req, res) => {
  const [data, fields] = await huydev.execute(
    "SELECT * FROM products,category WHERE products.cate_id = category.id ORDER BY id_product	DESC"
  );
  console.log(data);
  return res.render("admin/ListProduct.ejs", { dataProduct: data });
};

let listCategory = async (req, res) => {
  const [data, fields] = await huydev.execute(
    "SELECT * FROM `category` ORDER BY id DESC"
  );
  console.log(data);
  return res.render("admin/AddProduct.ejs", { dataCategory: data });
};

let createProduct = async (req, res) => {
  let name_product = req.body.name_product;
  let price_product = req.body.price_product;
  let img_product = req.body.img_product;
  let desc_product = req.body.desc_product;
  let cate_id = req.body.cate_id;
  let slug = urlSlug(name_product);
  console.log("<<<< Check Request ", req.body);
  await huydev.execute(
    "INSERT INTO `products`(`slug_product`,`name_product`, `price_product`, `img_product`, `desc_product`,`cate_id`) VALUES (?,?,?,?,?,?)",
    [slug, name_product, price_product, img_product, desc_product, cate_id]
  );
  alert("Thêm Thành Công");
  return res.redirect("/admin/listProducts");
};

let deleteProduct = async (req, res) => {
  let id = req.body.id; // lấy thằng id user ra
  await huydev.execute("DELETE FROM `products` WHERE id_product = ?", [id]);
  alert("Xóa Thành Công");
  return res.redirect("/admin/listProducts");
  // return res.send(`Xóa Thành Công Nhé Id ${req.body.id} !!`);
};

let getIDProduct = async (req, res) => {
  let productID = req.params.id; // lấy thằng id  ra
  let [product] = await huydev.execute(
    "SELECT * FROM `products` WHERE id_product = ?",
    [productID]
  );
  const [data] = await huydev.execute(
    "SELECT * FROM `category` ORDER BY id DESC"
  );
  res.render("UpdateProduct.ejs", {
    dataProduct: product[0],
    dataCategory: data,
  });
};
//  update
let updateIDProduct = async (req, res) => {
  let id = req.body.id;
  let name_product = req.body.name_product;
  let price_product = req.body.price_product;
  let img_product = req.body.img_product;
  let desc_product = req.body.desc_product;
  let cate_id = req.body.cate_id;
  let slug = urlSlug(name_product);
  await huydev.execute(
    "UPDATE `products` SET `slug_product` = ?,`name_product` = ?,`price_product` = ?,`img_product` = ?,`desc_product` = ?,`cate_id` = ? WHERE id_product = ?",
    [slug, name_product, price_product, img_product, desc_product, cate_id, id]
  );
  console.log("<<< Update : ", req.body);
  alert("Update Thành Công");
  return res.redirect("/admin/listProducts");
};

export default {
  getAdmin,
  listProduct,
  listCategory,
  createProduct,
  deleteProduct,
  getIDProduct,
  updateIDProduct,
};
