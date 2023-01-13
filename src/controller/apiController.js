import huydev from "../configs/connectDB";

let getAllUsers = async (req, res) => {
  const [users] = await huydev.execute("SELECT * FROM `users`");
  return res.status(200).json({
    message: "success",
    data: users,
  });
};

let createNewUser = async (req, res) => {
  let username = req.body.username;
  let email = req.body.email;
  let mobile = req.body.mobile;

  if (!username || !email || !mobile) {
    return res.status(200).json({
      message: "Error Server",
    });
  } else {
    await huydev.execute(
      "INSERT INTO `users`(`username`, `email`, `mobile`) VALUES (?,?,?)",
      [username, email, mobile]
    );
    return res.status(200).json({
      message: "success",
    });
  }
};

let updateUser = async (req, res) => {
  let { id, username, email, mobile } = req.body;
  if (!username || !email || !mobile || !id) {
    return res.status(200).json({
      message: "Error Server",
    });
  } else {
    await huydev.execute(
      "UPDATE `users` SET  `username` = ?,`email` = ?,`mobile` = ? WHERE id = ?",
      [username, email, mobile, id]
    );
    return res.status(200).json({
      message: "success",
    });
  }
};

let deleteUser = async (req, res) => {
  let userID = req.params.id; // lấy thằng id user ra
  if (!userID) {
    return res.status(200).json({
      message: "Error Server",
    });
  } else {
    await huydev.execute("DELETE FROM `users` WHERE id = ?", [userID]);
    return res.status(200).json({
      message: "success",
    });
  }
};
export default { getAllUsers, createNewUser, updateUser, deleteUser };
