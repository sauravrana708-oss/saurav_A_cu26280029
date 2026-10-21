import mysql.connector

conn = mysql.connector.connect(
    host="127.0.0.1", user="root", password="YOUR_MYSQL_PASSWORD",
    database="python_web_db"
)
rows = [
    ("Aman", "aman@example.com", 21),
    ("Priya", "priya@example.com", 22),
    ("Rahul", "rahul@example.com", 20),
]
try:
    cur = conn.cursor()
    cur.executemany(
        "INSERT INTO users (name, email, age) VALUES (%s, %s, %s)", rows
    )
    conn.commit()
    print("Rows inserted:", cur.rowcount)
finally:
    conn.close()
