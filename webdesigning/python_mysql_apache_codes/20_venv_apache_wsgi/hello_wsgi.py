def application(environ, start_response):
    body = b"Hello World from a WSGI application!"
    start_response("200 OK", [
        ("Content-Type", "text/plain; charset=utf-8"),
        ("Content-Length", str(len(body))),
    ])
    return [body]
