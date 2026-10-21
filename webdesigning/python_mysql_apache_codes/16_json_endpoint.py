"""Minimal WSGI JSON endpoint. Configure Apache mod_wsgi to point to application."""
import json
import mysql.connector
from db_config import DB_CONFIG

def application(environ, start_response):
    try:
        conn = mysql.connector.connect(**DB_CONFIG)
        try:
            cur = conn.cursor(dictionary=True)
            cur.execute("SELECT id, name, email, age FROM users ORDER BY id")
            data = cur.fetchall()
        finally:
            conn.close()
        body = json.dumps(data, default=str).encode("utf-8")
        status = "200 OK"
    except mysql.connector.Error:
        body = json.dumps({"error": "Database unavailable"}).encode("utf-8")
        status = "500 Internal Server Error"

    start_response(status, [
        ("Content-Type", "application/json; charset=utf-8"),
        ("Content-Length", str(len(body))),
    ])
    return [body]
