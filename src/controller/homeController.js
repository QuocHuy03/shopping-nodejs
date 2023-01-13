import huydev from "../configs/connectDB";
let alert = require("alert");
let getHomepage = async (req, res) => {
  // ++ Cơ Bản ++
  // let data = [];
  // huydev.query("SELECT * FROM `users`", function (err, result, fields) {
  //   console.log("<<< OKE HUY LỎ >>>");
  //   // console.log(result);
  //   result.map((item) => {
  //     data.push({
  //       id: item.id,
  //       username: item.username,
  //       email: item.email,
  //       mobile: item.mobile,
  //       create_at: item.create_at,
  //     });
  //   });
  //   console.log(data);
  //   console.log(JSON.stringify(data));
  //   return res.render("test/index.ejs", { dataUsers: data });
  // });

  const [data, fields] = await huydev.execute("SELECT * FROM `users`");
  // console.log(data);
  return res.render("index.ejs", { dataUsers: data });
};

let getDetailPage = async (req, res) => {
  let userID = req.params.id; // lấy thằng id user ra
  // console.log(userID);
  let [users] = await huydev.execute("SELECT * FROM `users`WHERE id = ?", [
    userID,
  ]);
  console.log("<<<< Check Params :", users);
  return res.send(JSON.stringify(users));
};

let createNewUser = async (req, res) => {
  let username = req.body.username;
  let email = req.body.email;
  let mobile = req.body.mobile;
  await huydev.execute(
    "INSERT INTO `users`(`username`, `email`, `mobile`) VALUES (?,?,?)",
    [username, email, mobile]
  );
  // console.log("<<<< Check Request ", req.body);
  alert("Thêm Thành Công");
  return res.redirect("/");
  // return res.send("Thêm Thành Công Nhé !!");
};

let deleteUser = async (req, res) => {
  let userID = req.body.userId; // lấy thằng id user ra
  // console.log(userID);
  await huydev.execute("DELETE FROM `users` WHERE id = ?", [userID]);
  alert("Xóa Thành Công");
  return res.redirect("/");
  // return res.send(`Xóa Thành Công Nhé Id ${req.body.userId} !!`);
};

let editUser = async (req, res) => {
  let userID = req.params.id; // lấy thằng id user ra
  let [users] = await huydev.execute("SELECT * FROM `users`WHERE id = ?", [
    userID,
  ]);
  res.render("update.ejs", { dataUsers: users[0] });
};

//  update

let updateUser = async (req, res) => {
  let { id, username, email, mobile } = req.body;
  await huydev.execute(
    "UPDATE `users` SET  `username` = ?,`email` = ?,`mobile` = ? WHERE id = ?",
    [username, email, mobile, id]
  );
  console.log("<<< Update : ", req.body);
  alert("Update Thành Công");
  return res.redirect("/");
};

export default {
  getHomepage,
  getDetailPage,
  createNewUser,
  deleteUser,
  editUser,
  updateUser,
};
