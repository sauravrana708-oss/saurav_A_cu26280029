import mysql.connector

conn = mysql.connector.connect(
    host="127.0.0.1", user="root", password="YOUR_MYSQL_PASSWORD"
)
try:
    cur = conn.cursor()
    cur.execute("CREATE DATABASE IF NOT EXISTS python_web_db")
    cur.execute("USE python_web_db")
    cur.execute("""
        CREATE TABLE IF NOT EXISTS users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(100) NOT NULL,
            email VARCHAR(255) NOT NULL UNIQUE,
            age INT NULL
        )
    """)
    conn.commit()
    print("Database python_web_db and table users are ready.")
finally:
    conn.close()
