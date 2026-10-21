import re
import mysql.connector
from db_config import DB_CONFIG

def validate(name: str, email_addr: str):
    name = name.strip()
    email_addr = email_addr.strip()
    if not name or len(name) > 100:
        raise ValueError("Name must be 1-100 characters.")
    if len(email_addr) > 255 or not re.fullmatch(r"[^@\s]+@[^@\s]+\.[^@\s]+", email_addr):
        raise ValueError("Enter a valid email address.")
    return name, email_addr

try:
    name, email_addr = validate(input("Name: "), input("Email: "))
    conn = mysql.connector.connect(**DB_CONFIG)
    try:
        cur = conn.cursor()
        cur.execute(
            "INSERT INTO users (name, email) VALUES (%s, %s)",
            (name, email_addr)
        )
        conn.commit()
        print("User saved.")
    finally:
        conn.close()
except ValueError as exc:
    print("Input error:", exc)
except mysql.connector.Error:
    print("Database error. No details exposed to the user.")
