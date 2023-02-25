import huydev from "../configs/connectDB";
let alert = require("alert");
import urlSlug from "url-slug";
let listCategory = async (req, res) => {
  const [data, fields] = await huydev.execute("SELECT * FROM `category`");
  console.log(data);
  return res.render("admin/ListCategory.ejs", { dataCategory: data });
};

let createCategory = async (req, res) => {
  let name_cate = req.body.name_cate;
  let slug = urlSlug(name_cate);
  console.log("<<<< Check Request ", req.body);
  await huydev.execute(
    "INSERT INTO `category` (`slug_cate`,`name_cate`) VALUES (?,?)",
    [slug, name_cate]
  );
  alert("Thêm Thành Công");
  return res.redirect("/admin/listCategory");
};

let deleteCategory = async (req, res) => {
  let categoryID = req.body.id; // lấy thằng id user ra
  await huydev.execute("DELETE FROM `category` WHERE id = ?", [categoryID]);
  alert("Xóa Thành Công");
  return res.redirect("/admin/listCategory");
  // return res.send(`Xóa Thành Công Nhé Id ${categoryID} !!`);
};

let getIDCategory = async (req, res) => {
  let categoryID = req.params.id; // lấy thằng id  ra
  let [cate] = await huydev.execute("SELECT * FROM `category` WHERE id = ?", [
    categoryID,
  ]);
  res.render("UpdateCategory.ejs", { dataCategory: cate[0] });
};
//  update
let updateIDCategory = async (req, res) => {
  let id = req.body.id;
  let name_cate = req.body.name_cate;
  let slug_cate = urlSlug(name_cate);
  await huydev.execute(
    "UPDATE `category` SET `slug_cate` = ?,`name_cate` = ? WHERE id = ?",
    [slug_cate, name_cate, id]
  );
  console.log("<<< Update ++++  : ", req.body);
  alert("Update Thành Công");
  return res.redirect("/admin/listCategory");
};

export default {
  listCategory,
  createCategory,
  deleteCategory,
  getIDCategory,
  updateIDCategory,
};
