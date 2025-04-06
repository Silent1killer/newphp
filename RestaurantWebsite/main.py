import subprocess
import os
from flask import Flask, request, Response

app = Flask(__name__)

@app.route('/', defaults={'path': ''})
@app.route('/<path:path>')
def catch_all(path):
    # Base directory for PHP files
    base_dir = os.getcwd()
    
    # Determine which PHP file to execute
    php_file = 'index.php'
    if path:
        if path.endswith('.php'):
            php_file = path
        elif os.path.exists(os.path.join(base_dir, path + '.php')):
            php_file = path + '.php'
        elif os.path.exists(os.path.join(base_dir, path)):
            # Handle static files
            if os.path.isfile(os.path.join(base_dir, path)):
                mime_types = {
                    '.css': 'text/css',
                    '.js': 'application/javascript',
                    '.svg': 'image/svg+xml',
                    '.json': 'application/json',
                    '.png': 'image/png',
                    '.jpg': 'image/jpeg',
                    '.jpeg': 'image/jpeg',
                    '.gif': 'image/gif'
                }
                
                file_ext = os.path.splitext(path)[1]
                mime_type = mime_types.get(file_ext, 'application/octet-stream')
                
                with open(os.path.join(base_dir, path), 'rb') as f:
                    content = f.read()
                
                return Response(content, mimetype=mime_type)
    
    # Execute PHP file and capture output
    env = os.environ.copy()
    env['REQUEST_URI'] = request.full_path
    env['QUERY_STRING'] = request.query_string.decode('utf-8')
    env['REQUEST_METHOD'] = request.method
    
    cmd = ['php', '-f', os.path.join(base_dir, php_file)]
    
    try:
        process = subprocess.Popen(cmd, stdout=subprocess.PIPE, stderr=subprocess.PIPE, env=env)
        stdout, stderr = process.communicate()
        
        if process.returncode != 0:
            print(f"PHP error: {stderr.decode('utf-8')}")
            return "Internal Server Error", 500
        
        return stdout.decode('utf-8')
    except Exception as e:
        print(f"Error executing PHP: {e}")
        return "Internal Server Error", 500

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5000)