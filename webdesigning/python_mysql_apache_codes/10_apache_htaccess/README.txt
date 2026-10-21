Example .htaccess (only works when AllowOverride permits these directives):
Options +ExecCGI
AddHandler cgi-script .py

Security/compatibility notes:
- Enable Apache's CGI module (for example, a2enmod cgid).
- Place scripts in a directory where CGI execution is allowed and ensure executable permissions.
- Many hosts disable CGI via .htaccess. Prefer a dedicated ScriptAlias directory.
- Do not enable Python execution for arbitrary uploaded files.
