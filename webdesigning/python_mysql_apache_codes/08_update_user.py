import mysql.connector
from db_config import DB_CONFIG

user_id = int(input("User ID to update: "))
new_name = input("New name: ").strip()
new_email = input("New email: ").strip()

conn = mysql.connector.connect(**DB_CONFIG)
try:
    cur = conn.cursor()
    cur.execute(
        "UPDATE users SET name=%s, email=%s WHERE id=%s",
        (new_name, new_email, user_id)
    )
    conn.commit()
    print("Updated rows:", cur.rowcount)
finally:
    conn.close()
