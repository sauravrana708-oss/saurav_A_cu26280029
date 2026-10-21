import mysql.connector
from db_config import DB_CONFIG

try:
    user_id = int(input("User ID to delete: "))
    conn = mysql.connector.connect(**DB_CONFIG)
    try:
        cur = conn.cursor()
        cur.execute("DELETE FROM users WHERE id=%s", (user_id,))
        conn.commit()
        print("Deleted rows:", cur.rowcount)
    finally:
        conn.close()
except ValueError:
    print("Please enter a valid integer ID.")
except mysql.connector.Error as exc:
    print("Database operation failed:", exc)
