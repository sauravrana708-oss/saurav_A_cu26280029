import mysql.connector

conn = mysql.connector.connect(
    host="127.0.0.1", user="root", password="YOUR_MYSQL_PASSWORD"
)
try:
    cur = conn.cursor()
    cur.execute("SELECT VERSION()")
    print("MySQL server version:", cur.fetchone()[0])
finally:
    conn.close()
