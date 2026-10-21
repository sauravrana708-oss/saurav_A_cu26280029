import mysql.connector
from db_config import DB_CONFIG

search_term = input("Search users by name: ").strip()
conn = mysql.connector.connect(**DB_CONFIG)
try:
    cur = conn.cursor()
    cur.execute(
        "SELECT id, name, email, age FROM users WHERE name LIKE %s",
        (f"%{search_term}%",)
    )
    for row in cur.fetchall():
        print(row)
finally:
    conn.close()
