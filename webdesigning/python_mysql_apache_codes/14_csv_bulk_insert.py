import csv
import mysql.connector
from db_config import DB_CONFIG

CSV_FILE = "users.csv"  # columns: name,email,age
with open(CSV_FILE, newline="", encoding="utf-8") as f:
    reader = csv.DictReader(f)
    rows = [
        (r["name"].strip(), r["email"].strip(),
         int(r["age"]) if r.get("age", "").strip() else None)
        for r in reader
    ]

conn = mysql.connector.connect(**DB_CONFIG)
try:
    cur = conn.cursor()
    cur.executemany(
        "INSERT INTO users (name, email, age) VALUES (%s, %s, %s)", rows
    )
    conn.commit()
    print("Rows imported:", cur.rowcount)
finally:
    conn.close()
