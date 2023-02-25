import express from "express";
import categoryController from "../controller/categoryController";
import productController from "../controller/productController";
let router = express.Router();

const adminRouter = (app) => {
  router.get("/admin",function (req, res) {
    res.render("admin/index.ejs");
  });
  // ====================== product  ====================== //
  router.get("/admin/listProducts", productController.listProduct);
  // thêm sản phẩm
  router.get("/admin/addProducts", productController.listCategory);

  router.post("/create-products", productController.createProduct);
  // delete
  router.post("/delete-product", productController.deleteProduct);
  // edit , update
  router.get("/admin/edit-product/:id", productController.getIDProduct);
  router.post("/update-product", productController.updateIDProduct);
  // ====================== Category ====================== //
  router.get("/admin/listCategory", categoryController.listCategory);
  // thêm danh mục
  router.get("/admin/addCategory", function (req, res) {
    res.render("admin/AddCategory.ejs");
  });
  router.post("/create-category", categoryController.createCategory);
  // delete
  router.post("/delete-category", categoryController.deleteCategory);
  // edit , update
  router.get("/admin/edit-category/:id", categoryController.getIDCategory);
  router.post("/update-category", categoryController.updateIDCategory);

  return app.use("/", router);
};

export default adminRouter;
