Example Apache CGI setup (Debian/Ubuntu-style):
1. Enable CGI module: sudo a2enmod cgid
2. Put hello.py in /usr/lib/cgi-bin/ and make executable:
   sudo chmod 755 /usr/lib/cgi-bin/hello.py
3. Restart Apache: sudo systemctl restart apache2
4. Open http://localhost/cgi-bin/hello.py

WSGI alternative: install mod_wsgi for your distro and configure a WSGIScriptAlias
to a WSGI application. See task 20 for a minimal WSGI app example.
