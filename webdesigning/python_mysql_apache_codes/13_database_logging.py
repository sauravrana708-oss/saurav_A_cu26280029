import logging
from datetime import datetime, timezone
import mysql.connector
from db_config import DB_CONFIG

logging.basicConfig(
    filename="database.log",
    level=logging.INFO,
    format="%(asctime)s %(levelname)s %(message)s"
)

logging.info("Script started at %s", datetime.now(timezone.utc).isoformat())
try:
    conn = mysql.connector.connect(**DB_CONFIG)
    try:
        cur = conn.cursor()
        cur.execute("SELECT COUNT(*) FROM users")
        logging.info("User count query succeeded")
        print("Users:", cur.fetchone()[0])
    finally:
        conn.close()
except mysql.connector.Error:
    logging.exception("Database operation failed")
    print("Database operation failed; see database.log")
