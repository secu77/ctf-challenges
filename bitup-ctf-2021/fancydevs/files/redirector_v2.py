import SimpleHTTPServer
import SocketServer

class FakeRedirect(SimpleHTTPServer.SimpleHTTPRequestHandler):
    def do_GET(self):
        port = self.path[1:-1]
        self.send_response(302)
        new_path = 'http://localhost:' + port
        self.send_header('Location', new_path)
        self.end_headers()

SocketServer.TCPServer(("", 8080), FakeRedirect).serve_forever()
