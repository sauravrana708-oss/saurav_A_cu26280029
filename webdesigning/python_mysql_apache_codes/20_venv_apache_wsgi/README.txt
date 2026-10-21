Create environment and install dependencies:
python3 -m venv /var/www/pythonapp/.venv
/var/www/pythonapp/.venv/bin/pip install mysql-connector-python

Example Apache mod_wsgi configuration (paths vary by distro):
WSGIScriptAlias /hello /var/www/pythonapp/hello_wsgi.py
WSGIDaemonProcess pythonapp python-home=/var/www/pythonapp/.venv python-path=/var/www/pythonapp
WSGIProcessGroup pythonapp
<Directory /var/www/pythonapp>
    Require all granted
</Directory>

Note: mod_wsgi's Python version must be compatible with the virtual environment's
Python version. Follow your distribution's mod_wsgi documentation.
