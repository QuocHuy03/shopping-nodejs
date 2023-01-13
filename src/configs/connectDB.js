import mysql from "mysql2/promise";

// connect db
const huydev = mysql.createPool({
  host: "localhost",
  user: "root",
  database: "nodejs",
});
if (!huydev) {
  console.log("<<< Kết Nối DB Thất Bại >>>");
}

export default huydev;
