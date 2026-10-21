"""Educational database-backed session sketch; use framework session support in production."""
import secrets
import mysql.connector
from db_config import DB_CONFIG

def create_session(user_id: int) -> str:
    token = secrets.token_urlsafe(32)
    conn = mysql.connector.connect(**DB_CONFIG)
    try:
        cur = conn.cursor()
        cur.execute("""
            CREATE TABLE IF NOT EXISTS user_sessions (
                token_hash CHAR(64) PRIMARY KEY,
                user_id INT NOT NULL,
                expires_at TIMESTAMP NOT NULL
            )
        """)
        import hashlib
        token_hash = hashlib.sha256(token.encode()).hexdigest()
        cur.execute(
            "INSERT INTO user_sessions (token_hash, user_id, expires_at) "
            "VALUES (%s, %s, DATE_ADD(UTC_TIMESTAMP(), INTERVAL 1 HOUR))",
            (token_hash, user_id)
        )
        conn.commit()
        return token  # send only as a Secure, HttpOnly, SameSite cookie over HTTPS
    finally:
        conn.close()

if __name__ == "__main__":
    print("Example session token:", create_session(1))
