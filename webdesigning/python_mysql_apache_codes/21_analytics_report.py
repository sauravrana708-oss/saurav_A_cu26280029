import mysql.connector
from db_config import DB_CONFIG

conn = mysql.connector.connect(**DB_CONFIG)
try:
    cur = conn.cursor(dictionary=True)
    cur.execute("""
        SELECT COUNT(*) AS total_users,
               AVG(age) AS average_age,
               MIN(age) AS minimum_age,
               MAX(age) AS maximum_age
        FROM users
    """)
    report = cur.fetchone()
    print("Administrative User Report")
    print("---------------------------")
    print("Total users:", report["total_users"])
    print("Average age:", round(report["average_age"], 2) if report["average_age"] is not None else "N/A")
    print("Minimum age:", report["minimum_age"])
    print("Maximum age:", report["maximum_age"])
finally:
    conn.close()
