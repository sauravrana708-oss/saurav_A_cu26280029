"""Small example using mysql.connector connection pooling."""
from mysql.connector import pooling
from db_config import DB_CONFIG

pool = pooling.MySQLConnectionPool(
    pool_name="web_pool",
    pool_size=5,
    pool_reset_session=True,
    **DB_CONFIG
)

def list_users():
    conn = pool.get_connection()
    try:
        cur = conn.cursor(dictionary=True)
        cur.execute("SELECT id, name, email, age FROM users")
        return cur.fetchall()
    finally:
        conn.close()  # returns pooled connection to pool

if __name__ == "__main__":
    print(list_users())
