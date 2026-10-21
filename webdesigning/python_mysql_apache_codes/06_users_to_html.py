import html
import mysql.connector
from db_config import DB_CONFIG

conn = mysql.connector.connect(**DB_CONFIG)
try:
    cur = conn.cursor()
    cur.execute("SELECT id, name, email, age FROM users ORDER BY id")
    rows = cur.fetchall()
    parts = [
        "<!doctype html><html><head><meta charset='utf-8'><title>Users</title></head><body>",
        "<h1>Users</h1><table border='1'><tr><th>ID</th><th>Name</th><th>Email</th><th>Age</th></tr>"
    ]
    for user_id, name, email_addr, age in rows:
        parts.append(
            "<tr><td>{}</td><td>{}</td><td>{}</td><td>{}</td></tr>".format(
                user_id, html.escape(str(name)), html.escape(str(email_addr)),
                html.escape(str(age if age is not None else ""))
            )
        )
    parts.append("</table></body></html>")
    print("\\n".join(parts))
finally:
    conn.close()
