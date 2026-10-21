"""Backup schema and data by invoking mysqldump."""
import subprocess
from datetime import datetime
from pathlib import Path

DB_NAME = "python_web_db"
DB_USER = "root"
OUTPUT = Path(f"{DB_NAME}_{datetime.now():%Y%m%d_%H%M%S}.sql")

# Prefer configuring credentials in MySQL option file (~/.my.cnf) rather than
# putting a password on the command line.
command = [
    "mysqldump", "--host=127.0.0.1", f"--user={DB_USER}",
    "--databases", DB_NAME, "--result-file", str(OUTPUT)
]
try:
    subprocess.run(command, check=True)
    print("Backup saved to:", OUTPUT)
except FileNotFoundError:
    print("mysqldump was not found. Install MySQL client tools.")
except subprocess.CalledProcessError as exc:
    print("Backup failed with exit code:", exc.returncode)
