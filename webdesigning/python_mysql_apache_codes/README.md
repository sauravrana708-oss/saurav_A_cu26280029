# Python + MySQL + Apache Practical Codes

Contains example solutions for the 21 lab tasks. Update database credentials in `db_config.py` before running database scripts.

## Requirements
- Python 3.10+
- MySQL Server
- Apache HTTP Server (only needed for Apache/CGI/WSGI tasks)
- Install packages: `python -m pip install -r requirements.txt`

## Important notes
- Examples are for learning and local lab use. Do not expose debug endpoints or secrets publicly.
- `cgi` was deprecated in Python 3.11 and removed in Python 3.13. Task 7 is provided as a legacy CGI example for older Python installations; for modern deployments use Flask/FastAPI with WSGI/ASGI.
- Apache directives differ by Linux distribution and Apache version. Review the sample configs and enable only modules you actually use.
- The session example uses a simple database-backed session pattern for demonstration; use a well-tested framework and secure cookie settings in production.
