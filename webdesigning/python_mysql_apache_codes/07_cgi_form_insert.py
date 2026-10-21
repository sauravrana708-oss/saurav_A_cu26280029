#!/usr/bin/env python3
"""Legacy CGI example for Python <= 3.12; cgi was removed in Python 3.13."""
import cgi
import html
import mysql.connector

form = cgi.FieldStorage()
name = form.getfirst("name", "").strip()
email_addr = form.getfirst("email", "").strip()
print("Content-Type: text/html; charset=utf-8")
print()

if not name or not email_addr or len(name) > 100 or len(email_addr) > 255:
    print("<p>Invalid name or email.</p>")
else:
    conn = None
    try:
        conn = mysql.connector.connect(
            host="127.0.0.1", user="root", password="YOUR_MYSQL_PASSWORD",
            database="python_web_db"
        )
        cur = conn.cursor()
        cur.execute(
            "INSERT INTO users (name, email) VALUES (%s, %s)",
            (name, email_addr)
        )
        conn.commit()
        print("<p>User added successfully.</p>")
    except mysql.connector.Error:
        if conn:
            conn.rollback()
        print("<p>Could not save user. Check server logs.</p>")
    finally:
        if conn:
            conn.close()
